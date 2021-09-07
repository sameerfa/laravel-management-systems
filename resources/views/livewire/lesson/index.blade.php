<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('lesson_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Lesson" format="csv" />
                <livewire:excel-export model="Lesson" format="xlsx" />
                <livewire:excel-export model="Lesson" format="pdf" />
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
                            {{ trans('cruds.lesson.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.course') }}
                            @include('components.table.sort', ['field' => 'course.title'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.thumbnail') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.short_text') }}
                            @include('components.table.sort', ['field' => 'short_text'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.long_text') }}
                            @include('components.table.sort', ['field' => 'long_text'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.video') }}
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.position') }}
                            @include('components.table.sort', ['field' => 'position'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.is_published') }}
                            @include('components.table.sort', ['field' => 'is_published'])
                        </th>
                        <th>
                            {{ trans('cruds.lesson.fields.is_free') }}
                            @include('components.table.sort', ['field' => 'is_free'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lessons as $lesson)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $lesson->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $lesson->id }}
                            </td>
                            <td>
                                @if($lesson->course)
                                    <span class="badge badge-relationship">{{ $lesson->course->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $lesson->title }}
                            </td>
                            <td>
                                @foreach($lesson->thumbnail as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $lesson->short_text }}
                            </td>
                            <td>
                                {{ $lesson->long_text }}
                            </td>
                            <td>
                                @foreach($lesson->video as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $lesson->position }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $lesson->is_published ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $lesson->is_free ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('lesson_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.lessons.show', $lesson) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('lesson_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.lessons.edit', $lesson) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('lesson_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $lesson->id }})" wire:loading.attr="disabled">
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
            {{ $lessons->links() }}
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