@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.roomType.title_singular') }}:
                    {{ trans('cruds.roomType.fields.id') }}
                    {{ $roomType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.roomType.fields.id') }}
                            </th>
                            <td>
                                {{ $roomType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.roomType.fields.room_type') }}
                            </th>
                            <td>
                                {{ $roomType->room_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.roomType.fields.room_img') }}
                            </th>
                            <td>
                                @foreach($roomType->room_img as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.roomType.fields.description') }}
                            </th>
                            <td>
                                {{ $roomType->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.roomType.fields.cost') }}
                            </th>
                            <td>
                                {{ $roomType->cost }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('room_type_edit')
                    <a href="{{ route('admin.room-types.edit', $roomType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.room-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection