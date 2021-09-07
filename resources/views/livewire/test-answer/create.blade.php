<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('testAnswer.test_result_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="test_result">{{ trans('cruds.testAnswer.fields.test_result') }}</label>
        <x-select-list class="form-control" required id="test_result" name="test_result" :options="$this->listsForFields['test_result']" wire:model="testAnswer.test_result_id" />
        <div class="validation-message">
            {{ $errors->first('testAnswer.test_result_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testAnswer.fields.test_result_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testAnswer.question_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="question">{{ trans('cruds.testAnswer.fields.question') }}</label>
        <x-select-list class="form-control" required id="question" name="question" :options="$this->listsForFields['question']" wire:model="testAnswer.question_id" />
        <div class="validation-message">
            {{ $errors->first('testAnswer.question_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testAnswer.fields.question_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testAnswer.option_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="option">{{ trans('cruds.testAnswer.fields.option') }}</label>
        <x-select-list class="form-control" required id="option" name="option" :options="$this->listsForFields['option']" wire:model="testAnswer.option_id" />
        <div class="validation-message">
            {{ $errors->first('testAnswer.option_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testAnswer.fields.option_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testAnswer.is_correct') ? 'invalid' : '' }}">
        <label class="form-label" for="is_correct">{{ trans('cruds.testAnswer.fields.is_correct') }}</label>
        <input class="form-control" type="checkbox" name="is_correct" id="is_correct" wire:model.defer="testAnswer.is_correct">
        <div class="validation-message">
            {{ $errors->first('testAnswer.is_correct') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testAnswer.fields.is_correct_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.test-answers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>