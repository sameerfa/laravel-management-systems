@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.borrower.title_singular') }}:
                    {{ trans('cruds.borrower.fields.id') }}
                    {{ $borrower->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.borrower.fields.id') }}
                            </th>
                            <td>
                                {{ $borrower->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.borrower.fields.student') }}
                            </th>
                            <td>
                                @if($borrower->student)
                                    <span class="badge badge-relationship">{{ $borrower->student->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.borrower.fields.book') }}
                            </th>
                            <td>
                                @if($borrower->book)
                                    <span class="badge badge-relationship">{{ $borrower->book->isbn ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.borrower.fields.borrowed_from') }}
                            </th>
                            <td>
                                {{ $borrower->borrowed_from }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.borrower.fields.borrowed_to') }}
                            </th>
                            <td>
                                {{ $borrower->borrowed_to }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.borrower.fields.return_date') }}
                            </th>
                            <td>
                                {{ $borrower->return_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.borrower.fields.user') }}
                            </th>
                            <td>
                                @if($borrower->user)
                                    <span class="badge badge-relationship">{{ $borrower->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('borrower_edit')
                    <a href="{{ route('admin.borrowers.edit', $borrower) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.borrowers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection