@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.employee.title_singular') }}:
                    {{ trans('cruds.employee.fields.id') }}
                    {{ $employee->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.employee.fields.id') }}
                            </th>
                            <td>
                                {{ $employee->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee.fields.employee_name') }}
                            </th>
                            <td>
                                {{ $employee->employee_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee.fields.username') }}
                            </th>
                            <td>
                                {{ $employee->username }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee.fields.password') }}
                            </th>
                            <td>
                                **********
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee.fields.employee_type') }}
                            </th>
                            <td>
                                {{ $employee->employee_type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('employee_edit')
                    <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection