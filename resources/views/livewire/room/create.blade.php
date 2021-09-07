<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('room.room_type_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="room_type">{{ trans('cruds.room.fields.room_type') }}</label>
        <x-select-list class="form-control" required id="room_type" name="room_type" :options="$this->listsForFields['room_type']" wire:model="room.room_type_id" />
        <div class="validation-message">
            {{ $errors->first('room.room_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.room.fields.room_type_helper') }}
        </div>
    </div>
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
    <div class="form-group {{ $errors->has('room.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.room.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="room.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('room.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.room.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('room.status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.room.fields.status') }}</label>
        <select class="form-control" wire:model="room.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('room.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.room.fields.status_helper') }}
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