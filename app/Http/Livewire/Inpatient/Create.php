<?php

namespace App\Http\Livewire\Inpatient;

use App\Models\Inpatient;
use App\Models\Lab;
use App\Models\Room;
use Livewire\Component;

class Create extends Component
{
    public Inpatient $inpatient;

    public array $listsForFields = [];

    public function mount(Inpatient $inpatient)
    {
        $this->inpatient = $inpatient;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.inpatient.create');
    }

    public function submit()
    {
        $this->validate();

        $this->inpatient->save();

        return redirect()->route('admin.inpatients.index');
    }

    protected function rules(): array
    {
        return [
            'inpatient.room_id' => [
                'integer',
                'exists:rooms,id',
                'required',
            ],
            'inpatient.admission_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'inpatient.discharge_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'inpatient.advance' => [
                'numeric',
                'required',
            ],
            'inpatient.lab_id' => [
                'integer',
                'exists:labs,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['room'] = Room::pluck('room_number', 'id')->toArray();
        $this->listsForFields['lab']  = Lab::pluck('lab_number', 'id')->toArray();
    }
}
