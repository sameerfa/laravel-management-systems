@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.binding.title_singular') }}:
                    {{ trans('cruds.binding.fields.id') }}
                    {{ $binding->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.binding.fields.id') }}
                            </th>
                            <td>
                                {{ $binding->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.binding.fields.binding_name') }}
                            </th>
                            <td>
                                {{ $binding->binding_name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('binding_edit')
                    <a href="{{ route('admin.bindings.edit', $binding) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.bindings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection