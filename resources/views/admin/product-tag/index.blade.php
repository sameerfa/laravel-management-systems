@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.productTag.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('product_tag_create')
                    <a class="btn btn-indigo" href="{{ route('admin.product-tags.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.productTag.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('product-tag.index')

    </div>
</div>
@endsection