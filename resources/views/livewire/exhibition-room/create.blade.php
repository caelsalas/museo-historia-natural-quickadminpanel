<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('exhibitionRoom.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.exhibitionRoom.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="exhibitionRoom.name">
        <div class="validation-message">
            {{ $errors->first('exhibitionRoom.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibitionRoom.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('exhibitionRoom.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.exhibitionRoom.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" required wire:model.defer="exhibitionRoom.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('exhibitionRoom.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibitionRoom.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.exhibition_room_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.exhibitionRoom.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.exhibition-rooms.storeMedia') }}" collection-name="exhibition_room_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.exhibition_room_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibitionRoom.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.exhibition_room_gallery') ? 'invalid' : '' }}">
        <label class="form-label" for="gallery">{{ trans('cruds.exhibitionRoom.fields.gallery') }}</label>
        <x-dropzone id="gallery" name="gallery" action="{{ route('admin.exhibition-rooms.storeMedia') }}" collection-name="exhibition_room_gallery" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.exhibition_room_gallery') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibitionRoom.fields.gallery_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('exhibitionRoom.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="exhibitionRoom.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.exhibitionRoom.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('exhibitionRoom.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.exhibitionRoom.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.exhibition-rooms.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>