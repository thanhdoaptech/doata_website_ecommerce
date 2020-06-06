<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTopMenuRequest;
use App\Http\Requests\UpdateTopMenuRequest;
use App\Http\Resources\Admin\TopMenuResource;
use App\TopMenu;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TopMenuApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('top_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TopMenuResource(TopMenu::all());
    }

    public function store(StoreTopMenuRequest $request)
    {
        $topMenu = TopMenu::create($request->all());

        if ($request->input('icon', false)) {
            $topMenu->addMedia(storage_path('tmp/uploads/' . $request->input('icon')))->toMediaCollection('icon');
        }

        return (new TopMenuResource($topMenu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TopMenu $topMenu)
    {
        abort_if(Gate::denies('top_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TopMenuResource($topMenu);
    }

    public function update(UpdateTopMenuRequest $request, TopMenu $topMenu)
    {
        $topMenu->update($request->all());

        if ($request->input('icon', false)) {
            if (!$topMenu->icon || $request->input('icon') !== $topMenu->icon->file_name) {
                $topMenu->addMedia(storage_path('tmp/uploads/' . $request->input('icon')))->toMediaCollection('icon');
            }
        } elseif ($topMenu->icon) {
            $topMenu->icon->delete();
        }

        return (new TopMenuResource($topMenu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TopMenu $topMenu)
    {
        abort_if(Gate::denies('top_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topMenu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
