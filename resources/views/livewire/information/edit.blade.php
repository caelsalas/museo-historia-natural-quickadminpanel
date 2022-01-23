<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('information.schedule') ? 'invalid' : '' }}">
        <label class="form-label required" for="schedule">{{ trans('cruds.information.fields.schedule') }}</label>
        <textarea class="form-control" name="schedule" id="schedule" required wire:model.defer="information.schedule" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('information.schedule') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.information.fields.schedule_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('information.location') ? 'invalid' : '' }}">
        <label class="form-label required" for="location">{{ trans('cruds.information.fields.location') }}</label>
        <textarea class="form-control" name="location" id="location" required wire:model.defer="information.location" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('information.location') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.information.fields.location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('information.tickets') ? 'invalid' : '' }}">
        <label class="form-label required" for="tickets">{{ trans('cruds.information.fields.tickets') }}</label>
        <textarea class="form-control" name="tickets" id="tickets" required wire:model.defer="information.tickets" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('information.tickets') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.information.fields.tickets_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.information_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="image">{{ trans('cruds.information.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.information.storeMedia') }}" collection-name="information_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.information_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.information.fields.image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.information.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>