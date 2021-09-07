<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('bill.patient_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="patient">{{ trans('cruds.bill.fields.patient') }}</label>
        <x-select-list class="form-control" required id="patient" name="patient" :options="$this->listsForFields['patient']" wire:model="bill.patient_id" />
        <div class="validation-message">
            {{ $errors->first('bill.patient_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.patient_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.patient_type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.bill.fields.patient_type') }}</label>
        <select class="form-control" wire:model="bill.patient_type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['patient_type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('bill.patient_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.patient_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.doctor_charge') ? 'invalid' : '' }}">
        <label class="form-label" for="doctor_charge">{{ trans('cruds.bill.fields.doctor_charge') }}</label>
        <input class="form-control" type="number" name="doctor_charge" id="doctor_charge" wire:model.defer="bill.doctor_charge" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bill.doctor_charge') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.doctor_charge_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.medicine_charge') ? 'invalid' : '' }}">
        <label class="form-label" for="medicine_charge">{{ trans('cruds.bill.fields.medicine_charge') }}</label>
        <input class="form-control" type="number" name="medicine_charge" id="medicine_charge" wire:model.defer="bill.medicine_charge" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bill.medicine_charge') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.medicine_charge_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.room_charge') ? 'invalid' : '' }}">
        <label class="form-label" for="room_charge">{{ trans('cruds.bill.fields.room_charge') }}</label>
        <input class="form-control" type="number" name="room_charge" id="room_charge" wire:model.defer="bill.room_charge" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bill.room_charge') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.room_charge_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.operation_charge') ? 'invalid' : '' }}">
        <label class="form-label" for="operation_charge">{{ trans('cruds.bill.fields.operation_charge') }}</label>
        <input class="form-control" type="number" name="operation_charge" id="operation_charge" wire:model.defer="bill.operation_charge" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bill.operation_charge') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.operation_charge_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.no_of_days') ? 'invalid' : '' }}">
        <label class="form-label" for="no_of_days">{{ trans('cruds.bill.fields.no_of_days') }}</label>
        <input class="form-control" type="number" name="no_of_days" id="no_of_days" wire:model.defer="bill.no_of_days" step="1">
        <div class="validation-message">
            {{ $errors->first('bill.no_of_days') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.no_of_days_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.nursing_charge') ? 'invalid' : '' }}">
        <label class="form-label" for="nursing_charge">{{ trans('cruds.bill.fields.nursing_charge') }}</label>
        <input class="form-control" type="number" name="nursing_charge" id="nursing_charge" wire:model.defer="bill.nursing_charge" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bill.nursing_charge') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.nursing_charge_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.advance') ? 'invalid' : '' }}">
        <label class="form-label" for="advance">{{ trans('cruds.bill.fields.advance') }}</label>
        <input class="form-control" type="number" name="advance" id="advance" wire:model.defer="bill.advance" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bill.advance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.advance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.health_card') ? 'invalid' : '' }}">
        <label class="form-label" for="health_card">{{ trans('cruds.bill.fields.health_card') }}</label>
        <input class="form-control" type="text" name="health_card" id="health_card" wire:model.defer="bill.health_card">
        <div class="validation-message">
            {{ $errors->first('bill.health_card') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.health_card_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.lab_charge') ? 'invalid' : '' }}">
        <label class="form-label" for="lab_charge">{{ trans('cruds.bill.fields.lab_charge') }}</label>
        <input class="form-control" type="number" name="lab_charge" id="lab_charge" wire:model.defer="bill.lab_charge" step="0.01">
        <div class="validation-message">
            {{ $errors->first('bill.lab_charge') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.lab_charge_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('bill.bill') ? 'invalid' : '' }}">
        <label class="form-label" for="bill">{{ trans('cruds.bill.fields.bill') }}</label>
        <input class="form-control" type="number" name="bill" id="bill" wire:model.defer="bill.bill" step="1">
        <div class="validation-message">
            {{ $errors->first('bill.bill') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bill.fields.bill_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bills.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>