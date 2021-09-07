<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('patient.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.patient.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="patient.name">
        <div class="validation-message">
            {{ $errors->first('patient.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.patient.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('patient.age') ? 'invalid' : '' }}">
        <label class="form-label" for="age">{{ trans('cruds.patient.fields.age') }}</label>
        <input class="form-control" type="number" name="age" id="age" wire:model.defer="patient.age" step="1">
        <div class="validation-message">
            {{ $errors->first('patient.age') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.patient.fields.age_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('patient.weight') ? 'invalid' : '' }}">
        <label class="form-label" for="weight">{{ trans('cruds.patient.fields.weight') }}</label>
        <input class="form-control" type="number" name="weight" id="weight" wire:model.defer="patient.weight" step="1">
        <div class="validation-message">
            {{ $errors->first('patient.weight') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.patient.fields.weight_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('patient.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.patient.fields.gender') }}</label>
        <select class="form-control" wire:model="patient.gender">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['gender'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('patient.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.patient.fields.gender_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('patient.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.patient.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="patient.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('patient.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.patient.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('patient.phone_number') ? 'invalid' : '' }}">
        <label class="form-label" for="phone_number">{{ trans('cruds.patient.fields.phone_number') }}</label>
        <input class="form-control" type="number" name="phone_number" id="phone_number" wire:model.defer="patient.phone_number" step="1">
        <div class="validation-message">
            {{ $errors->first('patient.phone_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.patient.fields.phone_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('patient.disease') ? 'invalid' : '' }}">
        <label class="form-label" for="disease">{{ trans('cruds.patient.fields.disease') }}</label>
        <input class="form-control" type="text" name="disease" id="disease" wire:model.defer="patient.disease">
        <div class="validation-message">
            {{ $errors->first('patient.disease') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.patient.fields.disease_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>