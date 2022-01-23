<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('birthdayPackage.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.birthdayPackage.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="birthdayPackage.name">
        <div class="validation-message">
            {{ $errors->first('birthdayPackage.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.birthdayPackage.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('birthdayPackage.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.birthdayPackage.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="birthdayPackage.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('birthdayPackage.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.birthdayPackage.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.birthday_package_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.birthdayPackage.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.birthday-packages.storeMedia') }}" collection-name="birthday_package_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.birthday_package_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.birthdayPackage.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('birthdayPackage.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="birthdayPackage.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.birthdayPackage.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('birthdayPackage.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.birthdayPackage.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.birthday-packages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>