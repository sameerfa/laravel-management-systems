@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.lesson.title_singular') }}:
                    {{ trans('cruds.lesson.fields.id') }}
                    {{ $lesson->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('lesson.edit', [$lesson])
        </div>
    </div>
</div>
@endsection