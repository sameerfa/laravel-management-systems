@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.inpatient.title_singular') }}:
                    {{ trans('cruds.inpatient.fields.id') }}
                    {{ $inpatient->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.inpatient.fields.id') }}
                            </th>
                            <td>
                                {{ $inpatient->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inpatient.fields.room') }}
                            </th>
                            <td>
                                @if($inpatient->room)
                                    <span class="badge badge-relationship">{{ $inpatient->room->room_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inpatient.fields.admission_date') }}
                            </th>
                            <td>
                                {{ $inpatient->admission_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inpatient.fields.discharge_date') }}
                            </th>
                            <td>
                                {{ $inpatient->discharge_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inpatient.fields.advance') }}
                            </th>
                            <td>
                                {{ $inpatient->advance }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inpatient.fields.lab') }}
                            </th>
                            <td>
                                @if($inpatient->lab)
                                    <span class="badge badge-relationship">{{ $inpatient->lab->lab_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('inpatient_edit')
                    <a href="{{ route('admin.inpatients.edit', $inpatient) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.inpatients.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection