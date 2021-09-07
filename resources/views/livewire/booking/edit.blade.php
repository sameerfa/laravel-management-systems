<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('booking.room_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="room">{{ trans('cruds.booking.fields.room') }}</label>
        <x-select-list class="form-control" required id="room" name="room" :options="$this->listsForFields['room']" wire:model="booking.room_id" />
        <div class="validation-message">
            {{ $errors->first('booking.room_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.room_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.customer_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="customer">{{ trans('cruds.booking.fields.customer') }}</label>
        <x-select-list class="form-control" required id="customer" name="customer" :options="$this->listsForFields['customer']" wire:model="booking.customer_id" />
        <div class="validation-message">
            {{ $errors->first('booking.customer_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.customer_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.booking_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="booking_date">{{ trans('cruds.booking.fields.booking_date') }}</label>
        <x-date-picker class="form-control" required wire:model="booking.booking_date" id="booking_date" name="booking_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('booking.booking_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.booking_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.checkin') ? 'invalid' : '' }}">
        <label class="form-label required" for="checkin">{{ trans('cruds.booking.fields.checkin') }}</label>
        <x-date-picker class="form-control" required wire:model="booking.checkin" id="checkin" name="checkin" />
        <div class="validation-message">
            {{ $errors->first('booking.checkin') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.checkin_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('booking.checkout') ? 'invalid' : '' }}">
        <label class="form-label required" for="checkout">{{ trans('cruds.booking.fields.checkout') }}</label>
        <x-date-picker class="form-control" required wire:model="booking.checkout" id="checkout" name="checkout" />
        <div class="validation-message">
            {{ $errors->first('booking.checkout') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.booking.fields.checkout_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>