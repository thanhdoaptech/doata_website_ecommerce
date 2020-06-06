<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\Admin\ImageResource;
use App\Image;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImagesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageResource(Image::all());
    }

    public function store(StoreImageRequest $request)
    {
        $image = Image::create($request->all());

        if ($request->input('image_1', false)) {
            $image->addMedia(storage_path('tmp/uploads/' . $request->input('image_1')))->toMediaCollection('image_1');
        }

        return (new ImageResource($image))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Image $image)
    {
        abort_if(Gate::denies('image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageResource($image);
    }

    public function update(UpdateImageRequest $request, Image $image)
    {
        $image->update($request->all());

        if ($request->input('image_1', false)) {
            if (!$image->image_1 || $request->input('image_1') !== $image->image_1->file_name) {
                $image->addMedia(storage_path('tmp/uploads/' . $request->input('image_1')))->toMediaCollection('image_1');
            }
        } elseif ($image->image_1) {
            $image->image_1->delete();
        }

        return (new ImageResource($image))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Image $image)
    {
        abort_if(Gate::denies('image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $image->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
