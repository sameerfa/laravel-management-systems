@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.doctor.title_singular') }}:
                    {{ trans('cruds.doctor.fields.id') }}
                    {{ $doctor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('doctor.edit', [$doctor])
        </div>
    </div>
</div>
@endsection