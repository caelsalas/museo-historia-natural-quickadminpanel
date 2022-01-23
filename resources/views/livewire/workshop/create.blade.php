<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('workshop.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.workshop.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="workshop.name">
        <div class="validation-message">
            {{ $errors->first('workshop.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.workshop.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('workshop.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.workshop.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="workshop.slug">
        <div class="validation-message">
            {{ $errors->first('workshop.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.workshop.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('workshop.summary') ? 'invalid' : '' }}">
        <label class="form-label" for="summary">{{ trans('cruds.workshop.fields.summary') }}</label>
        <textarea class="form-control" name="summary" id="summary" wire:model.defer="workshop.summary" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('workshop.summary') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.workshop.fields.summary_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('workshop.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.workshop.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="workshop.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('workshop.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.workshop.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.workshop_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.workshop.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.workshops.storeMedia') }}" collection-name="workshop_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.workshop_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.workshop.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('workshop.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="workshop.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.workshop.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('workshop.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.workshop.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.workshops.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>