@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.publicationSpecialty.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('publication_specialty_create')
                    <a class="btn btn-indigo" href="{{ route('admin.publication-specialties.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.publicationSpecialty.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('publication-specialty.index')

    </div>
</div>
@endsection