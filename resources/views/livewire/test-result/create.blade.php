<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('testResult.test_id') ? 'invalid' : '' }}">
        <label class="form-label" for="test">{{ trans('cruds.testResult.fields.test') }}</label>
        <x-select-list class="form-control" id="test" name="test" :options="$this->listsForFields['test']" wire:model="testResult.test_id" />
        <div class="validation-message">
            {{ $errors->first('testResult.test_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testResult.fields.test_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testResult.student_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="student">{{ trans('cruds.testResult.fields.student') }}</label>
        <x-select-list class="form-control" required id="student" name="student" :options="$this->listsForFields['student']" wire:model="testResult.student_id" />
        <div class="validation-message">
            {{ $errors->first('testResult.student_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testResult.fields.student_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('testResult.score') ? 'invalid' : '' }}">
        <label class="form-label" for="score">{{ trans('cruds.testResult.fields.score') }}</label>
        <input class="form-control" type="number" name="score" id="score" wire:model.defer="testResult.score" step="1">
        <div class="validation-message">
            {{ $errors->first('testResult.score') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.testResult.fields.score_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.test-results.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>