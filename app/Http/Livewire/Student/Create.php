<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public Student $student;

    public array $listsForFields = [];

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.student.create');
    }

    public function submit()
    {
        $this->validate();

        $this->student->save();

        return redirect()->route('admin.students.index');
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

    protected function initListsForFields(): void
    {
        $this->listsForFields['gender'] = $this->student::GENDER_SELECT;
    }
}
