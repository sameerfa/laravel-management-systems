@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.inpatient.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('inpatient_create')
                    <a class="btn btn-indigo" href="{{ route('admin.inpatients.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.inpatient.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('inpatient.index')

    </div>
</div>
@endsection