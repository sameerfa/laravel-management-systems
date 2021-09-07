<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('item_table_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ItemTable" format="csv" />
                <livewire:excel-export model="ItemTable" format="xlsx" />
                <livewire:excel-export model="ItemTable" format="pdf" />
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
                            {{ trans('cruds.itemTable.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.itemTable.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.itemTable.fields.cost') }}
                            @include('components.table.sort', ['field' => 'cost'])
                        </th>
                        <th>
                            {{ trans('cruds.itemTable.fields.details') }}
                            @include('components.table.sort', ['field' => 'details'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($itemTables as $itemTable)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $itemTable->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $itemTable->id }}
                            </td>
                            <td>
                                {{ $itemTable->name }}
                            </td>
                            <td>
                                {{ $itemTable->cost }}
                            </td>
                            <td>
                                {{ $itemTable->details }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('item_table_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.item-tables.show', $itemTable) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('item_table_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.item-tables.edit', $itemTable) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('item_table_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $itemTable->id }})" wire:loading.attr="disabled">
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
            {{ $itemTables->links() }}
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