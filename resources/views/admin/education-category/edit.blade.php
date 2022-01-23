@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.educationCategory.title_singular') }}:
                    {{ trans('cruds.educationCategory.fields.id') }}
                    {{ $educationCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('education-category.edit', [$educationCategory])
        </div>
    </div>
</div>
@endsection