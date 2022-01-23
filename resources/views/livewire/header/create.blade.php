<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('header.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.header.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="header.name">
        <div class="validation-message">
            {{ $errors->first('header.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.header.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.header_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="image">{{ trans('cruds.header.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.headers.storeMedia') }}" collection-name="header_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.header_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.header.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.header_image_mobile') ? 'invalid' : '' }}">
        <label class="form-label required" for="image_mobile">{{ trans('cruds.header.fields.image_mobile') }}</label>
        <x-dropzone id="image_mobile" name="image_mobile" action="{{ route('admin.headers.storeMedia') }}" collection-name="header_image_mobile" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.header_image_mobile') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.header.fields.image_mobile_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('header.link') ? 'invalid' : '' }}">
        <label class="form-label" for="link">{{ trans('cruds.header.fields.link') }}</label>
        <input class="form-control" type="text" name="link" id="link" wire:model.defer="header.link">
        <div class="validation-message">
            {{ $errors->first('header.link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.header.fields.link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('header.target') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.header.fields.target') }}</label>
        <select class="form-control" wire:model="header.target">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['target'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('header.target') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.header.fields.target_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('header.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="header.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.header.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('header.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.header.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.headers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>