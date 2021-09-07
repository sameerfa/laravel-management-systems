<?php

namespace App\Http\Livewire\Patient;

use App\Models\Patient;
use Livewire\Component;

class Edit extends Component
{
    public Patient $patient;

    public array $listsForFields = [];

    public function mount(Patient $patient)
    {
        $this->patient = $patient;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.patient.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->patient->save();

        return redirect()->route('admin.patients.index');
    }

    protected function rules(): array
    {
        return [
            'patient.name' => [
                'string',
                'required',
            ],
            'patient.age' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'patient.weight' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'patient.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'patient.address' => [
                'string',
                'nullable',
            ],
            'patient.phone_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'patient.disease' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['gender'] = $this->patient::GENDER_SELECT;
    }
}
