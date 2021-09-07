@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.patient.title_singular') }}:
                    {{ trans('cruds.patient.fields.id') }}
                    {{ $patient->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.id') }}
                            </th>
                            <td>
                                {{ $patient->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.name') }}
                            </th>
                            <td>
                                {{ $patient->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.age') }}
                            </th>
                            <td>
                                {{ $patient->age }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.weight') }}
                            </th>
                            <td>
                                {{ $patient->weight }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.gender') }}
                            </th>
                            <td>
                                {{ $patient->gender_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.address') }}
                            </th>
                            <td>
                                {{ $patient->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.phone_number') }}
                            </th>
                            <td>
                                {{ $patient->phone_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.patient.fields.disease') }}
                            </th>
                            <td>
                                {{ $patient->disease }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('patient_edit')
                    <a href="{{ route('admin.patients.edit', $patient) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection