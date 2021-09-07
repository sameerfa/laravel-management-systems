@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.book.title_singular') }}:
                    {{ trans('cruds.book.fields.id') }}
                    {{ $book->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.id') }}
                            </th>
                            <td>
                                {{ $book->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.isbn') }}
                            </th>
                            <td>
                                {{ $book->isbn }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.book_image') }}
                            </th>
                            <td>
                                @foreach($book->book_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.book_title') }}
                            </th>
                            <td>
                                {{ $book->book_title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.category') }}
                            </th>
                            <td>
                                @if($book->category)
                                    <span class="badge badge-relationship">{{ $book->category->category_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.binding') }}
                            </th>
                            <td>
                                @if($book->binding)
                                    <span class="badge badge-relationship">{{ $book->binding->binding_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.summary') }}
                            </th>
                            <td>
                                {{ $book->summary }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.author_name') }}
                            </th>
                            <td>
                                {{ $book->author_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.ebook') }}
                            </th>
                            <td>
                                @foreach($book->ebook as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.published_date') }}
                            </th>
                            <td>
                                {{ $book->published_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.total_copies') }}
                            </th>
                            <td>
                                {{ $book->total_copies }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.available_copies') }}
                            </th>
                            <td>
                                {{ $book->available_copies }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.book.fields.shelf') }}
                            </th>
                            <td>
                                @if($book->shelf)
                                    <span class="badge badge-relationship">{{ $book->shelf->shelf_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('book_edit')
                    <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection