<?php

namespace App\Http\Controllers\Admin;

use App\FooterMenu;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFooterMenuRequest;
use App\Http\Requests\StoreFooterMenuRequest;
use App\Http\Requests\UpdateFooterMenuRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FooterMenuController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('footer_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $footerMenus = FooterMenu::all();

        return view('admin.footerMenus.index', compact('footerMenus'));
    }

    public function create()
    {
        abort_if(Gate::denies('footer_menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footerMenus.create');
    }

    public function store(StoreFooterMenuRequest $request)
    {
        $footerMenu = FooterMenu::create($request->all());

        foreach ($request->input('image', []) as $file) {
            $footerMenu->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $footerMenu->id]);
        }

        return redirect()->route('admin.footer-menus.index');
    }

    public function edit(FooterMenu $footerMenu)
    {
        abort_if(Gate::denies('footer_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footerMenus.edit', compact('footerMenu'));
    }

    public function update(UpdateFooterMenuRequest $request, FooterMenu $footerMenu)
    {
        $footerMenu->update($request->all());

        if (count($footerMenu->image) > 0) {
            foreach ($footerMenu->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }

        $media = $footerMenu->image->pluck('file_name')->toArray();

        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $footerMenu->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
            }
        }

        return redirect()->route('admin.footer-menus.index');
    }

    public function show(FooterMenu $footerMenu)
    {
        abort_if(Gate::denies('footer_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footerMenus.show', compact('footerMenu'));
    }

    public function destroy(FooterMenu $footerMenu)
    {
        abort_if(Gate::denies('footer_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $footerMenu->delete();

        return back();
    }

    public function massDestroy(MassDestroyFooterMenuRequest $request)
    {
        FooterMenu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('footer_menu_create') && Gate::denies('footer_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FooterMenu();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
