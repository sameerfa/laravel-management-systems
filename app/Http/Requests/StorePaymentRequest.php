<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_create');
    }

    protected function rules(): array
    {
        return [
            'payment.booking_id' => [
                'integer',
                'exists:bookings,id',
                'required',
            ],
            'payment.type' => [
                'string',
                'required',
            ],
            'payment.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'payment.payment_type' => [
                'string',
                'required',
            ],
            'payment.payment_details' => [
                'string',
                'nullable',
            ],
            'payment.payment_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }
}
