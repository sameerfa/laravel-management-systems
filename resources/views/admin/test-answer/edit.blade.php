@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.testAnswer.title_singular') }}:
                    {{ trans('cruds.testAnswer.fields.id') }}
                    {{ $testAnswer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('test-answer.edit', [$testAnswer])
        </div>
    </div>
</div>
@endsection