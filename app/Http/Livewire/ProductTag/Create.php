<?php

namespace App\Http\Livewire\ProductTag;

use App\Models\ProductTag;
use Livewire\Component;

class Create extends Component
{
    public ProductTag $productTag;

    public function mount(ProductTag $productTag)
    {
        $this->productTag = $productTag;
    }

    public function render()
    {
        return view('livewire.product-tag.create');
    }

    public function submit()
    {
        $this->validate();

        $this->productTag->save();

        return redirect()->route('admin.product-tags.index');
    }

    protected function rules(): array
    {
        return [
            'productTag.name' => [
                'string',
                'required',
            ],
        ];
    }
}
