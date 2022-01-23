@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.header.title_singular') }}:
                    {{ trans('cruds.header.fields.id') }}
                    {{ $header->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('header.edit', [$header])
        </div>
    </div>
</div>
@endsection