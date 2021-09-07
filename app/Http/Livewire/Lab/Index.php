<?php

namespace App\Http\Livewire\Lab;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Lab;
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
        $this->orderable         = (new Lab())->orderable;
    }

    public function render()
    {
        $query = Lab::with(['patient', 'doctor'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $labs = $query->paginate($this->perPage);

        return view('livewire.lab.index', compact('query', 'labs', 'labs'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('lab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Lab::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Lab $lab)
    {
        abort_if(Gate::denies('lab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lab->delete();
    }
}
