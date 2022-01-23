<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('store.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.store.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="store.name">
        <div class="validation-message">
            {{ $errors->first('store.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.store.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('store.price') ? 'invalid' : '' }}">
        <label class="form-label required" for="price">{{ trans('cruds.store.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" required wire:model.defer="store.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('store.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.store.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.store_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.store.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.stores.storeMedia') }}" collection-name="store_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.store_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.store.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('store.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="store.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.store.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('store.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.store.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.stores.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>