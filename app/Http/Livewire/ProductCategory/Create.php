<?php

namespace App\Http\Livewire\ProductCategory;

use App\Models\ProductCategory;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public ProductCategory $productCategory;

    public function mount(ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;
    }

    public function render()
    {
        return view('livewire.product-category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->productCategory->save();
        $this->syncMedia();

        return redirect()->route('admin.product-categories.index');
    }

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function rules(): array
    {
        return [
            'productCategory.name' => [
                'string',
                'required',
            ],
            'productCategory.description' => [
                'string',
                'required',
            ],
            'mediaCollections.product_category_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.product_category_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->productCategory->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
