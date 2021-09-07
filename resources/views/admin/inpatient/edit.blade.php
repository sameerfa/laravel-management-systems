@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.inpatient.title_singular') }}:
                    {{ trans('cruds.inpatient.fields.id') }}
                    {{ $inpatient->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('inpatient.edit', [$inpatient])
        </div>
    </div>
</div>
@endsection