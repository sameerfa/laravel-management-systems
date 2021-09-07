<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('questionOption.question_id') ? 'invalid' : '' }}">
        <label class="form-label" for="question">{{ trans('cruds.questionOption.fields.question') }}</label>
        <x-select-list class="form-control" id="question" name="question" :options="$this->listsForFields['question']" wire:model="questionOption.question_id" />
        <div class="validation-message">
            {{ $errors->first('questionOption.question_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.questionOption.fields.question_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('questionOption.option_text') ? 'invalid' : '' }}">
        <label class="form-label required" for="option_text">{{ trans('cruds.questionOption.fields.option_text') }}</label>
        <input class="form-control" type="text" name="option_text" id="option_text" required wire:model.defer="questionOption.option_text">
        <div class="validation-message">
            {{ $errors->first('questionOption.option_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.questionOption.fields.option_text_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('questionOption.is_correct') ? 'invalid' : '' }}">
        <label class="form-label" for="is_correct">{{ trans('cruds.questionOption.fields.is_correct') }}</label>
        <input class="form-control" type="checkbox" name="is_correct" id="is_correct" wire:model.defer="questionOption.is_correct">
        <div class="validation-message">
            {{ $errors->first('questionOption.is_correct') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.questionOption.fields.is_correct_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.question-options.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>