<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('crm_customer_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="CrmCustomer" format="csv" />
                <livewire:excel-export model="CrmCustomer" format="xlsx" />
                <livewire:excel-export model="CrmCustomer" format="pdf" />
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
                            {{ trans('cruds.crmCustomer.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.first_name') }}
                            @include('components.table.sort', ['field' => 'first_name'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.last_name') }}
                            @include('components.table.sort', ['field' => 'last_name'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.status') }}
                            @include('components.table.sort', ['field' => 'status.name'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.skype') }}
                            @include('components.table.sort', ['field' => 'skype'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.website') }}
                            @include('components.table.sort', ['field' => 'website'])
                        </th>
                        <th>
                            {{ trans('cruds.crmCustomer.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($crmCustomers as $crmCustomer)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $crmCustomer->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $crmCustomer->id }}
                            </td>
                            <td>
                                {{ $crmCustomer->first_name }}
                            </td>
                            <td>
                                {{ $crmCustomer->last_name }}
                            </td>
                            <td>
                                @if($crmCustomer->status)
                                    <span class="badge badge-relationship">{{ $crmCustomer->status->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $crmCustomer->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $crmCustomer->email }}
                                </a>
                            </td>
                            <td>
                                {{ $crmCustomer->phone }}
                            </td>
                            <td>
                                {{ $crmCustomer->address }}
                            </td>
                            <td>
                                {{ $crmCustomer->skype }}
                            </td>
                            <td>
                                {{ $crmCustomer->website }}
                            </td>
                            <td>
                                {{ $crmCustomer->description }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('crm_customer_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.crm-customers.show', $crmCustomer) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('crm_customer_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.crm-customers.edit', $crmCustomer) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('crm_customer_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $crmCustomer->id }})" wire:loading.attr="disabled">
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
            {{ $crmCustomers->links() }}
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