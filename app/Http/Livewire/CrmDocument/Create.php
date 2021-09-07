<?php

namespace App\Http\Livewire\CrmDocument;

use App\Models\CrmCustomer;
use App\Models\CrmDocument;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public CrmDocument $crmDocument;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(CrmDocument $crmDocument)
    {
        $this->crmDocument = $crmDocument;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.crm-document.create');
    }

    public function submit()
    {
        $this->validate();

        $this->crmDocument->save();
        $this->syncMedia();

        return redirect()->route('admin.crm-documents.index');
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
            'crmDocument.customer_id' => [
                'integer',
                'exists:crm_customers,id',
                'required',
            ],
            'mediaCollections.crm_document_document_file' => [
                'array',
                'required',
            ],
            'mediaCollections.crm_document_document_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'crmDocument.name' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['customer'] = CrmCustomer::pluck('first_name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->crmDocument->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
