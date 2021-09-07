<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('roomType.room_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="room_type">{{ trans('cruds.roomType.fields.room_type') }}</label>
        <input class="form-control" type="text" name="room_type" id="room_type" required wire:model.defer="roomType.room_type">
        <div class="validation-message">
            {{ $errors->first('roomType.room_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.roomType.fields.room_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.room_type_room_img') ? 'invalid' : '' }}">
        <label class="form-label required" for="room_img">{{ trans('cruds.roomType.fields.room_img') }}</label>
        <x-dropzone id="room_img" name="room_img" action="{{ route('admin.room-types.storeMedia') }}" collection-name="room_type_room_img" max-file-size="10" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.room_type_room_img') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.roomType.fields.room_img_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roomType.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.roomType.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="roomType.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('roomType.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.roomType.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roomType.cost') ? 'invalid' : '' }}">
        <label class="form-label required" for="cost">{{ trans('cruds.roomType.fields.cost') }}</label>
        <input class="form-control" type="number" name="cost" id="cost" required wire:model.defer="roomType.cost" step="0.01">
        <div class="validation-message">
            {{ $errors->first('roomType.cost') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.roomType.fields.cost_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.room-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>