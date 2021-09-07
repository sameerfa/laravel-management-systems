<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Create extends Component
{
    public Employee $employee;

    public string $password = '';

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.create');
    }

    public function submit()
    {
        $this->validate();
        $this->employee->password = $this->password;
        $this->employee->save();

        return redirect()->route('admin.employees.index');
    }

    protected function rules(): array
    {
        return [
            'employee.employee_name' => [
                'string',
                'required',
            ],
            'employee.username' => [
                'string',
                'required',
            ],
            'password' => [
                'string',
                'nullable',
            ],
            'employee.employee_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
