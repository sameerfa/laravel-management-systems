<?php

namespace App\Http\Livewire\TestAnswer;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\TestAnswer;
use App\Models\TestResult;
use Livewire\Component;

class Edit extends Component
{
    public TestAnswer $testAnswer;

    public array $listsForFields = [];

    public function mount(TestAnswer $testAnswer)
    {
        $this->testAnswer = $testAnswer;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.test-answer.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->testAnswer->save();

        return redirect()->route('admin.test-answers.index');
    }

    protected function rules(): array
    {
        return [
            'testAnswer.test_result_id' => [
                'integer',
                'exists:test_results,id',
                'required',
            ],
            'testAnswer.question_id' => [
                'integer',
                'exists:questions,id',
                'required',
            ],
            'testAnswer.option_id' => [
                'integer',
                'exists:question_options,id',
                'required',
            ],
            'testAnswer.is_correct' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['test_result'] = TestResult::pluck('score', 'id')->toArray();
        $this->listsForFields['question']    = Question::pluck('question_text', 'id')->toArray();
        $this->listsForFields['option']      = QuestionOption::pluck('option_text', 'id')->toArray();
    }
}
