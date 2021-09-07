<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('crmCustomer.first_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="first_name">{{ trans('cruds.crmCustomer.fields.first_name') }}</label>
        <input class="form-control" type="text" name="first_name" id="first_name" required wire:model.defer="crmCustomer.first_name">
        <div class="validation-message">
            {{ $errors->first('crmCustomer.first_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.first_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.last_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="last_name">{{ trans('cruds.crmCustomer.fields.last_name') }}</label>
        <input class="form-control" type="text" name="last_name" id="last_name" required wire:model.defer="crmCustomer.last_name">
        <div class="validation-message">
            {{ $errors->first('crmCustomer.last_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.last_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.status_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="status">{{ trans('cruds.crmCustomer.fields.status') }}</label>
        <x-select-list class="form-control" required id="status" name="status" :options="$this->listsForFields['status']" wire:model="crmCustomer.status_id" />
        <div class="validation-message">
            {{ $errors->first('crmCustomer.status_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.email') ? 'invalid' : '' }}">
        <label class="form-label" for="email">{{ trans('cruds.crmCustomer.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" wire:model.defer="crmCustomer.email">
        <div class="validation-message">
            {{ $errors->first('crmCustomer.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.phone') ? 'invalid' : '' }}">
        <label class="form-label" for="phone">{{ trans('cruds.crmCustomer.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="crmCustomer.phone">
        <div class="validation-message">
            {{ $errors->first('crmCustomer.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.address') ? 'invalid' : '' }}">
        <label class="form-label" for="address">{{ trans('cruds.crmCustomer.fields.address') }}</label>
        <input class="form-control" type="text" name="address" id="address" wire:model.defer="crmCustomer.address">
        <div class="validation-message">
            {{ $errors->first('crmCustomer.address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.skype') ? 'invalid' : '' }}">
        <label class="form-label" for="skype">{{ trans('cruds.crmCustomer.fields.skype') }}</label>
        <input class="form-control" type="text" name="skype" id="skype" wire:model.defer="crmCustomer.skype">
        <div class="validation-message">
            {{ $errors->first('crmCustomer.skype') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.skype_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.website') ? 'invalid' : '' }}">
        <label class="form-label" for="website">{{ trans('cruds.crmCustomer.fields.website') }}</label>
        <input class="form-control" type="text" name="website" id="website" wire:model.defer="crmCustomer.website">
        <div class="validation-message">
            {{ $errors->first('crmCustomer.website') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.website_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmCustomer.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.crmCustomer.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="crmCustomer.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('crmCustomer.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmCustomer.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.crm-customers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>