<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('course.teacher_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="teacher">{{ trans('cruds.course.fields.teacher') }}</label>
        <x-select-list class="form-control" required id="teacher" name="teacher" :options="$this->listsForFields['teacher']" wire:model="course.teacher_id" />
        <div class="validation-message">
            {{ $errors->first('course.teacher_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.course.fields.teacher_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('course.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.course.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="course.title">
        <div class="validation-message">
            {{ $errors->first('course.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.course.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('course.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.course.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" required wire:model.defer="course.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('course.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.course.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('course.price') ? 'invalid' : '' }}">
        <label class="form-label" for="price">{{ trans('cruds.course.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" wire:model.defer="course.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('course.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.course.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.course_thumbnail') ? 'invalid' : '' }}">
        <label class="form-label" for="thumbnail">{{ trans('cruds.course.fields.thumbnail') }}</label>
        <x-dropzone id="thumbnail" name="thumbnail" action="{{ route('admin.courses.storeMedia') }}" collection-name="course_thumbnail" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.course_thumbnail') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.course.fields.thumbnail_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('course.is_published') ? 'invalid' : '' }}">
        <label class="form-label" for="is_published">{{ trans('cruds.course.fields.is_published') }}</label>
        <input class="form-control" type="checkbox" name="is_published" id="is_published" wire:model.defer="course.is_published">
        <div class="validation-message">
            {{ $errors->first('course.is_published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.course.fields.is_published_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('students') ? 'invalid' : '' }}">
        <label class="form-label" for="students">{{ trans('cruds.course.fields.students') }}</label>
        <x-select-list class="form-control" id="students" name="students" wire:model="students" :options="$this->listsForFields['students']" multiple />
        <div class="validation-message">
            {{ $errors->first('students') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.course.fields.students_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>