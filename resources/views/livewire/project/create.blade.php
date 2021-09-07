<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('project.project_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="project_name">{{ trans('cruds.project.fields.project_name') }}</label>
        <input class="form-control" type="text" name="project_name" id="project_name" required wire:model.defer="project.project_name">
        <div class="validation-message">
            {{ $errors->first('project.project_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.project_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.brief') ? 'invalid' : '' }}">
        <label class="form-label required" for="brief">{{ trans('cruds.project.fields.brief') }}</label>
        <textarea class="form-control" name="brief" id="brief" required wire:model.defer="project.brief" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('project.brief') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.brief_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.project_related_files') ? 'invalid' : '' }}">
        <label class="form-label" for="related_files">{{ trans('cruds.project.fields.related_files') }}</label>
        <x-dropzone id="related_files" name="related_files" action="{{ route('admin.projects.storeMedia') }}" collection-name="project_related_files" max-file-size="20" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.project_related_files') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.related_files_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.customer_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="customer">{{ trans('cruds.project.fields.customer') }}</label>
        <x-select-list class="form-control" required id="customer" name="customer" :options="$this->listsForFields['customer']" wire:model="project.customer_id" />
        <div class="validation-message">
            {{ $errors->first('project.customer_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.customer_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.hourly_rate') ? 'invalid' : '' }}">
        <label class="form-label required" for="hourly_rate">{{ trans('cruds.project.fields.hourly_rate') }}</label>
        <input class="form-control" type="number" name="hourly_rate" id="hourly_rate" required wire:model.defer="project.hourly_rate" step="0.01">
        <div class="validation-message">
            {{ $errors->first('project.hourly_rate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.hourly_rate_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.total_hours') ? 'invalid' : '' }}">
        <label class="form-label required" for="total_hours">{{ trans('cruds.project.fields.total_hours') }}</label>
        <input class="form-control" type="number" name="total_hours" id="total_hours" required wire:model.defer="project.total_hours" step="1">
        <div class="validation-message">
            {{ $errors->first('project.total_hours') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.total_hours_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.estimated_hours') ? 'invalid' : '' }}">
        <label class="form-label" for="estimated_hours">{{ trans('cruds.project.fields.estimated_hours') }}</label>
        <input class="form-control" type="number" name="estimated_hours" id="estimated_hours" wire:model.defer="project.estimated_hours" step="1">
        <div class="validation-message">
            {{ $errors->first('project.estimated_hours') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.estimated_hours_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>