@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.outpatient.title_singular') }}:
                    {{ trans('cruds.outpatient.fields.id') }}
                    {{ $outpatient->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('outpatient.edit', [$outpatient])
        </div>
    </div>
</div>
@endsection