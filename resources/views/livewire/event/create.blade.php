<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('event.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.event.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="event.name">
        <div class="validation-message">
            {{ $errors->first('event.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.slug') ? 'invalid' : '' }}">
        <label class="form-label required" for="slug">{{ trans('cruds.event.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" required wire:model.defer="event.slug">
        <div class="validation-message">
            {{ $errors->first('event.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.event.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="event.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('event.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.event.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="event.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('event.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.event_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.event.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.events.storeMedia') }}" collection-name="event_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.event_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.tickets') ? 'invalid' : '' }}">
        <label class="form-label required" for="tickets">{{ trans('cruds.event.fields.tickets') }}</label>
        <input class="form-control" type="number" name="tickets" id="tickets" required wire:model.defer="event.tickets" step="1">
        <div class="validation-message">
            {{ $errors->first('event.tickets') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.tickets_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.type_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="type">{{ trans('cruds.event.fields.type') }}</label>
        <x-select-list class="form-control" required id="type" name="type" :options="$this->listsForFields['type']" wire:model="event.type_id" />
        <div class="validation-message">
            {{ $errors->first('event.type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.audience_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="audience">{{ trans('cruds.event.fields.audience') }}</label>
        <x-select-list class="form-control" required id="audience" name="audience" :options="$this->listsForFields['audience']" wire:model="event.audience_id" />
        <div class="validation-message">
            {{ $errors->first('event.audience_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.audience_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.modality_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="modality">{{ trans('cruds.event.fields.modality') }}</label>
        <x-select-list class="form-control" required id="modality" name="modality" :options="$this->listsForFields['modality']" wire:model="event.modality_id" />
        <div class="validation-message">
            {{ $errors->first('event.modality_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.modality_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.cost_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="cost">{{ trans('cruds.event.fields.cost') }}</label>
        <x-select-list class="form-control" required id="cost" name="cost" :options="$this->listsForFields['cost']" wire:model="event.cost_id" />
        <div class="validation-message">
            {{ $errors->first('event.cost_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.cost_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="event.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.event.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('event.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>