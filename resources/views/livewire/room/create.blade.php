<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('room.room_number') ? 'invalid' : '' }}">
        <label class="form-label required" for="room_number">{{ trans('cruds.room.fields.room_number') }}</label>
        <input class="form-control" type="number" name="room_number" id="room_number" required wire:model.defer="room.room_number" step="1">
        <div class="validation-message">
            {{ $errors->first('room.room_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.room.fields.room_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('room.room_type') ? 'invalid' : '' }}">
        <label class="form-label" for="room_type">{{ trans('cruds.room.fields.room_type') }}</label>
        <input class="form-control" type="text" name="room_type" id="room_type" wire:model.defer="room.room_type">
        <div class="validation-message">
            {{ $errors->first('room.room_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.room.fields.room_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>