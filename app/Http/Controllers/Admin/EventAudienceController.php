<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventAudience;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventAudienceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_audience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-audience.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_audience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-audience.create');
    }

    public function edit(EventAudience $eventAudience)
    {
        abort_if(Gate::denies('event_audience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-audience.edit', compact('eventAudience'));
    }
}
