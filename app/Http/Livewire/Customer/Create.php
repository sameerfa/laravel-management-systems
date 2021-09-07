<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Customer $customer;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.customer.create');
    }

    public function submit()
    {
        $this->validate();

        $this->customer->save();
        $this->syncMedia();

        return redirect()->route('admin.customers.index');
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
            'customer.customer_name' => [
                'string',
                'required',
            ],
            'customer.address' => [
                'string',
                'nullable',
            ],
            'customer.contact_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'customer.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'mediaCollections.customer_id_proof' => [
                'array',
                'required',
            ],
            'mediaCollections.customer_id_proof.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.customer_address_proof' => [
                'array',
                'required',
            ],
            'mediaCollections.customer_address_proof.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.customer_profile_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.customer_profile_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['gender'] = $this->customer::GENDER_SELECT;
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->customer->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
