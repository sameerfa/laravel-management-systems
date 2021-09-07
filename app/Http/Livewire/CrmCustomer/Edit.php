<?php

namespace App\Http\Livewire\CrmCustomer;

use App\Models\CrmCustomer;
use App\Models\CrmStatus;
use Livewire\Component;

class Edit extends Component
{
    public CrmCustomer $crmCustomer;

    public array $listsForFields = [];

    public function mount(CrmCustomer $crmCustomer)
    {
        $this->crmCustomer = $crmCustomer;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.crm-customer.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->crmCustomer->save();

        return redirect()->route('admin.crm-customers.index');
    }

    protected function rules(): array
    {
        return [
            'crmCustomer.first_name' => [
                'string',
                'required',
            ],
            'crmCustomer.last_name' => [
                'string',
                'required',
            ],
            'crmCustomer.status_id' => [
                'integer',
                'exists:crm_statuses,id',
                'required',
            ],
            'crmCustomer.email' => [
                'email:rfc',
                'nullable',
            ],
            'crmCustomer.phone' => [
                'string',
                'nullable',
            ],
            'crmCustomer.address' => [
                'string',
                'nullable',
            ],
            'crmCustomer.skype' => [
                'string',
                'nullable',
            ],
            'crmCustomer.website' => [
                'string',
                'nullable',
            ],
            'crmCustomer.description' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = CrmStatus::pluck('name', 'id')->toArray();
    }
}
