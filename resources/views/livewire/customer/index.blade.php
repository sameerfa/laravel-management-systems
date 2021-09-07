<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('customer_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Customer" format="csv" />
                <livewire:excel-export model="Customer" format="xlsx" />
                <livewire:excel-export model="Customer" format="pdf" />
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
                            {{ trans('cruds.customer.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.customer_name') }}
                            @include('components.table.sort', ['field' => 'customer_name'])
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.address') }}
                            @include('components.table.sort', ['field' => 'address'])
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.contact_number') }}
                            @include('components.table.sort', ['field' => 'contact_number'])
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.gender') }}
                            @include('components.table.sort', ['field' => 'gender'])
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.id_proof') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.address_proof') }}
                        </th>
                        <th>
                            {{ trans('cruds.customer.fields.profile_image') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $customer->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $customer->id }}
                            </td>
                            <td>
                                {{ $customer->customer_name }}
                            </td>
                            <td>
                                {{ $customer->address }}
                            </td>
                            <td>
                                {{ $customer->contact_number }}
                            </td>
                            <td>
                                {{ $customer->gender_label }}
                            </td>
                            <td>
                                @foreach($customer->id_proof as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($customer->address_proof as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($customer->profile_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('customer_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.customers.show', $customer) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('customer_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.customers.edit', $customer) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('customer_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $customer->id }})" wire:loading.attr="disabled">
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
            {{ $customers->links() }}
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