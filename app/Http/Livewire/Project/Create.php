<?php

namespace App\Http\Livewire\Project;

use App\Models\CrmCustomer;
use App\Models\Project;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Project $project;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.project.create');
    }

    public function submit()
    {
        $this->validate();

        $this->project->save();
        $this->syncMedia();

        return redirect()->route('admin.projects.index');
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
            'project.project_name' => [
                'string',
                'required',
            ],
            'project.brief' => [
                'string',
                'required',
            ],
            'mediaCollections.project_related_files' => [
                'array',
                'nullable',
            ],
            'mediaCollections.project_related_files.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'project.customer_id' => [
                'integer',
                'exists:crm_customers,id',
                'required',
            ],
            'project.hourly_rate' => [
                'numeric',
                'required',
            ],
            'project.total_hours' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'project.estimated_hours' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
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
            ->update(['model_id' => $this->project->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
