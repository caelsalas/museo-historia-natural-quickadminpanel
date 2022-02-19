@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.homeSection.title_singular') }}:
                    {{ trans('cruds.homeSection.fields.id') }}
                    {{ $homeSection->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('home-section.edit', [$homeSection])
        </div>
    </div>
</div>
@endsection