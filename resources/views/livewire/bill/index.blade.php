<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('bill_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Bill" format="csv" />
                <livewire:excel-export model="Bill" format="xlsx" />
                <livewire:excel-export model="Bill" format="pdf" />
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
                            {{ trans('cruds.bill.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.patient') }}
                            @include('components.table.sort', ['field' => 'patient.name'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.patient_type') }}
                            @include('components.table.sort', ['field' => 'patient_type'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.doctor_charge') }}
                            @include('components.table.sort', ['field' => 'doctor_charge'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.medicine_charge') }}
                            @include('components.table.sort', ['field' => 'medicine_charge'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.room_charge') }}
                            @include('components.table.sort', ['field' => 'room_charge'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.operation_charge') }}
                            @include('components.table.sort', ['field' => 'operation_charge'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.no_of_days') }}
                            @include('components.table.sort', ['field' => 'no_of_days'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.nursing_charge') }}
                            @include('components.table.sort', ['field' => 'nursing_charge'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.advance') }}
                            @include('components.table.sort', ['field' => 'advance'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.health_card') }}
                            @include('components.table.sort', ['field' => 'health_card'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.lab_charge') }}
                            @include('components.table.sort', ['field' => 'lab_charge'])
                        </th>
                        <th>
                            {{ trans('cruds.bill.fields.bill') }}
                            @include('components.table.sort', ['field' => 'bill'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bills as $bill)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $bill->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $bill->id }}
                            </td>
                            <td>
                                @if($bill->patient)
                                    <span class="badge badge-relationship">{{ $bill->patient->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $bill->patient_type_label }}
                            </td>
                            <td>
                                {{ $bill->doctor_charge }}
                            </td>
                            <td>
                                {{ $bill->medicine_charge }}
                            </td>
                            <td>
                                {{ $bill->room_charge }}
                            </td>
                            <td>
                                {{ $bill->operation_charge }}
                            </td>
                            <td>
                                {{ $bill->no_of_days }}
                            </td>
                            <td>
                                {{ $bill->nursing_charge }}
                            </td>
                            <td>
                                {{ $bill->advance }}
                            </td>
                            <td>
                                {{ $bill->health_card }}
                            </td>
                            <td>
                                {{ $bill->lab_charge }}
                            </td>
                            <td>
                                {{ $bill->bill }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('bill_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.bills.show', $bill) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('bill_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.bills.edit', $bill) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('bill_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $bill->id }})" wire:loading.attr="disabled">
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
            {{ $bills->links() }}
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