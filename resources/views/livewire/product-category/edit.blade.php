<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('productCategory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.productCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="productCategory.name">
        <div class="validation-message">
            {{ $errors->first('productCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.productCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('productCategory.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.productCategory.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" required wire:model.defer="productCategory.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('productCategory.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.productCategory.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.product_category_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.productCategory.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.product-categories.storeMedia') }}" collection-name="product_category_photo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.product_category_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.productCategory.fields.photo_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.product-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>