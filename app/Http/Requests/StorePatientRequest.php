<?php

namespace App\Http\Requests;

use App\Models\Patient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('patient_create');
    }

    protected function rules(): array
    {
        return [
            'patient.name' => [
                'string',
                'required',
            ],
            'patient.age' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'patient.weight' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'patient.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'patient.address' => [
                'string',
                'nullable',
            ],
            'patient.phone_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'patient.disease' => [
                'string',
                'nullable',
            ],
        ];
    }
}
