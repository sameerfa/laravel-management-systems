@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.crmCustomer.title_singular') }}:
                    {{ trans('cruds.crmCustomer.fields.id') }}
                    {{ $crmCustomer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.id') }}
                            </th>
                            <td>
                                {{ $crmCustomer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.first_name') }}
                            </th>
                            <td>
                                {{ $crmCustomer->first_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.last_name') }}
                            </th>
                            <td>
                                {{ $crmCustomer->last_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.status') }}
                            </th>
                            <td>
                                @if($crmCustomer->status)
                                    <span class="badge badge-relationship">{{ $crmCustomer->status->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $crmCustomer->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $crmCustomer->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.phone') }}
                            </th>
                            <td>
                                {{ $crmCustomer->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.address') }}
                            </th>
                            <td>
                                {{ $crmCustomer->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.skype') }}
                            </th>
                            <td>
                                {{ $crmCustomer->skype }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.website') }}
                            </th>
                            <td>
                                {{ $crmCustomer->website }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.crmCustomer.fields.description') }}
                            </th>
                            <td>
                                {{ $crmCustomer->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('crm_customer_edit')
                    <a href="{{ route('admin.crm-customers.edit', $crmCustomer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.crm-customers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection