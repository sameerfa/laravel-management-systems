<?php

namespace App\Http\Livewire\ItemTable;

use App\Models\ItemTable;
use Livewire\Component;

class Edit extends Component
{
    public ItemTable $itemTable;

    public function mount(ItemTable $itemTable)
    {
        $this->itemTable = $itemTable;
    }

    public function render()
    {
        return view('livewire.item-table.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->itemTable->save();

        return redirect()->route('admin.item-tables.index');
    }

    protected function rules(): array
    {
        return [
            'itemTable.name' => [
                'string',
                'required',
            ],
            'itemTable.cost' => [
                'numeric',
                'required',
            ],
            'itemTable.details' => [
                'string',
                'nullable',
            ],
        ];
    }
}
