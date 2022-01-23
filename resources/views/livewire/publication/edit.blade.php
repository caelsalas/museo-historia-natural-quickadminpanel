<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('publication.specialty_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="specialty">{{ trans('cruds.publication.fields.specialty') }}</label>
        <x-select-list class="form-control" required id="specialty" name="specialty" :options="$this->listsForFields['specialty']" wire:model="publication.specialty_id" />
        <div class="validation-message">
            {{ $errors->first('publication.specialty_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.specialty_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.publication.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="publication.name">
        <div class="validation-message">
            {{ $errors->first('publication.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.author') ? 'invalid' : '' }}">
        <label class="form-label" for="author">{{ trans('cruds.publication.fields.author') }}</label>
        <input class="form-control" type="text" name="author" id="author" wire:model.defer="publication.author">
        <div class="validation-message">
            {{ $errors->first('publication.author') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.author_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.publication.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="publication.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('publication.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.type') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.publication.fields.type') }}</label>
        <select class="form-control" wire:model="publication.type">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('publication.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.publication_file') ? 'invalid' : '' }}">
        <label class="form-label" for="file">{{ trans('cruds.publication.fields.file') }}</label>
        <x-dropzone id="file" name="file" action="{{ route('admin.publications.storeMedia') }}" collection-name="publication_file" max-file-size="2" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.publication_file') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.file_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.link') ? 'invalid' : '' }}">
        <label class="form-label" for="link">{{ trans('cruds.publication.fields.link') }}</label>
        <input class="form-control" type="text" name="link" id="link" wire:model.defer="publication.link">
        <div class="validation-message">
            {{ $errors->first('publication.link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.target') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.publication.fields.target') }}</label>
        <select class="form-control" wire:model="publication.target">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['target'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('publication.target') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.target_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.publication.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="publication.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('publication.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('publication.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="publication.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.publication.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('publication.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.publication.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.publications.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>