@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.shelf.title_singular') }}:
                    {{ trans('cruds.shelf.fields.id') }}
                    {{ $shelf->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.shelf.fields.id') }}
                            </th>
                            <td>
                                {{ $shelf->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shelf.fields.shelf_number') }}
                            </th>
                            <td>
                                {{ $shelf->shelf_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shelf.fields.floor_number') }}
                            </th>
                            <td>
                                {{ $shelf->floor_number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('shelf_edit')
                    <a href="{{ route('admin.shelves.edit', $shelf) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.shelves.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection