<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('shelf.shelf_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="shelf_number">{{ trans('cruds.shelf.fields.shelf_number') }}</label>
        <input class="form-control" type="text" name="shelf_number" id="shelf_number" required wire:model.defer="shelf.shelf_number">
        <div class="validation-message">
            {{ $errors->first('shelf.shelf_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shelf.fields.shelf_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shelf.floor_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="floor_number">{{ trans('cruds.shelf.fields.floor_number') }}</label>
        <input class="form-control" type="text" name="floor_number" id="floor_number" required wire:model.defer="shelf.floor_number">
        <div class="validation-message">
            {{ $errors->first('shelf.floor_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shelf.fields.floor_number_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.shelves.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>