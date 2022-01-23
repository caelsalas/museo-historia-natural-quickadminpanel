<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('education.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.education.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="education.name">
        <div class="validation-message">
            {{ $errors->first('education.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.education.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('education.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.education.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="education.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('education.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.education.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.education_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.education.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.education.storeMedia') }}" collection-name="education_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.education_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.education.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('education.tour_id') ? 'invalid' : '' }}">
        <label class="form-label" for="tour">{{ trans('cruds.education.fields.tour') }}</label>
        <x-select-list class="form-control" id="tour" name="tour" :options="$this->listsForFields['tour']" wire:model="education.tour_id" />
        <div class="validation-message">
            {{ $errors->first('education.tour_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.education.fields.tour_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('education.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="education.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.education.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('education.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.education.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.education.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>