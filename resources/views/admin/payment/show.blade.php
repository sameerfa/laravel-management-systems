@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.payment.title_singular') }}:
                    {{ trans('cruds.payment.fields.id') }}
                    {{ $payment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.id') }}
                            </th>
                            <td>
                                {{ $payment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.booking') }}
                            </th>
                            <td>
                                @if($payment->booking)
                                    <span class="badge badge-relationship">{{ $payment->booking->booking_date ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.type') }}
                            </th>
                            <td>
                                {{ $payment->type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.amount') }}
                            </th>
                            <td>
                                {{ $payment->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_type') }}
                            </th>
                            <td>
                                {{ $payment->payment_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_details') }}
                            </th>
                            <td>
                                {{ $payment->payment_details }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.payment.fields.payment_date') }}
                            </th>
                            <td>
                                {{ $payment->payment_date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('payment_edit')
                    <a href="{{ route('admin.payments.edit', $payment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection