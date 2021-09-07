<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('lab.lab_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="lab_number">{{ trans('cruds.lab.fields.lab_number') }}</label>
        <input class="form-control" type="text" name="lab_number" id="lab_number" required wire:model.defer="lab.lab_number">
        <div class="validation-message">
            {{ $errors->first('lab.lab_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.lab_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lab.patient_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="patient">{{ trans('cruds.lab.fields.patient') }}</label>
        <x-select-list class="form-control" required id="patient" name="patient" :options="$this->listsForFields['patient']" wire:model="lab.patient_id" />
        <div class="validation-message">
            {{ $errors->first('lab.patient_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.patient_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lab.weight') ? 'invalid' : '' }}">
        <label class="form-label" for="weight">{{ trans('cruds.lab.fields.weight') }}</label>
        <input class="form-control" type="number" name="weight" id="weight" wire:model.defer="lab.weight" step="1">
        <div class="validation-message">
            {{ $errors->first('lab.weight') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.weight_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lab.doctor_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="doctor">{{ trans('cruds.lab.fields.doctor') }}</label>
        <x-select-list class="form-control" required id="doctor" name="doctor" :options="$this->listsForFields['doctor']" wire:model="lab.doctor_id" />
        <div class="validation-message">
            {{ $errors->first('lab.doctor_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.doctor_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lab.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.lab.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="lab.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('lab.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lab.category') ? 'invalid' : '' }}">
        <label class="form-label" for="category">{{ trans('cruds.lab.fields.category') }}</label>
        <input class="form-control" type="text" name="category" id="category" wire:model.defer="lab.category">
        <div class="validation-message">
            {{ $errors->first('lab.category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lab.patient_type') ? 'invalid' : '' }}">
        <label class="form-label" for="patient_type">{{ trans('cruds.lab.fields.patient_type') }}</label>
        <input class="form-control" type="text" name="patient_type" id="patient_type" wire:model.defer="lab.patient_type">
        <div class="validation-message">
            {{ $errors->first('lab.patient_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.patient_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('lab.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.lab.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="lab.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('lab.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.lab.fields.amount_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.labs.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>