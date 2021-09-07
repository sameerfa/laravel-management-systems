<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('student.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.student.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="student.name">
        <div class="validation-message">
            {{ $errors->first('student.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.gender') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.student.fields.gender') }}</label>
        <select class="form-control" wire:model="student.gender">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['gender'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('student.gender') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.gender_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.date_of_birth') ? 'invalid' : '' }}">
        <label class="form-label" for="date_of_birth">{{ trans('cruds.student.fields.date_of_birth') }}</label>
        <x-date-picker class="form-control" wire:model="student.date_of_birth" id="date_of_birth" name="date_of_birth" picker="date" />
        <div class="validation-message">
            {{ $errors->first('student.date_of_birth') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.date_of_birth_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.department') ? 'invalid' : '' }}">
        <label class="form-label" for="department">{{ trans('cruds.student.fields.department') }}</label>
        <input class="form-control" type="text" name="department" id="department" wire:model.defer="student.department">
        <div class="validation-message">
            {{ $errors->first('student.department') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.department_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.contact_number') ? 'invalid' : '' }}">
        <label class="form-label" for="contact_number">{{ trans('cruds.student.fields.contact_number') }}</label>
        <input class="form-control" type="number" name="contact_number" id="contact_number" wire:model.defer="student.contact_number" step="1">
        <div class="validation-message">
            {{ $errors->first('student.contact_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.contact_number_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>