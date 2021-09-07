@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.expense.title_singular') }}:
                    {{ trans('cruds.expense.fields.id') }}
                    {{ $expense->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.id') }}
                            </th>
                            <td>
                                {{ $expense->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.employee') }}
                            </th>
                            <td>
                                @if($expense->employee)
                                    <span class="badge badge-relationship">{{ $expense->employee->employee_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.expense_type') }}
                            </th>
                            <td>
                                {{ $expense->expense_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.description') }}
                            </th>
                            <td>
                                {{ $expense->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.amount') }}
                            </th>
                            <td>
                                {{ $expense->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expense.fields.date') }}
                            </th>
                            <td>
                                {{ $expense->date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('expense_edit')
                    <a href="{{ route('admin.expenses.edit', $expense) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.expenses.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection