<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('customer.customer_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="customer_name">{{ trans('cruds.customer.fields.customer_name') }}</label>
        <input class="form-control" type="text" name="customer_name" id="customer_name" required wire:model.defer="customer.customer_name">
        <div class="validation-message">
            {{ $errors->first('customer.customer_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.customer_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.customer.fields.address') }}</label>
        <textarea class="form-control" name="address" id="address" wire:model.defer="customer.address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('customer.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.contact_number') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_number">{{ trans('cruds.customer.fields.contact_number') }}</label>
        <input class="form-control" type="number" name="contact_number" id="contact_number" wire:model.defer="customer.contact_number" step="1">
        <div class="validation-message">
            {{ $errors->first('customer.contact_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.contact_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('customer.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.customer.fields.gender') }}</label>
        <select class="form-control" wire:model="customer.gender">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['gender'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('customer.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.gender_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.customer_id_proof') ? 'invalid' : '' }}">
        <label class="form-label required" for="id_proof">{{ trans('cruds.customer.fields.id_proof') }}</label>
        <x-dropzone id="id_proof" name="id_proof" action="{{ route('admin.customers.storeMedia') }}" collection-name="customer_id_proof" max-file-size="10" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.customer_id_proof') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.id_proof_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.customer_address_proof') ? 'invalid' : '' }}">
        <label class="form-label required" for="address_proof">{{ trans('cruds.customer.fields.address_proof') }}</label>
        <x-dropzone id="address_proof" name="address_proof" action="{{ route('admin.customers.storeMedia') }}" collection-name="customer_address_proof" max-file-size="10" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.customer_address_proof') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.address_proof_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.customer_profile_image') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_image">{{ trans('cruds.customer.fields.profile_image') }}</label>
        <x-dropzone id="profile_image" name="profile_image" action="{{ route('admin.customers.storeMedia') }}" collection-name="customer_profile_image" max-file-size="10" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.customer_profile_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.customer.fields.profile_image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>