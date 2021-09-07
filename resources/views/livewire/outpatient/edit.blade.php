<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('outpatient.patient_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="patient">{{ trans('cruds.outpatient.fields.patient') }}</label>
        <x-select-list class="form-control" required id="patient" name="patient" :options="$this->listsForFields['patient']" wire:model="outpatient.patient_id" />
        <div class="validation-message">
            {{ $errors->first('outpatient.patient_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.outpatient.fields.patient_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('outpatient.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.outpatient.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="outpatient.date" id="date" name="date" />
        <div class="validation-message">
            {{ $errors->first('outpatient.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.outpatient.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('outpatient.lab_id') ? 'invalid' : '' }}">
        <label class="form-label" for="lab">{{ trans('cruds.outpatient.fields.lab') }}</label>
        <x-select-list class="form-control" id="lab" name="lab" :options="$this->listsForFields['lab']" wire:model="outpatient.lab_id" />
        <div class="validation-message">
            {{ $errors->first('outpatient.lab_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.outpatient.fields.lab_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.outpatients.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>