@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.borrower.title_singular') }}:
                    {{ trans('cruds.borrower.fields.id') }}
                    {{ $borrower->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('borrower.edit', [$borrower])
        </div>
    </div>
</div>
@endsection