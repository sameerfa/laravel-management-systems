<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('book_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Book" format="csv" />
                <livewire:excel-export model="Book" format="xlsx" />
                <livewire:excel-export model="Book" format="pdf" />
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
                            {{ trans('cruds.book.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.isbn') }}
                            @include('components.table.sort', ['field' => 'isbn'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.book_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.book_title') }}
                            @include('components.table.sort', ['field' => 'book_title'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.category') }}
                            @include('components.table.sort', ['field' => 'category.category_name'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.binding') }}
                            @include('components.table.sort', ['field' => 'binding.binding_name'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.summary') }}
                            @include('components.table.sort', ['field' => 'summary'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.author_name') }}
                            @include('components.table.sort', ['field' => 'author_name'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.ebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.published_date') }}
                            @include('components.table.sort', ['field' => 'published_date'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.total_copies') }}
                            @include('components.table.sort', ['field' => 'total_copies'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.available_copies') }}
                            @include('components.table.sort', ['field' => 'available_copies'])
                        </th>
                        <th>
                            {{ trans('cruds.book.fields.shelf') }}
                            @include('components.table.sort', ['field' => 'shelf.shelf_number'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $book->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $book->id }}
                            </td>
                            <td>
                                {{ $book->isbn }}
                            </td>
                            <td>
                                @foreach($book->book_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $book->book_title }}
                            </td>
                            <td>
                                @if($book->category)
                                    <span class="badge badge-relationship">{{ $book->category->category_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($book->binding)
                                    <span class="badge badge-relationship">{{ $book->binding->binding_name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $book->summary }}
                            </td>
                            <td>
                                {{ $book->author_name }}
                            </td>
                            <td>
                                @foreach($book->ebook as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $book->published_date }}
                            </td>
                            <td>
                                {{ $book->total_copies }}
                            </td>
                            <td>
                                {{ $book->available_copies }}
                            </td>
                            <td>
                                @if($book->shelf)
                                    <span class="badge badge-relationship">{{ $book->shelf->shelf_number ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('book_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.books.show', $book) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('book_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.books.edit', $book) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('book_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $book->id }})" wire:loading.attr="disabled">
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
            {{ $books->links() }}
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