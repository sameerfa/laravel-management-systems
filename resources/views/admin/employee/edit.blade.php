@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.employee.title_singular') }}:
                    {{ trans('cruds.employee.fields.id') }}
                    {{ $employee->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('employee.edit', [$employee])
        </div>
    </div>
</div>
@endsection