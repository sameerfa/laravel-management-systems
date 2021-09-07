@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.course.title_singular') }}:
                    {{ trans('cruds.course.fields.id') }}
                    {{ $course->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.id') }}
                            </th>
                            <td>
                                {{ $course->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.teacher') }}
                            </th>
                            <td>
                                @if($course->teacher)
                                    <span class="badge badge-relationship">{{ $course->teacher->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.title') }}
                            </th>
                            <td>
                                {{ $course->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.description') }}
                            </th>
                            <td>
                                {{ $course->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.price') }}
                            </th>
                            <td>
                                {{ $course->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.thumbnail') }}
                            </th>
                            <td>
                                @foreach($course->thumbnail as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.is_published') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $course->is_published ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.course.fields.students') }}
                            </th>
                            <td>
                                @foreach($course->students as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('course_edit')
                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection