<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionGroupRequest;
use App\Http\Requests\UpdateOptionGroupRequest;
use App\Http\Resources\Admin\OptionGroupResource;
use App\OptionGroup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OptionGroupApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('option_group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionGroupResource(OptionGroup::all());
    }

    public function store(StoreOptionGroupRequest $request)
    {
        $optionGroup = OptionGroup::create($request->all());

        return (new OptionGroupResource($optionGroup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OptionGroup $optionGroup)
    {
        abort_if(Gate::denies('option_group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OptionGroupResource($optionGroup);
    }

    public function update(UpdateOptionGroupRequest $request, OptionGroup $optionGroup)
    {
        $optionGroup->update($request->all());

        return (new OptionGroupResource($optionGroup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OptionGroup $optionGroup)
    {
        abort_if(Gate::denies('option_group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $optionGroup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
