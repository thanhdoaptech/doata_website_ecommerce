<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use App\Http\Resources\Admin\SlideResource;
use App\Slide;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlideApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('slide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SlideResource(Slide::with(['slide_types'])->get());
    }

    public function store(StoreSlideRequest $request)
    {
        $slide = Slide::create($request->all());
        $slide->slide_types()->sync($request->input('slide_types', []));

        if ($request->input('image', false)) {
            $slide->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new SlideResource($slide))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Slide $slide)
    {
        abort_if(Gate::denies('slide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SlideResource($slide->load(['slide_types']));
    }

    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $slide->update($request->all());
        $slide->slide_types()->sync($request->input('slide_types', []));

        if ($request->input('image', false)) {
            if (!$slide->image || $request->input('image') !== $slide->image->file_name) {
                $slide->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($slide->image) {
            $slide->image->delete();
        }

        return (new SlideResource($slide))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Slide $slide)
    {
        abort_if(Gate::denies('slide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slide->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
