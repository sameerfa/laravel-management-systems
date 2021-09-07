<?php

namespace App\Http\Livewire\QuestionOption;

use App\Models\Question;
use App\Models\QuestionOption;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public QuestionOption $questionOption;

    public function mount(QuestionOption $questionOption)
    {
        $this->questionOption = $questionOption;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.question-option.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->questionOption->save();

        return redirect()->route('admin.question-options.index');
    }

    protected function rules(): array
    {
        return [
            'questionOption.question_id' => [
                'integer',
                'exists:questions,id',
                'nullable',
            ],
            'questionOption.option_text' => [
                'string',
                'required',
            ],
            'questionOption.is_correct' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['question'] = Question::pluck('question_text', 'id')->toArray();
    }
}
