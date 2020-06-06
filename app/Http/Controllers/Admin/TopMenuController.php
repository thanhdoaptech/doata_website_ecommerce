<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTopMenuRequest;
use App\Http\Requests\StoreTopMenuRequest;
use App\Http\Requests\UpdateTopMenuRequest;
use App\TopMenu;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TopMenuController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('top_menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topMenus = TopMenu::all();

        return view('admin.topMenus.index', compact('topMenus'));
    }

    public function create()
    {
        abort_if(Gate::denies('top_menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topMenus.create');
    }

    public function store(StoreTopMenuRequest $request)
    {
        $topMenu = TopMenu::create($request->all());

        if ($request->input('icon', false)) {
            $topMenu->addMedia(storage_path('tmp/uploads/' . $request->input('icon')))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $topMenu->id]);
        }

        return redirect()->route('admin.top-menus.index');
    }

    public function edit(TopMenu $topMenu)
    {
        abort_if(Gate::denies('top_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topMenus.edit', compact('topMenu'));
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

        return redirect()->route('admin.top-menus.index');
    }

    public function show(TopMenu $topMenu)
    {
        abort_if(Gate::denies('top_menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.topMenus.show', compact('topMenu'));
    }

    public function destroy(TopMenu $topMenu)
    {
        abort_if(Gate::denies('top_menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $topMenu->delete();

        return back();
    }

    public function massDestroy(MassDestroyTopMenuRequest $request)
    {
        TopMenu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('top_menu_create') && Gate::denies('top_menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TopMenu();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
