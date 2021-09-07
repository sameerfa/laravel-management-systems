@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.lesson.title_singular') }}:
                    {{ trans('cruds.lesson.fields.id') }}
                    {{ $lesson->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.id') }}
                            </th>
                            <td>
                                {{ $lesson->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.course') }}
                            </th>
                            <td>
                                @if($lesson->course)
                                    <span class="badge badge-relationship">{{ $lesson->course->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.title') }}
                            </th>
                            <td>
                                {{ $lesson->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.thumbnail') }}
                            </th>
                            <td>
                                @foreach($lesson->thumbnail as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.short_text') }}
                            </th>
                            <td>
                                {{ $lesson->short_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.long_text') }}
                            </th>
                            <td>
                                {{ $lesson->long_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.video') }}
                            </th>
                            <td>
                                @foreach($lesson->video as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.position') }}
                            </th>
                            <td>
                                {{ $lesson->position }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.is_published') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $lesson->is_published ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.lesson.fields.is_free') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $lesson->is_free ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('lesson_edit')
                    <a href="{{ route('admin.lessons.edit', $lesson) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.lessons.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection