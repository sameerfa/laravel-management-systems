<?php

namespace App\Http\Livewire\CrmStatus;

use App\Models\CrmStatus;
use Livewire\Component;

class Edit extends Component
{
    public CrmStatus $crmStatus;

    public function mount(CrmStatus $crmStatus)
    {
        $this->crmStatus = $crmStatus;
    }

    public function render()
    {
        return view('livewire.crm-status.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->crmStatus->save();

        return redirect()->route('admin.crm-statuses.index');
    }

    protected function rules(): array
    {
        return [
            'crmStatus.name' => [
                'string',
                'required',
            ],
        ];
    }
}
