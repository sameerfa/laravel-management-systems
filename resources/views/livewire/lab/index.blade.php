<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('lab_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Lab" format="csv" />
                <livewire:excel-export model="Lab" format="xlsx" />
                <livewire:excel-export model="Lab" format="pdf" />
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
                            {{ trans('cruds.lab.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.lab_number') }}
                            @include('components.table.sort', ['field' => 'lab_number'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.patient') }}
                            @include('components.table.sort', ['field' => 'patient.name'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.weight') }}
                            @include('components.table.sort', ['field' => 'weight'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.doctor') }}
                            @include('components.table.sort', ['field' => 'doctor.doctor_name'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.category') }}
                            @include('components.table.sort', ['field' => 'category'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.patient_type') }}
                            @include('components.table.sort', ['field' => 'patient_type'])
                        </th>
                        <th>
                            {{ trans('cruds.lab.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($labs as $lab)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $lab->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $lab->id }}
                            </td>
                            <td>
                                {{ $lab->lab_number }}
                            </td>
                            <td>
                                @if($lab->patient)
                                    <span class="badge badge-relationship">{{ $lab->patient->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $lab->weight }}
                            </td>
                            <td>
                                @if($lab->doctor)
                                    <span class="badge badge-relationship">{{ $lab->doctor->doctor_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $lab->date }}
                            </td>
                            <td>
                                {{ $lab->category }}
                            </td>
                            <td>
                                {{ $lab->patient_type }}
                            </td>
                            <td>
                                {{ $lab->amount }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('lab_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.labs.show', $lab) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('lab_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.labs.edit', $lab) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('lab_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $lab->id }})" wire:loading.attr="disabled">
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
            {{ $labs->links() }}
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