<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('expense.employee_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="employee">{{ trans('cruds.expense.fields.employee') }}</label>
        <x-select-list class="form-control" required id="employee" name="employee" :options="$this->listsForFields['employee']" wire:model="expense.employee_id" />
        <div class="validation-message">
            {{ $errors->first('expense.employee_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.employee_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.expense_type') ? 'invalid' : '' }}">
        <label class="form-label required" for="expense_type">{{ trans('cruds.expense.fields.expense_type') }}</label>
        <input class="form-control" type="text" name="expense_type" id="expense_type" required wire:model.defer="expense.expense_type">
        <div class="validation-message">
            {{ $errors->first('expense.expense_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.expense_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.expense.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="expense.description">
        <div class="validation-message">
            {{ $errors->first('expense.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.expense.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="expense.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('expense.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expense.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.expense.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="expense.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('expense.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expense.fields.date_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.expenses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>