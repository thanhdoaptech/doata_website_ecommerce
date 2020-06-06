<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySlideTypeRequest;
use App\Http\Requests\StoreSlideTypeRequest;
use App\Http\Requests\UpdateSlideTypeRequest;
use App\SlideType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlideTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('slide_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slideTypes = SlideType::all();

        return view('admin.slideTypes.index', compact('slideTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('slide_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slideTypes.create');
    }

    public function store(StoreSlideTypeRequest $request)
    {
        $slideType = SlideType::create($request->all());

        return redirect()->route('admin.slide-types.index');
    }

    public function edit(SlideType $slideType)
    {
        abort_if(Gate::denies('slide_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slideTypes.edit', compact('slideType'));
    }

    public function update(UpdateSlideTypeRequest $request, SlideType $slideType)
    {
        $slideType->update($request->all());

        return redirect()->route('admin.slide-types.index');
    }

    public function show(SlideType $slideType)
    {
        abort_if(Gate::denies('slide_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slideTypes.show', compact('slideType'));
    }

    public function destroy(SlideType $slideType)
    {
        abort_if(Gate::denies('slide_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slideType->delete();

        return back();
    }

    public function massDestroy(MassDestroySlideTypeRequest $request)
    {
        SlideType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
