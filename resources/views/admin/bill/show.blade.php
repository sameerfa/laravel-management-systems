@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.bill.title_singular') }}:
                    {{ trans('cruds.bill.fields.id') }}
                    {{ $bill->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.id') }}
                            </th>
                            <td>
                                {{ $bill->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.patient') }}
                            </th>
                            <td>
                                @if($bill->patient)
                                    <span class="badge badge-relationship">{{ $bill->patient->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.patient_type') }}
                            </th>
                            <td>
                                {{ $bill->patient_type_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.doctor_charge') }}
                            </th>
                            <td>
                                {{ $bill->doctor_charge }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.medicine_charge') }}
                            </th>
                            <td>
                                {{ $bill->medicine_charge }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.room_charge') }}
                            </th>
                            <td>
                                {{ $bill->room_charge }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.operation_charge') }}
                            </th>
                            <td>
                                {{ $bill->operation_charge }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.no_of_days') }}
                            </th>
                            <td>
                                {{ $bill->no_of_days }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.nursing_charge') }}
                            </th>
                            <td>
                                {{ $bill->nursing_charge }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.advance') }}
                            </th>
                            <td>
                                {{ $bill->advance }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.health_card') }}
                            </th>
                            <td>
                                {{ $bill->health_card }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.lab_charge') }}
                            </th>
                            <td>
                                {{ $bill->lab_charge }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bill.fields.bill') }}
                            </th>
                            <td>
                                {{ $bill->bill }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('bill_edit')
                    <a href="{{ route('admin.bills.edit', $bill) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.bills.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection