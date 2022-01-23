@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.education.title_singular') }}:
                    {{ trans('cruds.education.fields.id') }}
                    {{ $education->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('education.edit', [$education])
        </div>
    </div>
</div>
@endsection