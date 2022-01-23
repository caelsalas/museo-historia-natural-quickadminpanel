<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-type.create');
    }

    public function edit(EventType $eventType)
    {
        abort_if(Gate::denies('event_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-type.edit', compact('eventType'));
    }
}
