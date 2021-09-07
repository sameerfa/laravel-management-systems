<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('expense_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Expense" format="csv" />
                <livewire:excel-export model="Expense" format="xlsx" />
                <livewire:excel-export model="Expense" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.expense.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.employee') }}
                            @include('components.table.sort', ['field' => 'employee.employee_name'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.expense_type') }}
                            @include('components.table.sort', ['field' => 'expense_type'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.expense.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($expenses as $expense)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $expense->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $expense->id }}
                            </td>
                            <td>
                                @if($expense->employee)
                                    <span class="badge badge-relationship">{{ $expense->employee->employee_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $expense->expense_type }}
                            </td>
                            <td>
                                {{ $expense->description }}
                            </td>
                            <td>
                                {{ $expense->amount }}
                            </td>
                            <td>
                                {{ $expense->date }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('expense_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.expenses.show', $expense) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('expense_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.expenses.edit', $expense) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('expense_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $expense->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $expenses->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush