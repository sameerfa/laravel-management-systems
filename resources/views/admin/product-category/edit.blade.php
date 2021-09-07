@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.productCategory.title_singular') }}:
                    {{ trans('cruds.productCategory.fields.id') }}
                    {{ $productCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('product-category.edit', [$productCategory])
        </div>
    </div>
</div>
@endsection