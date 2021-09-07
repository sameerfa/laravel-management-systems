@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.crmStatus.title_singular') }}:
                    {{ trans('cruds.crmStatus.fields.id') }}
                    {{ $crmStatus->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('crm-status.edit', [$crmStatus])
        </div>
    </div>
</div>
@endsection