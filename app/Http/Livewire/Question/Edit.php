<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use App\Models\Test;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Question $question;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Question $question)
    {
        $this->question = $question;
        $this->initListsForFields();
        $this->mediaCollections = [
            'question_question_image' => $question->question_image,
        ];
    }

    public function render()
    {
        return view('livewire.question.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->question->save();
        $this->syncMedia();

        return redirect()->route('admin.questions.index');
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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function rules(): array
    {
        return [
            'question.course_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'question.question_text' => [
                'string',
                'required',
            ],
            'mediaCollections.question_question_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.question_question_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'question.points' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['course'] = Test::pluck('title', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->question->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
