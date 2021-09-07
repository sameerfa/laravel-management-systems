<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\Admin\BookResource;
use App\Models\Book;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookResource(Book::with(['category', 'binding', 'shelf'])->get());
    }

    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        if ($request->input('book_image', false)) {
            $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('book_image'))))->toMediaCollection('book_image');
        }

        if ($request->input('ebook', false)) {
            $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('ebook'))))->toMediaCollection('ebook');
        }

        return (new BookResource($book))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Book $book)
    {
        abort_if(Gate::denies('book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookResource($book->load(['category', 'binding', 'shelf']));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        if ($request->input('book_image', false)) {
            if (!$book->book_image || $request->input('book_image') !== $book->book_image->file_name) {
                if ($book->book_image) {
                    $book->book_image->delete();
                }
                $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('book_image'))))->toMediaCollection('book_image');
            }
        } elseif ($book->book_image) {
            $book->book_image->delete();
        }

        if ($request->input('ebook', false)) {
            if (!$book->ebook || $request->input('ebook') !== $book->ebook->file_name) {
                if ($book->ebook) {
                    $book->ebook->delete();
                }
                $book->addMedia(storage_path('tmp/uploads/' . basename($request->input('ebook'))))->toMediaCollection('ebook');
            }
        } elseif ($book->ebook) {
            $book->ebook->delete();
        }

        return (new BookResource($book))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Book $book)
    {
        abort_if(Gate::denies('book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $book->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
