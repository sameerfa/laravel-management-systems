<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReminderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reminder_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reminder.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reminder_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reminder.create');
    }

    public function edit(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reminder.edit', compact('reminder'));
    }

    public function show(Reminder $reminder)
    {
        abort_if(Gate::denies('reminder_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reminder->load('booking');

        return view('admin.reminder.show', compact('reminder'));
    }
}
