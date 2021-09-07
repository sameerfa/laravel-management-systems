@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.question.title_singular') }}:
                    {{ trans('cruds.question.fields.id') }}
                    {{ $question->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('question.edit', [$question])
        </div>
    </div>
</div>
@endsection