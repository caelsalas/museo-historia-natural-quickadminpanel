<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventCost;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventCostController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_cost_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-cost.index');
    }

    public function create()
    {
        abort_if(Gate::denies('event_cost_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-cost.create');
    }

    public function edit(EventCost $eventCost)
    {
        abort_if(Gate::denies('event_cost_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.event-cost.edit', compact('eventCost'));
    }
}
