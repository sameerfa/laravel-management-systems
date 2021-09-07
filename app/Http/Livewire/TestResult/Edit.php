<?php

namespace App\Http\Livewire\TestResult;

use App\Models\Test;
use App\Models\TestResult;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public TestResult $testResult;

    public array $listsForFields = [];

    public function mount(TestResult $testResult)
    {
        $this->testResult = $testResult;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.test-result.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->testResult->save();

        return redirect()->route('admin.test-results.index');
    }

    protected function rules(): array
    {
        return [
            'testResult.test_id' => [
                'integer',
                'exists:tests,id',
                'nullable',
            ],
            'testResult.student_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'testResult.score' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['test']    = Test::pluck('title', 'id')->toArray();
        $this->listsForFields['student'] = User::pluck('name', 'id')->toArray();
    }
}
