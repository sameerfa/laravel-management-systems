<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Doctor;
use Livewire\Component;

class Edit extends Component
{
    public Doctor $doctor;

    public function mount(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function render()
    {
        return view('livewire.doctor.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->doctor->save();

        return redirect()->route('admin.doctors.index');
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
