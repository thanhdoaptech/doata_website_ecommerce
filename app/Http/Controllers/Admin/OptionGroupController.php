<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOptionGroupRequest;
use App\Http\Requests\StoreOptionGroupRequest;
use App\Http\Requests\UpdateOptionGroupRequest;
use App\OptionGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptionGroupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('option_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $optionGroups = OptionGroup::all();

        return view('admin.optionGroups.index', compact('optionGroups'));
    }

    public function create()
    {
        abort_if(Gate::denies('option_group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.optionGroups.create');
    }

    public function store(StoreOptionGroupRequest $request)
    {
        $optionGroup = OptionGroup::create($request->all());

        return redirect()->route('admin.option-groups.index');
    }

    public function edit(OptionGroup $optionGroup)
    {
        abort_if(Gate::denies('option_group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.optionGroups.edit', compact('optionGroup'));
    }

    public function update(UpdateOptionGroupRequest $request, OptionGroup $optionGroup)
    {
        $optionGroup->update($request->all());

        return redirect()->route('admin.option-groups.index');
    }

    public function show(OptionGroup $optionGroup)
    {
        abort_if(Gate::denies('option_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.optionGroups.show', compact('optionGroup'));
    }

    public function destroy(OptionGroup $optionGroup)
    {
        abort_if(Gate::denies('option_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $optionGroup->delete();

        return back();
    }

    public function massDestroy(MassDestroyOptionGroupRequest $request)
    {
        OptionGroup::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
