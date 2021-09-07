<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('employee.employee_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="employee_name">{{ trans('cruds.employee.fields.employee_name') }}</label>
        <input class="form-control" type="text" name="employee_name" id="employee_name" required wire:model.defer="employee.employee_name">
        <div class="validation-message">
            {{ $errors->first('employee.employee_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.employee_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.username') ? 'invalid' : '' }}">
        <label class="form-label required" for="username">{{ trans('cruds.employee.fields.username') }}</label>
        <input class="form-control" type="text" name="username" id="username" required wire:model.defer="employee.username">
        <div class="validation-message">
            {{ $errors->first('employee.username') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.username_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.password') ? 'invalid' : '' }}">
        <label class="form-label" for="password">{{ trans('cruds.employee.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('employee.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('employee.employee_type') ? 'invalid' : '' }}">
        <label class="form-label" for="employee_type">{{ trans('cruds.employee.fields.employee_type') }}</label>
        <input class="form-control" type="text" name="employee_type" id="employee_type" wire:model.defer="employee.employee_type">
        <div class="validation-message">
            {{ $errors->first('employee.employee_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.employee.fields.employee_type_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>