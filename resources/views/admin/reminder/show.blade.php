@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.reminder.title_singular') }}:
                    {{ trans('cruds.reminder.fields.id') }}
                    {{ $reminder->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.reminder.fields.id') }}
                            </th>
                            <td>
                                {{ $reminder->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reminder.fields.booking') }}
                            </th>
                            <td>
                                @if($reminder->booking)
                                    <span class="badge badge-relationship">{{ $reminder->booking->booking_date ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reminder.fields.reminder_type') }}
                            </th>
                            <td>
                                {{ $reminder->reminder_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reminder.fields.reminder_detail') }}
                            </th>
                            <td>
                                {{ $reminder->reminder_detail }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.reminder.fields.datetime') }}
                            </th>
                            <td>
                                {{ $reminder->datetime }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('reminder_edit')
                    <a href="{{ route('admin.reminders.edit', $reminder) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.reminders.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection