<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventModality;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventModalityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_modality_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-modality.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_modality_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-modality.create');
    }

    public function edit(EventModality $eventModality)
    {
        abort_if(Gate::denies('event_modality_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-modality.edit', compact('eventModality'));
    }
}
