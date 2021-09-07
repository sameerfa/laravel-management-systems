<?php

namespace App\Http\Requests;

use App\Models\Reminder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReminderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reminder_create');
    }

    protected function rules(): array
    {
        return [
            'reminder.booking_id' => [
                'integer',
                'exists:bookings,id',
                'required',
            ],
            'reminder.reminder_type' => [
                'string',
                'required',
            ],
            'reminder.reminder_detail' => [
                'string',
                'nullable',
            ],
            'reminder.datetime' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }
}
