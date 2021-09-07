<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('question.course_id') ? 'invalid' : '' }}">
        <label class="form-label" for="course">{{ trans('cruds.question.fields.course') }}</label>
        <x-select-list class="form-control" id="course" name="course" :options="$this->listsForFields['course']" wire:model="question.course_id" />
        <div class="validation-message">
            {{ $errors->first('question.course_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.course_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.question_text') ? 'invalid' : '' }}">
        <label class="form-label required" for="question_text">{{ trans('cruds.question.fields.question_text') }}</label>
        <input class="form-control" type="text" name="question_text" id="question_text" required wire:model.defer="question.question_text">
        <div class="validation-message">
            {{ $errors->first('question.question_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.question_text_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.question_question_image') ? 'invalid' : '' }}">
        <label class="form-label" for="question_image">{{ trans('cruds.question.fields.question_image') }}</label>
        <x-dropzone id="question_image" name="question_image" action="{{ route('admin.questions.storeMedia') }}" collection-name="question_question_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.question_question_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.question_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('question.points') ? 'invalid' : '' }}">
        <label class="form-label" for="points">{{ trans('cruds.question.fields.points') }}</label>
        <input class="form-control" type="number" name="points" id="points" wire:model.defer="question.points" step="1">
        <div class="validation-message">
            {{ $errors->first('question.points') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.question.fields.points_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.questions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>