<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_edit');
    }

    protected function rules(): array
    {
        return [
            'student.name' => [
                'string',
                'required',
            ],
            'student.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'student.date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'student.department' => [
                'string',
                'nullable',
            ],
            'student.contact_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
