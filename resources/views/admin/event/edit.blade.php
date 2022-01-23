@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.event.title_singular') }}:
                    {{ trans('cruds.event.fields.id') }}
                    {{ $event->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('event.edit', [$event])
        </div>
    </div>
</div>
@endsection