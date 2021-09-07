<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('payment.booking_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="booking">{{ trans('cruds.payment.fields.booking') }}</label>
        <x-select-list class="form-control" required id="booking" name="booking" :options="$this->listsForFields['booking']" wire:model="payment.booking_id" />
        <div class="validation-message">
            {{ $errors->first('payment.booking_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.booking_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.type') ? 'invalid' : '' }}">
        <label class="form-label required" for="type">{{ trans('cruds.payment.fields.type') }}</label>
        <input class="form-control" type="text" name="type" id="type" required wire:model.defer="payment.type">
        <div class="validation-message">
            {{ $errors->first('payment.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="payment.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('payment.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_type">{{ trans('cruds.payment.fields.payment_type') }}</label>
        <input class="form-control" type="text" name="payment_type" id="payment_type" required wire:model.defer="payment.payment_type">
        <div class="validation-message">
            {{ $errors->first('payment.payment_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_details') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_details">{{ trans('cruds.payment.fields.payment_details') }}</label>
        <input class="form-control" type="text" name="payment_details" id="payment_details" wire:model.defer="payment.payment_details">
        <div class="validation-message">
            {{ $errors->first('payment.payment_details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_details_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
        <x-date-picker class="form-control" required wire:model="payment.payment_date" id="payment_date" name="payment_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('payment.payment_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_date_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>