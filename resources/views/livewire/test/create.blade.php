<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('test.course_id') ? 'invalid' : '' }}">
        <label class="form-label" for="course">{{ trans('cruds.test.fields.course') }}</label>
        <x-select-list class="form-control" id="course" name="course" :options="$this->listsForFields['course']" wire:model="test.course_id" />
        <div class="validation-message">
            {{ $errors->first('test.course_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.course_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.lesson_id') ? 'invalid' : '' }}">
        <label class="form-label" for="lesson">{{ trans('cruds.test.fields.lesson') }}</label>
        <x-select-list class="form-control" id="lesson" name="lesson" :options="$this->listsForFields['lesson']" wire:model="test.lesson_id" />
        <div class="validation-message">
            {{ $errors->first('test.lesson_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.lesson_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.test.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="test.title">
        <div class="validation-message">
            {{ $errors->first('test.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.test.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="test.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('test.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('test.is_published') ? 'invalid' : '' }}">
        <label class="form-label" for="is_published">{{ trans('cruds.test.fields.is_published') }}</label>
        <input class="form-control" type="checkbox" name="is_published" id="is_published" wire:model.defer="test.is_published">
        <div class="validation-message">
            {{ $errors->first('test.is_published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.test.fields.is_published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tests.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>