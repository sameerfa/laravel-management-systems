<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    protected function rules(): array
    {
        return [
            'order.item_table_id' => [
                'integer',
                'exists:item_tables,id',
                'required',
            ],
            'order.booking_id' => [
                'integer',
                'exists:bookings,id',
                'required',
            ],
            'order.order_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'order.quantity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'order.cost' => [
                'numeric',
                'required',
            ],
        ];
    }
}
