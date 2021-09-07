@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.room.title_singular') }}:
                    {{ trans('cruds.room.fields.id') }}
                    {{ $room->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.room.fields.id') }}
                            </th>
                            <td>
                                {{ $room->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.room.fields.room_number') }}
                            </th>
                            <td>
                                {{ $room->room_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.room.fields.room_type') }}
                            </th>
                            <td>
                                {{ $room->room_type }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('room_edit')
                    <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection