<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('doctor.doctor_name') ? 'invalid' : '' }}">
        <label class="form-label" for="doctor_name">{{ trans('cruds.doctor.fields.doctor_name') }}</label>
        <input class="form-control" type="text" name="doctor_name" id="doctor_name" wire:model.defer="doctor.doctor_name">
        <div class="validation-message">
            {{ $errors->first('doctor.doctor_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doctor.fields.doctor_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('doctor.department') ? 'invalid' : '' }}">
        <label class="form-label" for="department">{{ trans('cruds.doctor.fields.department') }}</label>
        <input class="form-control" type="text" name="department" id="department" wire:model.defer="doctor.department">
        <div class="validation-message">
            {{ $errors->first('doctor.department') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.doctor.fields.department_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>