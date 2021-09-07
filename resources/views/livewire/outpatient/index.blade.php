<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('outpatient_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Outpatient" format="csv" />
                <livewire:excel-export model="Outpatient" format="xlsx" />
                <livewire:excel-export model="Outpatient" format="pdf" />
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
                            {{ trans('cruds.outpatient.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.outpatient.fields.patient') }}
                            @include('components.table.sort', ['field' => 'patient.name'])
                        </th>
                        <th>
                            {{ trans('cruds.outpatient.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.outpatient.fields.lab') }}
                            @include('components.table.sort', ['field' => 'lab.lab_number'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($outpatients as $outpatient)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $outpatient->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $outpatient->id }}
                            </td>
                            <td>
                                @if($outpatient->patient)
                                    <span class="badge badge-relationship">{{ $outpatient->patient->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $outpatient->date }}
                            </td>
                            <td>
                                @if($outpatient->lab)
                                    <span class="badge badge-relationship">{{ $outpatient->lab->lab_number ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('outpatient_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.outpatients.show', $outpatient) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('outpatient_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.outpatients.edit', $outpatient) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('outpatient_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $outpatient->id }})" wire:loading.attr="disabled">
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
            {{ $outpatients->links() }}
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