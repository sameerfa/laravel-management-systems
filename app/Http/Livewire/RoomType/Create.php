<?php

namespace App\Http\Livewire\RoomType;

use App\Models\RoomType;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public RoomType $roomType;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function mount(RoomType $roomType)
    {
        $this->roomType = $roomType;
    }

    public function render()
    {
        return view('livewire.room-type.create');
    }

    public function submit()
    {
        $this->validate();

        $this->roomType->save();
        $this->syncMedia();

        return redirect()->route('admin.room-types.index');
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
            'roomType.room_type' => [
                'string',
                'required',
            ],
            'mediaCollections.room_type_room_img' => [
                'array',
                'required',
            ],
            'mediaCollections.room_type_room_img.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'roomType.description' => [
                'string',
                'nullable',
            ],
            'roomType.cost' => [
                'numeric',
                'required',
            ],
        ];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->roomType->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
