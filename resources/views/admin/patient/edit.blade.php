@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.patient.title_singular') }}:
                    {{ trans('cruds.patient.fields.id') }}
                    {{ $patient->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('patient.edit', [$patient])
        </div>
    </div>
</div>
@endsection