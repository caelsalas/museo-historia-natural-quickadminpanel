<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('homeSection.meta_title') ? 'invalid' : '' }}">
        <label class="form-label" for="meta_title">{{ trans('cruds.homeSection.fields.meta_title') }}</label>
        <input class="form-control" type="text" name="meta_title" id="meta_title" wire:model.defer="homeSection.meta_title">
        <div class="validation-message">
            {{ $errors->first('homeSection.meta_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.meta_title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.meta_title_en') ? 'invalid' : '' }}">
        <label class="form-label" for="meta_title_en">{{ trans('cruds.homeSection.fields.meta_title_en') }}</label>
        <input class="form-control" type="text" name="meta_title_en" id="meta_title_en" wire:model.defer="homeSection.meta_title_en">
        <div class="validation-message">
            {{ $errors->first('homeSection.meta_title_en') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.meta_title_en_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.meta_description') ? 'invalid' : '' }}">
        <label class="form-label" for="meta_description">{{ trans('cruds.homeSection.fields.meta_description') }}</label>
        <textarea class="form-control" name="meta_description" id="meta_description" wire:model.defer="homeSection.meta_description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.meta_description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.meta_description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.meta_description_en') ? 'invalid' : '' }}">
        <label class="form-label" for="meta_description_en">{{ trans('cruds.homeSection.fields.meta_description_en') }}</label>
        <textarea class="form-control" name="meta_description_en" id="meta_description_en" wire:model.defer="homeSection.meta_description_en" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.meta_description_en') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.meta_description_en_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.info_schedule') ? 'invalid' : '' }}">
        <label class="form-label" for="info_schedule">{{ trans('cruds.homeSection.fields.info_schedule') }}</label>
        <textarea class="form-control" name="info_schedule" id="info_schedule" wire:model.defer="homeSection.info_schedule" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.info_schedule') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.info_schedule_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.info_schedule_en') ? 'invalid' : '' }}">
        <label class="form-label" for="info_schedule_en">{{ trans('cruds.homeSection.fields.info_schedule_en') }}</label>
        <textarea class="form-control" name="info_schedule_en" id="info_schedule_en" wire:model.defer="homeSection.info_schedule_en" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.info_schedule_en') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.info_schedule_en_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.info_address') ? 'invalid' : '' }}">
        <label class="form-label" for="info_address">{{ trans('cruds.homeSection.fields.info_address') }}</label>
        <textarea class="form-control" name="info_address" id="info_address" wire:model.defer="homeSection.info_address" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.info_address') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.info_address_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.info_address_en') ? 'invalid' : '' }}">
        <label class="form-label" for="info_address_en">{{ trans('cruds.homeSection.fields.info_address_en') }}</label>
        <textarea class="form-control" name="info_address_en" id="info_address_en" wire:model.defer="homeSection.info_address_en" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.info_address_en') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.info_address_en_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.info_tickets') ? 'invalid' : '' }}">
        <label class="form-label" for="info_tickets">{{ trans('cruds.homeSection.fields.info_tickets') }}</label>
        <textarea class="form-control" name="info_tickets" id="info_tickets" wire:model.defer="homeSection.info_tickets" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.info_tickets') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.info_tickets_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('homeSection.info_tickets_en') ? 'invalid' : '' }}">
        <label class="form-label" for="info_tickets_en">{{ trans('cruds.homeSection.fields.info_tickets_en') }}</label>
        <textarea class="form-control" name="info_tickets_en" id="info_tickets_en" wire:model.defer="homeSection.info_tickets_en" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('homeSection.info_tickets_en') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.homeSection.fields.info_tickets_en_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.home-sections.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>