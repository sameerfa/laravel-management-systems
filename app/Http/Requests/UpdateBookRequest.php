<?php

namespace App\Http\Requests;

use App\Models\Book;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('book_edit');
    }

    protected function rules(): array
    {
        return [
            'book.isbn' => [
                'string',
                'required',
                'unique:books,isbn,' . $this->book->id,
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
}
