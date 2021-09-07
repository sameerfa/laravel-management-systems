@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.lab.title_singular') }}:
                    {{ trans('cruds.lab.fields.id') }}
                    {{ $lab->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.id') }}
                            </th>
                            <td>
                                {{ $lab->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.lab_number') }}
                            </th>
                            <td>
                                {{ $lab->lab_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.patient') }}
                            </th>
                            <td>
                                @if($lab->patient)
                                    <span class="badge badge-relationship">{{ $lab->patient->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.weight') }}
                            </th>
                            <td>
                                {{ $lab->weight }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.doctor') }}
                            </th>
                            <td>
                                @if($lab->doctor)
                                    <span class="badge badge-relationship">{{ $lab->doctor->doctor_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.date') }}
                            </th>
                            <td>
                                {{ $lab->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.category') }}
                            </th>
                            <td>
                                {{ $lab->category }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.patient_type') }}
                            </th>
                            <td>
                                {{ $lab->patient_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lab.fields.amount') }}
                            </th>
                            <td>
                                {{ $lab->amount }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('lab_edit')
                    <a href="{{ route('admin.labs.edit', $lab) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.labs.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection