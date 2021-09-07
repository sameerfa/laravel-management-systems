@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.student.title_singular') }}:
                    {{ trans('cruds.student.fields.id') }}
                    {{ $student->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.id') }}
                            </th>
                            <td>
                                {{ $student->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.name') }}
                            </th>
                            <td>
                                {{ $student->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.gender') }}
                            </th>
                            <td>
                                {{ $student->gender_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.date_of_birth') }}
                            </th>
                            <td>
                                {{ $student->date_of_birth }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.department') }}
                            </th>
                            <td>
                                {{ $student->department }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.student.fields.contact_number') }}
                            </th>
                            <td>
                                {{ $student->contact_number }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('student_edit')
                    <a href="{{ route('admin.students.edit', $student) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection