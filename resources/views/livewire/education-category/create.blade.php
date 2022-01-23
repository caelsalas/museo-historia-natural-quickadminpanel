<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('educationCategory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.educationCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="educationCategory.name">
        <div class="validation-message">
            {{ $errors->first('educationCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.educationCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('educationCategory.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.educationCategory.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="educationCategory.slug">
        <div class="validation-message">
            {{ $errors->first('educationCategory.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.educationCategory.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('educationCategory.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="educationCategory.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.educationCategory.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('educationCategory.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.educationCategory.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.education-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>