@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.article.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('article_create')
                    <a class="btn btn-indigo" href="{{ route('admin.articles.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.article.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('article.index')

    </div>
</div>
@endsection