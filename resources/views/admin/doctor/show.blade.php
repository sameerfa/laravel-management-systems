@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.doctor.title_singular') }}:
                    {{ trans('cruds.doctor.fields.id') }}
                    {{ $doctor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.doctor.fields.id') }}
                            </th>
                            <td>
                                {{ $doctor->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.doctor.fields.doctor_name') }}
                            </th>
                            <td>
                                {{ $doctor->doctor_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.doctor.fields.department') }}
                            </th>
                            <td>
                                {{ $doctor->department }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('doctor_edit')
                    <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection