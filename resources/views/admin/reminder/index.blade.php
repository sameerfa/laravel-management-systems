@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.reminder.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('reminder_create')
                    <a class="btn btn-indigo" href="{{ route('admin.reminders.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.reminder.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('reminder.index')

    </div>
</div>
@endsection