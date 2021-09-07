@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.productTag.title_singular') }}:
                    {{ trans('cruds.productTag.fields.id') }}
                    {{ $productTag->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('product-tag.edit', [$productTag])
        </div>
    </div>
</div>
@endsection