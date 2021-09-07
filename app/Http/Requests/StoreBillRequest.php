<?php

namespace App\Http\Requests;

use App\Models\Bill;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBillRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bill_create');
    }

    protected function rules(): array
    {
        return [
            'bill.patient_id' => [
                'integer',
                'exists:patients,id',
                'required',
            ],
            'bill.patient_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['patient_type'])),
            ],
            'bill.doctor_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.medicine_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.room_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.operation_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.no_of_days' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'bill.nursing_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.advance' => [
                'numeric',
                'nullable',
            ],
            'bill.health_card' => [
                'string',
                'nullable',
            ],
            'bill.lab_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.bill' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
