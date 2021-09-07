<?php

namespace App\Http\Requests;

use App\Models\Borrower;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBorrowerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('borrower_create');
    }

    protected function rules(): array
    {
        return [
            'borrower.student_id' => [
                'integer',
                'exists:students,id',
                'required',
            ],
            'borrower.book_id' => [
                'integer',
                'exists:books,id',
                'required',
            ],
            'borrower.borrowed_from' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'borrower.borrowed_to' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'borrower.return_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'borrower.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }
}
