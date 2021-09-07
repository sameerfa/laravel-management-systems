<?php

namespace App\Http\Requests;

use App\Models\Expense;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expense_edit');
    }

    protected function rules(): array
    {
        return [
            'expense.employee_id' => [
                'integer',
                'exists:employees,id',
                'required',
            ],
            'expense.expense_type' => [
                'string',
                'required',
            ],
            'expense.description' => [
                'string',
                'nullable',
            ],
            'expense.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'expense.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }
}
