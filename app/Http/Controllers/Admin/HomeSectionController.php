<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeSectionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('home_section_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.home-section.index');
    }

    public function create()
    {
        abort_if(Gate::denies('home_section_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.home-section.create');
    }

    public function edit(HomeSection $homeSection)
    {
        abort_if(Gate::denies('home_section_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.home-section.edit', compact('homeSection'));
    }
}
