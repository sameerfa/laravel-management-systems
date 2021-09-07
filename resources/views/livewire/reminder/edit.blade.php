<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('reminder.booking_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="booking">{{ trans('cruds.reminder.fields.booking') }}</label>
        <x-select-list class="form-control" required id="booking" name="booking" :options="$this->listsForFields['booking']" wire:model="reminder.booking_id" />
        <div class="validation-message">
            {{ $errors->first('reminder.booking_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reminder.fields.booking_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('reminder.reminder_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="reminder_type">{{ trans('cruds.reminder.fields.reminder_type') }}</label>
        <input class="form-control" type="text" name="reminder_type" id="reminder_type" required wire:model.defer="reminder.reminder_type">
        <div class="validation-message">
            {{ $errors->first('reminder.reminder_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reminder.fields.reminder_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('reminder.reminder_detail') ? 'invalid' : '' }}">
        <label class="form-label" for="reminder_detail">{{ trans('cruds.reminder.fields.reminder_detail') }}</label>
        <input class="form-control" type="text" name="reminder_detail" id="reminder_detail" wire:model.defer="reminder.reminder_detail">
        <div class="validation-message">
            {{ $errors->first('reminder.reminder_detail') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reminder.fields.reminder_detail_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('reminder.datetime') ? 'invalid' : '' }}">
        <label class="form-label required" for="datetime">{{ trans('cruds.reminder.fields.datetime') }}</label>
        <x-date-picker class="form-control" required wire:model="reminder.datetime" id="datetime" name="datetime" />
        <div class="validation-message">
            {{ $errors->first('reminder.datetime') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.reminder.fields.datetime_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.reminders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>