<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_edit');
    }

    protected function rules(): array
    {
        return [
            'booking.room_id' => [
                'integer',
                'exists:rooms,id',
                'required',
            ],
            'booking.customer_id' => [
                'integer',
                'exists:customers,id',
                'required',
            ],
            'booking.booking_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'booking.checkin' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'booking.checkout' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }
}
