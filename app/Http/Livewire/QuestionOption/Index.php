<?php

namespace App\Http\Livewire\QuestionOption;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\QuestionOption;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new QuestionOption())->orderable;
    }

    public function render()
    {
        $query = QuestionOption::with(['question'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $questionOptions = $query->paginate($this->perPage);

        return view('livewire.question-option.index', compact('query', 'questionOptions', 'questionOptions'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('question_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        QuestionOption::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(QuestionOption $questionOption)
    {
        abort_if(Gate::denies('question_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionOption->delete();
    }
}
