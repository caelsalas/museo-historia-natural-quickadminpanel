<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublicationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('publication_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publication.index');
    }

    public function create()
    {
        abort_if(Gate::denies('publication_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publication.create');
    }

    public function edit(Publication $publication)
    {
        abort_if(Gate::denies('publication_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publication.edit', compact('publication'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['publication_create', 'publication_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new Publication();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
