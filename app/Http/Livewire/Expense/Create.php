<?php

namespace App\Http\Livewire\Expense;

use App\Models\Employee;
use App\Models\Expense;
use Livewire\Component;

class Create extends Component
{
    public Expense $expense;

    public array $listsForFields = [];

    public function mount(Expense $expense)
    {
        $this->expense = $expense;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.expense.create');
    }

    public function submit()
    {
        $this->validate();

        $this->expense->save();

        return redirect()->route('admin.expenses.index');
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

    protected function initListsForFields(): void
    {
        $this->listsForFields['employee'] = Employee::pluck('employee_name', 'id')->toArray();
    }
}
