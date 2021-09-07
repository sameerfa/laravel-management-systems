@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.reminder.title_singular') }}:
                    {{ trans('cruds.reminder.fields.id') }}
                    {{ $reminder->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('reminder.edit', [$reminder])
        </div>
    </div>
</div>
@endsection