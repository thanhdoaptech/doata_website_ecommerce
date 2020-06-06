<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\FooterMenu;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreFooterMenuRequest;
use App\Http\Requests\UpdateFooterMenuRequest;
use App\Http\Resources\Admin\FooterMenuResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FooterMenuApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('footer_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FooterMenuResource(FooterMenu::all());
    }

    public function store(StoreFooterMenuRequest $request)
    {
        $footerMenu = FooterMenu::create($request->all());

        if ($request->input('image', false)) {
            $footerMenu->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new FooterMenuResource($footerMenu))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FooterMenu $footerMenu)
    {
        abort_if(Gate::denies('footer_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FooterMenuResource($footerMenu);
    }

    public function update(UpdateFooterMenuRequest $request, FooterMenu $footerMenu)
    {
        $footerMenu->update($request->all());

        if ($request->input('image', false)) {
            if (!$footerMenu->image || $request->input('image') !== $footerMenu->image->file_name) {
                $footerMenu->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($footerMenu->image) {
            $footerMenu->image->delete();
        }

        return (new FooterMenuResource($footerMenu))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FooterMenu $footerMenu)
    {
        abort_if(Gate::denies('footer_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $footerMenu->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
