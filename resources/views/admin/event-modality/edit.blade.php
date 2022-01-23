@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.eventModality.title_singular') }}:
                    {{ trans('cruds.eventModality.fields.id') }}
                    {{ $eventModality->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('event-modality.edit', [$eventModality])
        </div>
    </div>
</div>
@endsection