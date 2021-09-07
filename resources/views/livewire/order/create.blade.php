<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('order.item_table_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="item_table">{{ trans('cruds.order.fields.item_table') }}</label>
        <x-select-list class="form-control" required id="item_table" name="item_table" :options="$this->listsForFields['item_table']" wire:model="order.item_table_id" />
        <div class="validation-message">
            {{ $errors->first('order.item_table_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.item_table_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.booking_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="booking">{{ trans('cruds.order.fields.booking') }}</label>
        <x-select-list class="form-control" required id="booking" name="booking" :options="$this->listsForFields['booking']" wire:model="order.booking_id" />
        <div class="validation-message">
            {{ $errors->first('order.booking_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.booking_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.order_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="order_date">{{ trans('cruds.order.fields.order_date') }}</label>
        <x-date-picker class="form-control" required wire:model="order.order_date" id="order_date" name="order_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('order.order_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.order_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.quantity') ? 'invalid' : '' }}">
        <label class="form-label required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" id="quantity" required wire:model.defer="order.quantity" step="1">
        <div class="validation-message">
            {{ $errors->first('order.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.quantity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('order.cost') ? 'invalid' : '' }}">
        <label class="form-label required" for="cost">{{ trans('cruds.order.fields.cost') }}</label>
        <input class="form-control" type="number" name="cost" id="cost" required wire:model.defer="order.cost" step="0.01">
        <div class="validation-message">
            {{ $errors->first('order.cost') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.order.fields.cost_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>