@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.expense.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('expense_create')
                    <a class="btn btn-indigo" href="{{ route('admin.expenses.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.expense.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('expense.index')

    </div>
</div>
@endsection