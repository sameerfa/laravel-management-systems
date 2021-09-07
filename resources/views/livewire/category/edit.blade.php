<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('category.category_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="category_name">{{ trans('cruds.category.fields.category_name') }}</label>
        <input class="form-control" type="text" name="category_name" id="category_name" required wire:model.defer="category.category_name">
        <div class="validation-message">
            {{ $errors->first('category.category_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.category_name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>