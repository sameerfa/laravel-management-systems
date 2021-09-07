@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.crmNote.title_singular') }}:
                    {{ trans('cruds.crmNote.fields.id') }}
                    {{ $crmNote->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.crmNote.fields.id') }}
                            </th>
                            <td>
                                {{ $crmNote->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmNote.fields.customer') }}
                            </th>
                            <td>
                                @if($crmNote->customer)
                                    <span class="badge badge-relationship">{{ $crmNote->customer->first_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmNote.fields.note') }}
                            </th>
                            <td>
                                {{ $crmNote->note }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('crm_note_edit')
                    <a href="{{ route('admin.crm-notes.edit', $crmNote) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.crm-notes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection