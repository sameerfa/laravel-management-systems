<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('binding.binding_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="binding_name">{{ trans('cruds.binding.fields.binding_name') }}</label>
        <input class="form-control" type="text" name="binding_name" id="binding_name" required wire:model.defer="binding.binding_name">
        <div class="validation-message">
            {{ $errors->first('binding.binding_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.binding.fields.binding_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bindings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>