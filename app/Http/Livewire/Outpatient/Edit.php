<?php

namespace App\Http\Livewire\Outpatient;

use App\Models\Lab;
use App\Models\Outpatient;
use App\Models\Patient;
use Livewire\Component;

class Edit extends Component
{
    public Outpatient $outpatient;

    public array $listsForFields = [];

    public function mount(Outpatient $outpatient)
    {
        $this->outpatient = $outpatient;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.outpatient.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->outpatient->save();

        return redirect()->route('admin.outpatients.index');
    }

    protected function rules(): array
    {
        return [
            'outpatient.patient_id' => [
                'integer',
                'exists:patients,id',
                'required',
            ],
            'outpatient.date' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'outpatient.lab_id' => [
                'integer',
                'exists:labs,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['patient'] = Patient::pluck('name', 'id')->toArray();
        $this->listsForFields['lab']     = Lab::pluck('lab_number', 'id')->toArray();
    }
}
