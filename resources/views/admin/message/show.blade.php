@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="flex flex-wrap">
        <div class="w-full pt-6 lg:w-64 lg:pt-0">
            @include('admin.message.nav-messages')
        </div>

        <div class="w-1 flex-grow lg:pl-4" x-data="{ replyHidden: true }">
            <div class="card bg-white">
                <div class="card-header border-b border-blueGray-200">
                    <div class="flex flex-col lg:flex-row lg:justify-between">
                        <h6 class="card-title">
                            {{ $conversation->subject }}
                            <div>
                                <div class="font-normal text-sm block">
                                    {{ __('global.from') }}:
                                    {{ $conversation->owner->name }}
                                    &lt;{{ $conversation->owner->email }}&gt;
                                </div>
                                <div class="font-normal text-sm block">
                                    {{ __('global.to') }}:
                                    @foreach($conversation->recipients->reject(function($user) use ($conversation) {
                                        return $user->id === $conversation->owner_id;
                                        }) as $user)
                                        {{ $user->name }}
                                        &lt;{{ $user->email }}&gt;{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </div>
                            </div>
                        </h6>

                        <button @click="replyHidden = false" class="btn btn-indigo w-full self-start lg:w-auto" type="button">
                            {{ __('global.reply') }}
                        </button>
                    </div>

                </div>

                <div class="card-body bg-blueGray-100 hidden" :class="{ 'hidden': replyHidden === true }">
                    <form action="{{ route('admin.messages.update', $conversation) }}" method="POST" class="pt-3">
                        @csrf
                        <div class="form-group {{ $errors->has('body') ? 'invalid' : '' }}">
                            <textarea class="form-control" name="body" id="body" rows="8" required placeholder="{{ __('global.body') }}"></textarea>
                            <div class="validation-message">
                                {{ $errors->first('body') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-indigo w-full self-start lg:w-auto mr-2" type="submit">
                                {{ __('global.send') }}
                            </button>
                            <button @click="replyHidden = true" type="button" class="btn btn-secondary">
                                {{ __('global.discard') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="flex flex-col pt-3">
                        @foreach($conversation->messages as $message)
                            <div class="mb-1">
                                <div class="{{ $message->user_id === auth()->id() ? 'bg-indigo-100 divide-indigo-300 ml-6' : 'bg-blueGray-100 divide-blueGray-300' }} inline-block px-4 py-3 rounded divide-y divide-solid">
                                    <div class="text-sm text-blueGray-500 pb-3">
                                        From: {{ $message->user->name }} &lt;{{ $message->user->email }}&gt;<br>
                                        {{ $message->created_at->diffForHumans() }}
                                    </div>
                                    <pre class="font-sans whitespace-pre-wrap pt-6" style="font-size:0.9375rem">{{ $message->body }}</pre>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection