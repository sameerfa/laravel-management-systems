<?php

namespace App\Http\Livewire\Book;

use App\Models\Binding;
use App\Models\Book;
use App\Models\Category;
use App\Models\Shelf;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Book $book;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Book $book)
    {
        $this->book = $book;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.book.create');
    }

    public function submit()
    {
        $this->validate();

        $this->book->save();
        $this->syncMedia();

        return redirect()->route('admin.books.index');
    }

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function rules(): array
    {
        return [
            'book.isbn' => [
                'string',
                'required',
                'unique:books,isbn',
            ],
            'mediaCollections.book_book_image' => [
                'array',
                'required',
            ],
            'mediaCollections.book_book_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'book.book_title' => [
                'string',
                'required',
            ],
            'book.category_id' => [
                'integer',
                'exists:categories,id',
                'required',
            ],
            'book.binding_id' => [
                'integer',
                'exists:bindings,id',
                'required',
            ],
            'book.summary' => [
                'string',
                'nullable',
            ],
            'book.author_name' => [
                'string',
                'required',
            ],
            'mediaCollections.book_ebook' => [
                'array',
                'nullable',
            ],
            'mediaCollections.book_ebook.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'book.published_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'book.total_copies' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'book.available_copies' => [
                'string',
                'required',
            ],
            'book.shelf_id' => [
                'integer',
                'exists:shelves,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = Category::pluck('category_name', 'id')->toArray();
        $this->listsForFields['binding']  = Binding::pluck('binding_name', 'id')->toArray();
        $this->listsForFields['shelf']    = Shelf::pluck('shelf_number', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->book->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
