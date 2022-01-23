@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.eventModality.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('event_modality_create')
                    <a class="btn btn-indigo" href="{{ route('admin.event-modalities.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.eventModality.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('event-modality.index')

    </div>
</div>
@endsection