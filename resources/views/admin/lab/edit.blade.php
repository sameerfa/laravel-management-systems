@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.lab.title_singular') }}:
                    {{ trans('cruds.lab.fields.id') }}
                    {{ $lab->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('lab.edit', [$lab])
        </div>
    </div>
</div>
@endsection