@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.eventType.title_singular') }}:
                    {{ trans('cruds.eventType.fields.id') }}
                    {{ $eventType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('event-type.edit', [$eventType])
        </div>
    </div>
</div>
@endsection