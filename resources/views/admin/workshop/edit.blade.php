@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.workshop.title_singular') }}:
                    {{ trans('cruds.workshop.fields.id') }}
                    {{ $workshop->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('workshop.edit', [$workshop])
        </div>
    </div>
</div>
@endsection