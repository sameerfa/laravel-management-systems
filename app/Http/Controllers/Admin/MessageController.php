<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyMessageRequest;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\ImConversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    public function index()
    {
        $title         = __('global.all_messages');
        $conversations = ImConversation::inboxOrOutbox()->get();

        return view('admin.message.index', compact('conversations', 'title'));
    }

    public function inbox()
    {
        $title         = __('global.inbox');
        $conversations = ImConversation::inbox()->get();

        return view('admin.message.index', compact('conversations', 'title'));
    }

    public function outbox()
    {
        $title         = __('global.outbox');
        $conversations = ImConversation::outbox()->get();

        return view('admin.message.index', compact('conversations', 'title'));
    }

    public function create()
    {
        $users = User::where('id', '!=', auth()->id())->pluck('email', 'id');

        return view('admin.message.create', compact('users'));
    }

    public function store(StoreMessageRequest $request)
    {
        $conversation = ImConversation::create([
            'owner_id' => auth()->id(),
            'subject'  => $request->input('subject'),
        ]);

        $conversation->messages()->create([
            'user_id' => auth()->id(),
            'body'    => $request->input('body'),
        ]);

        $conversation->recipients()->sync(array_merge([auth()->id()], $request->input('to')));

        $conversation->updateSeenAt();

        return redirect()->route('admin.messages.show', $conversation);
    }

    public function show(ImConversation $conversation)
    {
        $conversation->recipients()->findOrFail(auth()->id());

        $conversation->updateSeenAt();

        $conversation->load('messages.user', 'owner');

        return view('admin.message.show', compact('conversation'));
    }

    public function update(UpdateMessageRequest $request, ImConversation $conversation)
    {
        $conversation->messages()->create([
            'user_id' => auth()->id(),
            'body'    => $request->input('body'),
        ]);

        $conversation->updateSeenAt();

        return redirect()->route('admin.messages.show', $conversation);
    }

    public function destroy(DestroyMessageRequest $request, ImConversation $conversation)
    {
        if ($conversation->owner_id !== auth()->id()) {
            $conversation->recipients()->detach(auth()->id());

            return redirect()->back();
        }

        $conversation->delete();

        return redirect()->back();
    }
}
