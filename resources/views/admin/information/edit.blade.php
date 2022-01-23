@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.information.title_singular') }}:
                    {{ trans('cruds.information.fields.id') }}
                    {{ $information->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('information.edit', [$information])
        </div>
    </div>
</div>
@endsection