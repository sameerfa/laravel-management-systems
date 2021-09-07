<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('itemTable.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.itemTable.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="itemTable.name">
        <div class="validation-message">
            {{ $errors->first('itemTable.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.itemTable.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('itemTable.cost') ? 'invalid' : '' }}">
        <label class="form-label required" for="cost">{{ trans('cruds.itemTable.fields.cost') }}</label>
        <input class="form-control" type="number" name="cost" id="cost" required wire:model.defer="itemTable.cost" step="0.01">
        <div class="validation-message">
            {{ $errors->first('itemTable.cost') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.itemTable.fields.cost_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('itemTable.details') ? 'invalid' : '' }}">
        <label class="form-label" for="details">{{ trans('cruds.itemTable.fields.details') }}</label>
        <input class="form-control" type="text" name="details" id="details" wire:model.defer="itemTable.details">
        <div class="validation-message">
            {{ $errors->first('itemTable.details') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.itemTable.fields.details_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.item-tables.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>