<?php

namespace App\Http\Requests;

use App\Models\Lab;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLabRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lab_edit');
    }

    protected function rules(): array
    {
        return [
            'lab.lab_number' => [
                'string',
                'required',
            ],
            'lab.patient_id' => [
                'integer',
                'exists:patients,id',
                'required',
            ],
            'lab.weight' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'lab.doctor_id' => [
                'integer',
                'exists:doctors,id',
                'required',
            ],
            'lab.date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'lab.category' => [
                'string',
                'nullable',
            ],
            'lab.patient_type' => [
                'string',
                'nullable',
            ],
            'lab.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
