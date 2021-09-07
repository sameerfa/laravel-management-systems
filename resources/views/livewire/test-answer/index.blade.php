<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('test_answer_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="TestAnswer" format="csv" />
                <livewire:excel-export model="TestAnswer" format="xlsx" />
                <livewire:excel-export model="TestAnswer" format="pdf" />
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
                            {{ trans('cruds.testAnswer.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.test_result') }}
                            @include('components.table.sort', ['field' => 'test_result.score'])
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.question') }}
                            @include('components.table.sort', ['field' => 'question.question_text'])
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.option') }}
                            @include('components.table.sort', ['field' => 'option.option_text'])
                        </th>
                        <th>
                            {{ trans('cruds.testAnswer.fields.is_correct') }}
                            @include('components.table.sort', ['field' => 'is_correct'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testAnswers as $testAnswer)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $testAnswer->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $testAnswer->id }}
                            </td>
                            <td>
                                @if($testAnswer->testResult)
                                    <span class="badge badge-relationship">{{ $testAnswer->testResult->score ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($testAnswer->question)
                                    <span class="badge badge-relationship">{{ $testAnswer->question->question_text ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($testAnswer->option)
                                    <span class="badge badge-relationship">{{ $testAnswer->option->option_text ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $testAnswer->is_correct ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('test_answer_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.test-answers.show', $testAnswer) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('test_answer_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.test-answers.edit', $testAnswer) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('test_answer_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $testAnswer->id }})" wire:loading.attr="disabled">
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
            {{ $testAnswers->links() }}
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