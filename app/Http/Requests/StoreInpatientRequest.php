<?php

namespace App\Http\Requests;

use App\Models\Inpatient;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInpatientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inpatient_create');
    }

    protected function rules(): array
    {
        return [
            'inpatient.room_id' => [
                'integer',
                'exists:rooms,id',
                'required',
            ],
            'inpatient.admission_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'inpatient.discharge_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'inpatient.advance' => [
                'numeric',
                'required',
            ],
            'inpatient.lab_id' => [
                'integer',
                'exists:labs,id',
                'required',
            ],
        ];
    }
}
