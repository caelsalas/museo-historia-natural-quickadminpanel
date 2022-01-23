<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicationSpecialty;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublicationSpecialtyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('publication_specialty_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publication-specialty.index');
    }

    public function create()
    {
        abort_if(Gate::denies('publication_specialty_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publication-specialty.create');
    }

    public function edit(PublicationSpecialty $publicationSpecialty)
    {
        abort_if(Gate::denies('publication_specialty_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publication-specialty.edit', compact('publicationSpecialty'));
    }
}
