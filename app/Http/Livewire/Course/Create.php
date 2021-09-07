<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Course $course;

    public array $students = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.course.create');
    }

    public function submit()
    {
        $this->validate();

        $this->course->save();
        $this->course->students()->sync($this->students);
        $this->syncMedia();

        return redirect()->route('admin.courses.index');
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
            'course.teacher_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'course.title' => [
                'string',
                'required',
            ],
            'course.description' => [
                'string',
                'required',
            ],
            'course.price' => [
                'numeric',
                'nullable',
            ],
            'mediaCollections.course_thumbnail' => [
                'array',
                'nullable',
            ],
            'mediaCollections.course_thumbnail.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'course.is_published' => [
                'boolean',
            ],
            'students' => [
                'array',
            ],
            'students.*.id' => [
                'integer',
                'exists:users,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['teacher']  = User::pluck('name', 'id')->toArray();
        $this->listsForFields['students'] = User::pluck('name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->course->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
