<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('tour.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.tour.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="tour.name">
        <div class="validation-message">
            {{ $errors->first('tour.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.tour.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="tour.slug">
        <div class="validation-message">
            {{ $errors->first('tour.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.summary') ? 'invalid' : '' }}">
        <label class="form-label" for="summary">{{ trans('cruds.tour.fields.summary') }}</label>
        <textarea class="form-control" name="summary" id="summary" wire:model.defer="tour.summary" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('tour.summary') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.summary_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.tour.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="tour.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('tour.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.tour_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.tour.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.tours.storeMedia') }}" collection-name="tour_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.tour_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tour.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="tour.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.tour.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('tour.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tour.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>