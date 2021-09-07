@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.productCategory.title_singular') }}:
                    {{ trans('cruds.productCategory.fields.id') }}
                    {{ $productCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.productCategory.fields.id') }}
                            </th>
                            <td>
                                {{ $productCategory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.productCategory.fields.name') }}
                            </th>
                            <td>
                                {{ $productCategory->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.productCategory.fields.description') }}
                            </th>
                            <td>
                                {{ $productCategory->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.productCategory.fields.photo') }}
                            </th>
                            <td>
                                @foreach($productCategory->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('product_category_edit')
                    <a href="{{ route('admin.product-categories.edit', $productCategory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.product-categories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection