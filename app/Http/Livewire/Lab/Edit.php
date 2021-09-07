<?php

namespace App\Http\Livewire\Lab;

use App\Models\Doctor;
use App\Models\Lab;
use App\Models\Patient;
use Livewire\Component;

class Edit extends Component
{
    public Lab $lab;

    public array $listsForFields = [];

    public function mount(Lab $lab)
    {
        $this->lab = $lab;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.lab.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->lab->save();

        return redirect()->route('admin.labs.index');
    }

    protected function rules(): array
    {
        return [
            'lab.lab_number' => [
                'string',
                'required',
            ],
            'lab.patient_id' => [
                'integer',
                'exists:patients,id',
                'required',
            ],
            'lab.weight' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'lab.doctor_id' => [
                'integer',
                'exists:doctors,id',
                'required',
            ],
            'lab.date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'lab.category' => [
                'string',
                'nullable',
            ],
            'lab.patient_type' => [
                'string',
                'nullable',
            ],
            'lab.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['patient'] = Patient::pluck('name', 'id')->toArray();
        $this->listsForFields['doctor']  = Doctor::pluck('doctor_name', 'id')->toArray();
    }
}
