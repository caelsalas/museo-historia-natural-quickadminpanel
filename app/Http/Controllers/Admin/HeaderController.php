<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HeaderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('header_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.header.index');
    }

    public function create()
    {
        abort_if(Gate::denies('header_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.header.create');
    }

    public function edit(Header $header)
    {
        abort_if(Gate::denies('header_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.header.edit', compact('header'));
    }

    public function show(Header $header)
    {
        abort_if(Gate::denies('header_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.header.show', compact('header'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['header_create', 'header_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                'image|dimensions:max_width=%s,max_height=%s',
                request()->input('max_width', 100000),
                request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Header();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
