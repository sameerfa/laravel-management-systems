<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDoctorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('doctor_create');
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
