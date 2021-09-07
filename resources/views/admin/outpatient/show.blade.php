@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.outpatient.title_singular') }}:
                    {{ trans('cruds.outpatient.fields.id') }}
                    {{ $outpatient->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.outpatient.fields.id') }}
                            </th>
                            <td>
                                {{ $outpatient->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.outpatient.fields.patient') }}
                            </th>
                            <td>
                                @if($outpatient->patient)
                                    <span class="badge badge-relationship">{{ $outpatient->patient->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.outpatient.fields.date') }}
                            </th>
                            <td>
                                {{ $outpatient->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.outpatient.fields.lab') }}
                            </th>
                            <td>
                                @if($outpatient->lab)
                                    <span class="badge badge-relationship">{{ $outpatient->lab->lab_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('outpatient_edit')
                    <a href="{{ route('admin.outpatients.edit', $outpatient) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.outpatients.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection