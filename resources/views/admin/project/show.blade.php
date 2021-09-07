@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.project.title_singular') }}:
                    {{ trans('cruds.project.fields.id') }}
                    {{ $project->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.id') }}
                            </th>
                            <td>
                                {{ $project->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.project_name') }}
                            </th>
                            <td>
                                {{ $project->project_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.brief') }}
                            </th>
                            <td>
                                {{ $project->brief }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.related_files') }}
                            </th>
                            <td>
                                @foreach($project->related_files as $key => $entry)
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
                                {{ trans('cruds.project.fields.customer') }}
                            </th>
                            <td>
                                @if($project->customer)
                                    <span class="badge badge-relationship">{{ $project->customer->first_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.hourly_rate') }}
                            </th>
                            <td>
                                {{ $project->hourly_rate }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.total_hours') }}
                            </th>
                            <td>
                                {{ $project->total_hours }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.project.fields.estimated_hours') }}
                            </th>
                            <td>
                                {{ $project->estimated_hours }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_edit')
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection