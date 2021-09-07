@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.booking.title_singular') }}:
                    {{ trans('cruds.booking.fields.id') }}
                    {{ $booking->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.id') }}
                            </th>
                            <td>
                                {{ $booking->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.room') }}
                            </th>
                            <td>
                                @if($booking->room)
                                    <span class="badge badge-relationship">{{ $booking->room->room_number ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.customer') }}
                            </th>
                            <td>
                                @if($booking->customer)
                                    <span class="badge badge-relationship">{{ $booking->customer->customer_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.booking_date') }}
                            </th>
                            <td>
                                {{ $booking->booking_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.checkin') }}
                            </th>
                            <td>
                                {{ $booking->checkin }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.booking.fields.checkout') }}
                            </th>
                            <td>
                                {{ $booking->checkout }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('booking_edit')
                    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection