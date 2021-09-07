<?php

namespace App\Http\Requests;

use App\Models\Outpatient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOutpatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('outpatient_create');
    }

    protected function rules(): array
    {
        return [
            'outpatient.patient_id' => [
                'integer',
                'exists:patients,id',
                'required',
            ],
            'outpatient.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'outpatient.lab_id' => [
                'integer',
                'exists:labs,id',
                'nullable',
            ],
        ];
    }
}
