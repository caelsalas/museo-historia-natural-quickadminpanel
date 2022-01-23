<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('article.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.article.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="article.name">
        <div class="validation-message">
            {{ $errors->first('article.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('article.author') ? 'invalid' : '' }}">
        <label class="form-label" for="author">{{ trans('cruds.article.fields.author') }}</label>
        <input class="form-control" type="text" name="author" id="author" wire:model.defer="article.author">
        <div class="validation-message">
            {{ $errors->first('article.author') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.author_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('article.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.article.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="article.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('article.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.article_image') ? 'invalid' : '' }}">
        <label class="form-label" for="image">{{ trans('cruds.article.fields.image') }}</label>
        <x-dropzone id="image" name="image" action="{{ route('admin.articles.storeMedia') }}" collection-name="article_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.article_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('article.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.article.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="article.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('article.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('article.published') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="published" id="published" wire:model.defer="article.published">
        <label class="form-label inline ml-1" for="published">{{ trans('cruds.article.fields.published') }}</label>
        <div class="validation-message">
            {{ $errors->first('article.published') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.article.fields.published_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>