<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('collection.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.collection.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="collection.name">
        <div class="validation-message">
            {{ $errors->first('collection.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collection.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.collection.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="collection.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('collection.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.collection_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.collection.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.collections.storeMedia') }}" collection-name="collection_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.collection_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('collection.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="collection.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.collection.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('collection.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.collection.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.collections.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>