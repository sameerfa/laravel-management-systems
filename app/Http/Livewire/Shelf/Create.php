<?php

namespace App\Http\Livewire\Shelf;

use App\Models\Shelf;
use Livewire\Component;

class Create extends Component
{
    public Shelf $shelf;

    public function mount(Shelf $shelf)
    {
        $this->shelf = $shelf;
    }

    public function render()
    {
        return view('livewire.shelf.create');
    }

    public function submit()
    {
        $this->validate();

        $this->shelf->save();

        return redirect()->route('admin.shelves.index');
    }

    protected function rules(): array
    {
        return [
            'shelf.shelf_number' => [
                'string',
                'required',
            ],
            'shelf.floor_number' => [
                'string',
                'required',
            ],
        ];
    }
}
