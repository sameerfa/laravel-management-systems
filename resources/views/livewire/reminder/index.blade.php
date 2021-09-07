<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('reminder_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Reminder" format="csv" />
                <livewire:excel-export model="Reminder" format="xlsx" />
                <livewire:excel-export model="Reminder" format="pdf" />
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
                            {{ trans('cruds.reminder.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.reminder.fields.booking') }}
                            @include('components.table.sort', ['field' => 'booking.booking_date'])
                        </th>
                        <th>
                            {{ trans('cruds.reminder.fields.reminder_type') }}
                            @include('components.table.sort', ['field' => 'reminder_type'])
                        </th>
                        <th>
                            {{ trans('cruds.reminder.fields.reminder_detail') }}
                            @include('components.table.sort', ['field' => 'reminder_detail'])
                        </th>
                        <th>
                            {{ trans('cruds.reminder.fields.datetime') }}
                            @include('components.table.sort', ['field' => 'datetime'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reminders as $reminder)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $reminder->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $reminder->id }}
                            </td>
                            <td>
                                @if($reminder->booking)
                                    <span class="badge badge-relationship">{{ $reminder->booking->booking_date ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $reminder->reminder_type }}
                            </td>
                            <td>
                                {{ $reminder->reminder_detail }}
                            </td>
                            <td>
                                {{ $reminder->datetime }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('reminder_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.reminders.show', $reminder) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('reminder_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.reminders.edit', $reminder) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('reminder_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $reminder->id }})" wire:loading.attr="disabled">
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
            {{ $reminders->links() }}
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