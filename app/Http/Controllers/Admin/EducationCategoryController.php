<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EducationCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('education_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.education-category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('education_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.education-category.create');
    }

    public function edit(EducationCategory $educationCategory)
    {
        abort_if(Gate::denies('education_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.education-category.edit', compact('educationCategory'));
    }
}
