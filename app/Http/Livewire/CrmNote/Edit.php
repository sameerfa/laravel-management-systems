<?php

namespace App\Http\Livewire\CrmNote;

use App\Models\CrmCustomer;
use App\Models\CrmNote;
use Livewire\Component;

class Edit extends Component
{
    public CrmNote $crmNote;

    public array $listsForFields = [];

    public function mount(CrmNote $crmNote)
    {
        $this->crmNote = $crmNote;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.crm-note.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->crmNote->save();

        return redirect()->route('admin.crm-notes.index');
    }

    protected function rules(): array
    {
        return [
            'crmNote.customer_id' => [
                'integer',
                'exists:crm_customers,id',
                'required',
            ],
            'crmNote.note' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['customer'] = CrmCustomer::pluck('first_name', 'id')->toArray();
    }
}
