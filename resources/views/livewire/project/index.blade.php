<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('project_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Project" format="csv" />
                <livewire:excel-export model="Project" format="xlsx" />
                <livewire:excel-export model="Project" format="pdf" />
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
                            {{ trans('cruds.project.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.project_name') }}
                            @include('components.table.sort', ['field' => 'project_name'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.brief') }}
                            @include('components.table.sort', ['field' => 'brief'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.related_files') }}
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.customer') }}
                            @include('components.table.sort', ['field' => 'customer.first_name'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.hourly_rate') }}
                            @include('components.table.sort', ['field' => 'hourly_rate'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.total_hours') }}
                            @include('components.table.sort', ['field' => 'total_hours'])
                        </th>
                        <th>
                            {{ trans('cruds.project.fields.estimated_hours') }}
                            @include('components.table.sort', ['field' => 'estimated_hours'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $project->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $project->id }}
                            </td>
                            <td>
                                {{ $project->project_name }}
                            </td>
                            <td>
                                {{ $project->brief }}
                            </td>
                            <td>
                                @foreach($project->related_files as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if($project->customer)
                                    <span class="badge badge-relationship">{{ $project->customer->first_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $project->hourly_rate }}
                            </td>
                            <td>
                                {{ $project->total_hours }}
                            </td>
                            <td>
                                {{ $project->estimated_hours }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('project_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.projects.show', $project) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('project_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.projects.edit', $project) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('project_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $project->id }})" wire:loading.attr="disabled">
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
            {{ $projects->links() }}
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