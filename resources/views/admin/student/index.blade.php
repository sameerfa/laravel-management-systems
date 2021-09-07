@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.student.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('student_create')
                    <a class="btn btn-indigo" href="{{ route('admin.students.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.student.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('student.index')

    </div>
</div>
@endsection