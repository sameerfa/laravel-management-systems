<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Http\Resources\Admin\ReminderResource;
use App\Models\Reminder;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReminderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reminder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReminderResource(Reminder::with(['booking'])->get());
    }

    public function store(StoreReminderRequest $request)
    {
        $reminder = Reminder::create($request->validated());

        return (new ReminderResource($reminder))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReminderResource($reminder->load(['booking']));
    }

    public function update(UpdateReminderRequest $request, Reminder $reminder)
    {
        $reminder->update($request->validated());

        return (new ReminderResource($reminder))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reminder->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
