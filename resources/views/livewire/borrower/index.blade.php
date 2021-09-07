<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('borrower_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Borrower" format="csv" />
                <livewire:excel-export model="Borrower" format="xlsx" />
                <livewire:excel-export model="Borrower" format="pdf" />
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
                            {{ trans('cruds.borrower.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.borrower.fields.student') }}
                            @include('components.table.sort', ['field' => 'student.name'])
                        </th>
                        <th>
                            {{ trans('cruds.borrower.fields.book') }}
                            @include('components.table.sort', ['field' => 'book.isbn'])
                        </th>
                        <th>
                            {{ trans('cruds.borrower.fields.borrowed_from') }}
                            @include('components.table.sort', ['field' => 'borrowed_from'])
                        </th>
                        <th>
                            {{ trans('cruds.borrower.fields.borrowed_to') }}
                            @include('components.table.sort', ['field' => 'borrowed_to'])
                        </th>
                        <th>
                            {{ trans('cruds.borrower.fields.return_date') }}
                            @include('components.table.sort', ['field' => 'return_date'])
                        </th>
                        <th>
                            {{ trans('cruds.borrower.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($borrowers as $borrower)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $borrower->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $borrower->id }}
                            </td>
                            <td>
                                @if($borrower->student)
                                    <span class="badge badge-relationship">{{ $borrower->student->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($borrower->book)
                                    <span class="badge badge-relationship">{{ $borrower->book->isbn ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $borrower->borrowed_from }}
                            </td>
                            <td>
                                {{ $borrower->borrowed_to }}
                            </td>
                            <td>
                                {{ $borrower->return_date }}
                            </td>
                            <td>
                                @if($borrower->user)
                                    <span class="badge badge-relationship">{{ $borrower->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('borrower_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.borrowers.show', $borrower) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('borrower_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.borrowers.edit', $borrower) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('borrower_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $borrower->id }})" wire:loading.attr="disabled">
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
            {{ $borrowers->links() }}
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