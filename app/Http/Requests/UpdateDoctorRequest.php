<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doctor_edit');
    }

    protected function rules(): array
    {
        return [
            'doctor.doctor_name' => [
                'string',
                'nullable',
            ],
            'doctor.department' => [
                'string',
                'nullable',
            ],
        ];
    }
}
