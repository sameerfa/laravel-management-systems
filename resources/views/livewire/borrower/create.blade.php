<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('borrower.student_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="student">{{ trans('cruds.borrower.fields.student') }}</label>
        <x-select-list class="form-control" required id="student" name="student" :options="$this->listsForFields['student']" wire:model="borrower.student_id" />
        <div class="validation-message">
            {{ $errors->first('borrower.student_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.borrower.fields.student_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('borrower.book_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="book">{{ trans('cruds.borrower.fields.book') }}</label>
        <x-select-list class="form-control" required id="book" name="book" :options="$this->listsForFields['book']" wire:model="borrower.book_id" />
        <div class="validation-message">
            {{ $errors->first('borrower.book_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.borrower.fields.book_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('borrower.borrowed_from') ? 'invalid' : '' }}">
        <label class="form-label required" for="borrowed_from">{{ trans('cruds.borrower.fields.borrowed_from') }}</label>
        <x-date-picker class="form-control" required wire:model="borrower.borrowed_from" id="borrowed_from" name="borrowed_from" picker="date" />
        <div class="validation-message">
            {{ $errors->first('borrower.borrowed_from') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.borrower.fields.borrowed_from_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('borrower.borrowed_to') ? 'invalid' : '' }}">
        <label class="form-label required" for="borrowed_to">{{ trans('cruds.borrower.fields.borrowed_to') }}</label>
        <x-date-picker class="form-control" required wire:model="borrower.borrowed_to" id="borrowed_to" name="borrowed_to" picker="date" />
        <div class="validation-message">
            {{ $errors->first('borrower.borrowed_to') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.borrower.fields.borrowed_to_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('borrower.return_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="return_date">{{ trans('cruds.borrower.fields.return_date') }}</label>
        <x-date-picker class="form-control" required wire:model="borrower.return_date" id="return_date" name="return_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('borrower.return_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.borrower.fields.return_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('borrower.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.borrower.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="borrower.user_id" />
        <div class="validation-message">
            {{ $errors->first('borrower.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.borrower.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.borrowers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>