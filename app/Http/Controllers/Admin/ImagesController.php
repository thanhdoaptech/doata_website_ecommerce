<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyImageRequest;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Image;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ImagesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('image_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $images = Image::all();

        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        abort_if(Gate::denies('image_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.images.create');
    }

    public function store(StoreImageRequest $request)
    {
        $image = Image::create($request->all());

        foreach ($request->input('image_1', []) as $file) {
            $image->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image_1');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $image->id]);
        }

        return redirect()->route('admin.images.index');
    }

    public function edit(Image $image)
    {
        abort_if(Gate::denies('image_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.images.edit', compact('image'));
    }

    public function update(UpdateImageRequest $request, Image $image)
    {
        $image->update($request->all());

        if (count($image->image_1) > 0) {
            foreach ($image->image_1 as $media) {
                if (!in_array($media->file_name, $request->input('image_1', []))) {
                    $media->delete();
                }
            }
        }

        $media = $image->image_1->pluck('file_name')->toArray();

        foreach ($request->input('image_1', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $image->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image_1');
            }
        }

        return redirect()->route('admin.images.index');
    }

    public function show(Image $image)
    {
        abort_if(Gate::denies('image_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.images.show', compact('image'));
    }

    public function destroy(Image $image)
    {
        abort_if(Gate::denies('image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $image->delete();

        return back();
    }

    public function massDestroy(MassDestroyImageRequest $request)
    {
        Image::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('image_create') && Gate::denies('image_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Image();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
