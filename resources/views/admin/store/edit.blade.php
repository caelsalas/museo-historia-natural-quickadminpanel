@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.store.title_singular') }}:
                    {{ trans('cruds.store.fields.id') }}
                    {{ $store->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('store.edit', [$store])
        </div>
    </div>
</div>
@endsection