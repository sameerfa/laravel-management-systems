<?php

namespace App\Http\Livewire\Bill;

use App\Models\Bill;
use App\Models\Patient;
use Livewire\Component;

class Create extends Component
{
    public Bill $bill;

    public array $listsForFields = [];

    public function mount(Bill $bill)
    {
        $this->bill = $bill;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.bill.create');
    }

    public function submit()
    {
        $this->validate();

        $this->bill->save();

        return redirect()->route('admin.bills.index');
    }

    protected function rules(): array
    {
        return [
            'bill.patient_id' => [
                'integer',
                'exists:patients,id',
                'required',
            ],
            'bill.patient_type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['patient_type'])),
            ],
            'bill.doctor_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.medicine_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.room_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.operation_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.no_of_days' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'bill.nursing_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.advance' => [
                'numeric',
                'nullable',
            ],
            'bill.health_card' => [
                'string',
                'nullable',
            ],
            'bill.lab_charge' => [
                'numeric',
                'nullable',
            ],
            'bill.bill' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['patient']      = Patient::pluck('name', 'id')->toArray();
        $this->listsForFields['patient_type'] = $this->bill::PATIENT_TYPE_SELECT;
    }
}
