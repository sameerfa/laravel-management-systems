@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.itemTable.title_singular') }}:
                    {{ trans('cruds.itemTable.fields.id') }}
                    {{ $itemTable->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('item-table.edit', [$itemTable])
        </div>
    </div>
</div>
@endsection