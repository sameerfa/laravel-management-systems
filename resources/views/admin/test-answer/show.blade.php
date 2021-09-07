@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.testAnswer.title_singular') }}:
                    {{ trans('cruds.testAnswer.fields.id') }}
                    {{ $testAnswer->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.id') }}
                            </th>
                            <td>
                                {{ $testAnswer->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.test_result') }}
                            </th>
                            <td>
                                @if($testAnswer->testResult)
                                    <span class="badge badge-relationship">{{ $testAnswer->testResult->score ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.question') }}
                            </th>
                            <td>
                                @if($testAnswer->question)
                                    <span class="badge badge-relationship">{{ $testAnswer->question->question_text ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.option') }}
                            </th>
                            <td>
                                @if($testAnswer->option)
                                    <span class="badge badge-relationship">{{ $testAnswer->option->option_text ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.testAnswer.fields.is_correct') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $testAnswer->is_correct ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('test_answer_edit')
                    <a href="{{ route('admin.test-answers.edit', $testAnswer) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.test-answers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection