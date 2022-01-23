@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.virtualTour.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('virtual_tour_create')
                    <a class="btn btn-indigo" href="{{ route('admin.virtual-tours.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.virtualTour.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('virtual-tour.index')

    </div>
</div>
@endsection