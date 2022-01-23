@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.contact.title_singular') }}:
                    {{ trans('cruds.contact.fields.id') }}
                    {{ $contact->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.contact.fields.id') }}
                            </th>
                            <td>
                                {{ $contact->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contact.fields.name') }}
                            </th>
                            <td>
                                {{ $contact->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contact.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $contact->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $contact->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contact.fields.phone') }}
                            </th>
                            <td>
                                {{ $contact->phone }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contact.fields.message') }}
                            </th>
                            <td>
                                {{ $contact->message }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.contact.fields.created_at') }}
                            </th>
                            <td>
                                {{ $contact->created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('contact_edit')
                    <a href="{{ route('admin.contacts.edit', $contact) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection