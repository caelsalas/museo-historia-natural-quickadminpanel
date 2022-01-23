<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('virtualTour.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.virtualTour.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="virtualTour.name">
        <div class="validation-message">
            {{ $errors->first('virtualTour.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.virtualTour.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('virtualTour.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.virtualTour.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="virtualTour.slug">
        <div class="validation-message">
            {{ $errors->first('virtualTour.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.virtualTour.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('virtualTour.summary') ? 'invalid' : '' }}">
        <label class="form-label" for="summary">{{ trans('cruds.virtualTour.fields.summary') }}</label>
        <textarea class="form-control" name="summary" id="summary" wire:model.defer="virtualTour.summary" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('virtualTour.summary') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.virtualTour.fields.summary_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('virtualTour.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.virtualTour.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="virtualTour.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('virtualTour.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.virtualTour.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.virtual_tour_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.virtualTour.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.virtual-tours.storeMedia') }}" collection-name="virtual_tour_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.virtual_tour_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.virtualTour.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('virtualTour.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" required wire:model.defer="virtualTour.published">
        <label class="form-label inline ml-1 required" for="published">{{ trans('cruds.virtualTour.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('virtualTour.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.virtualTour.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.virtual-tours.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>