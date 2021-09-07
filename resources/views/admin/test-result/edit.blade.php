@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.testResult.title_singular') }}:
                    {{ trans('cruds.testResult.fields.id') }}
                    {{ $testResult->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('test-result.edit', [$testResult])
        </div>
    </div>
</div>
@endsection