@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.itemTable.title_singular') }}:
                    {{ trans('cruds.itemTable.fields.id') }}
                    {{ $itemTable->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.itemTable.fields.id') }}
                            </th>
                            <td>
                                {{ $itemTable->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.itemTable.fields.name') }}
                            </th>
                            <td>
                                {{ $itemTable->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.itemTable.fields.cost') }}
                            </th>
                            <td>
                                {{ $itemTable->cost }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.itemTable.fields.details') }}
                            </th>
                            <td>
                                {{ $itemTable->details }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('item_table_edit')
                    <a href="{{ route('admin.item-tables.edit', $itemTable) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.item-tables.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection