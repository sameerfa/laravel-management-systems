@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.crmDocument.title_singular') }}:
                    {{ trans('cruds.crmDocument.fields.id') }}
                    {{ $crmDocument->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.crmDocument.fields.id') }}
                            </th>
                            <td>
                                {{ $crmDocument->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmDocument.fields.customer') }}
                            </th>
                            <td>
                                @if($crmDocument->customer)
                                    <span class="badge badge-relationship">{{ $crmDocument->customer->first_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmDocument.fields.document_file') }}
                            </th>
                            <td>
                                @foreach($crmDocument->document_file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmDocument.fields.name') }}
                            </th>
                            <td>
                                {{ $crmDocument->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('crm_document_edit')
                    <a href="{{ route('admin.crm-documents.edit', $crmDocument) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.crm-documents.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection