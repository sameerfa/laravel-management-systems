<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('inpatient.room_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="room">{{ trans('cruds.inpatient.fields.room') }}</label>
        <x-select-list class="form-control" required id="room" name="room" :options="$this->listsForFields['room']" wire:model="inpatient.room_id" />
        <div class="validation-message">
            {{ $errors->first('inpatient.room_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inpatient.fields.room_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inpatient.admission_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="admission_date">{{ trans('cruds.inpatient.fields.admission_date') }}</label>
        <x-date-picker class="form-control" required wire:model="inpatient.admission_date" id="admission_date" name="admission_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('inpatient.admission_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inpatient.fields.admission_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inpatient.discharge_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="discharge_date">{{ trans('cruds.inpatient.fields.discharge_date') }}</label>
        <x-date-picker class="form-control" required wire:model="inpatient.discharge_date" id="discharge_date" name="discharge_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('inpatient.discharge_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inpatient.fields.discharge_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inpatient.advance') ? 'invalid' : '' }}">
        <label class="form-label required" for="advance">{{ trans('cruds.inpatient.fields.advance') }}</label>
        <input class="form-control" type="number" name="advance" id="advance" required wire:model.defer="inpatient.advance" step="0.01">
        <div class="validation-message">
            {{ $errors->first('inpatient.advance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inpatient.fields.advance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inpatient.lab_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="lab">{{ trans('cruds.inpatient.fields.lab') }}</label>
        <x-select-list class="form-control" required id="lab" name="lab" :options="$this->listsForFields['lab']" wire:model="inpatient.lab_id" />
        <div class="validation-message">
            {{ $errors->first('inpatient.lab_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inpatient.fields.lab_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.inpatients.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>