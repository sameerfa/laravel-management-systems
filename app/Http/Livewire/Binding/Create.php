<?php

namespace App\Http\Livewire\Binding;

use App\Models\Binding;
use Livewire\Component;

class Create extends Component
{
    public Binding $binding;

    public function mount(Binding $binding)
    {
        $this->binding = $binding;
    }

    public function render()
    {
        return view('livewire.binding.create');
    }

    public function submit()
    {
        $this->validate();

        $this->binding->save();

        return redirect()->route('admin.bindings.index');
    }

    protected function rules(): array
    {
        return [
            'binding.binding_name' => [
                'string',
                'required',
            ],
        ];
    }
}
