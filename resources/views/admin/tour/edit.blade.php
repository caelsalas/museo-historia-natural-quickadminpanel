@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.tour.title_singular') }}:
                    {{ trans('cruds.tour.fields.id') }}
                    {{ $tour->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('tour.edit', [$tour])
        </div>
    </div>
</div>
@endsection