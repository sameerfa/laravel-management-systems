<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('book.isbn') ? 'invalid' : '' }}">
        <label class="form-label required" for="isbn">{{ trans('cruds.book.fields.isbn') }}</label>
        <input class="form-control" type="text" name="isbn" id="isbn" required wire:model.defer="book.isbn">
        <div class="validation-message">
            {{ $errors->first('book.isbn') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.isbn_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.book_book_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="book_image">{{ trans('cruds.book.fields.book_image') }}</label>
        <x-dropzone id="book_image" name="book_image" action="{{ route('admin.books.storeMedia') }}" collection-name="book_book_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.book_book_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.book_image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.book_title') ? 'invalid' : '' }}">
        <label class="form-label required" for="book_title">{{ trans('cruds.book.fields.book_title') }}</label>
        <input class="form-control" type="text" name="book_title" id="book_title" required wire:model.defer="book.book_title">
        <div class="validation-message">
            {{ $errors->first('book.book_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.book_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.category_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="category">{{ trans('cruds.book.fields.category') }}</label>
        <x-select-list class="form-control" required id="category" name="category" :options="$this->listsForFields['category']" wire:model="book.category_id" />
        <div class="validation-message">
            {{ $errors->first('book.category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.binding_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="binding">{{ trans('cruds.book.fields.binding') }}</label>
        <x-select-list class="form-control" required id="binding" name="binding" :options="$this->listsForFields['binding']" wire:model="book.binding_id" />
        <div class="validation-message">
            {{ $errors->first('book.binding_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.binding_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.summary') ? 'invalid' : '' }}">
        <label class="form-label" for="summary">{{ trans('cruds.book.fields.summary') }}</label>
        <textarea class="form-control" name="summary" id="summary" wire:model.defer="book.summary" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('book.summary') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.summary_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.author_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="author_name">{{ trans('cruds.book.fields.author_name') }}</label>
        <input class="form-control" type="text" name="author_name" id="author_name" required wire:model.defer="book.author_name">
        <div class="validation-message">
            {{ $errors->first('book.author_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.author_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.book_ebook') ? 'invalid' : '' }}">
        <label class="form-label" for="ebook">{{ trans('cruds.book.fields.ebook') }}</label>
        <x-dropzone id="ebook" name="ebook" action="{{ route('admin.books.storeMedia') }}" collection-name="book_ebook" max-file-size="20" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.book_ebook') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.ebook_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.published_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="published_date">{{ trans('cruds.book.fields.published_date') }}</label>
        <x-date-picker class="form-control" required wire:model="book.published_date" id="published_date" name="published_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('book.published_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.published_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.total_copies') ? 'invalid' : '' }}">
        <label class="form-label" for="total_copies">{{ trans('cruds.book.fields.total_copies') }}</label>
        <input class="form-control" type="number" name="total_copies" id="total_copies" wire:model.defer="book.total_copies" step="1">
        <div class="validation-message">
            {{ $errors->first('book.total_copies') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.total_copies_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.available_copies') ? 'invalid' : '' }}">
        <label class="form-label required" for="available_copies">{{ trans('cruds.book.fields.available_copies') }}</label>
        <input class="form-control" type="text" name="available_copies" id="available_copies" required wire:model.defer="book.available_copies">
        <div class="validation-message">
            {{ $errors->first('book.available_copies') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.available_copies_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('book.shelf_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="shelf">{{ trans('cruds.book.fields.shelf') }}</label>
        <x-select-list class="form-control" required id="shelf" name="shelf" :options="$this->listsForFields['shelf']" wire:model="book.shelf_id" />
        <div class="validation-message">
            {{ $errors->first('book.shelf_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.book.fields.shelf_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>