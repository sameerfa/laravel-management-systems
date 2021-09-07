@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.book.title_singular') }}:
                    {{ trans('cruds.book.fields.id') }}
                    {{ $book->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('book.edit', [$book])
        </div>
    </div>
</div>
@endsection