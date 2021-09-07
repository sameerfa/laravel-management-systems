@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.questionOption.title_singular') }}:
                    {{ trans('cruds.questionOption.fields.id') }}
                    {{ $questionOption->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.questionOption.fields.id') }}
                            </th>
                            <td>
                                {{ $questionOption->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionOption.fields.question') }}
                            </th>
                            <td>
                                @if($questionOption->question)
                                    <span class="badge badge-relationship">{{ $questionOption->question->question_text ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionOption.fields.option_text') }}
                            </th>
                            <td>
                                {{ $questionOption->option_text }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.questionOption.fields.is_correct') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $questionOption->is_correct ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('question_option_edit')
                    <a href="{{ route('admin.question-options.edit', $questionOption) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.question-options.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection