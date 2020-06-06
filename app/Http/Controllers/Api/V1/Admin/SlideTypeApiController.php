<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideTypeRequest;
use App\Http\Requests\UpdateSlideTypeRequest;
use App\Http\Resources\Admin\SlideTypeResource;
use App\SlideType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlideTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('slide_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SlideTypeResource(SlideType::all());
    }

    public function store(StoreSlideTypeRequest $request)
    {
        $slideType = SlideType::create($request->all());

        return (new SlideTypeResource($slideType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SlideType $slideType)
    {
        abort_if(Gate::denies('slide_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SlideTypeResource($slideType);
    }

    public function update(UpdateSlideTypeRequest $request, SlideType $slideType)
    {
        $slideType->update($request->all());

        return (new SlideTypeResource($slideType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SlideType $slideType)
    {
        abort_if(Gate::denies('slide_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slideType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
