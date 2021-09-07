@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.testResult.title_singular') }}:
                    {{ trans('cruds.testResult.fields.id') }}
                    {{ $testResult->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.testResult.fields.id') }}
                            </th>
                            <td>
                                {{ $testResult->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testResult.fields.test') }}
                            </th>
                            <td>
                                @if($testResult->test)
                                    <span class="badge badge-relationship">{{ $testResult->test->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testResult.fields.student') }}
                            </th>
                            <td>
                                @if($testResult->student)
                                    <span class="badge badge-relationship">{{ $testResult->student->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testResult.fields.score') }}
                            </th>
                            <td>
                                {{ $testResult->score }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('test_result_edit')
                    <a href="{{ route('admin.test-results.edit', $testResult) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.test-results.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection