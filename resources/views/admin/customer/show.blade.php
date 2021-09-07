@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.customer.title_singular') }}:
                    {{ trans('cruds.customer.fields.id') }}
                    {{ $customer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.id') }}
                            </th>
                            <td>
                                {{ $customer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.customer_name') }}
                            </th>
                            <td>
                                {{ $customer->customer_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.address') }}
                            </th>
                            <td>
                                {{ $customer->address }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.contact_number') }}
                            </th>
                            <td>
                                {{ $customer->contact_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.gender') }}
                            </th>
                            <td>
                                {{ $customer->gender_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.customer.fields.id_proof') }}
                            </th>
                            <td>
                                @foreach($customer->id_proof as $key => $entry)
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
                                {{ trans('cruds.customer.fields.address_proof') }}
                            </th>
                            <td>
                                @foreach($customer->address_proof as $key => $entry)
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
                                {{ trans('cruds.customer.fields.profile_image') }}
                            </th>
                            <td>
                                @foreach($customer->profile_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('customer_edit')
                    <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection