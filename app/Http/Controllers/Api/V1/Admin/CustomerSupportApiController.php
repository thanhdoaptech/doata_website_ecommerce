<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\CustomerSupport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCustomerSupportRequest;
use App\Http\Requests\UpdateCustomerSupportRequest;
use App\Http\Resources\Admin\CustomerSupportResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerSupportApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_support_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerSupportResource(CustomerSupport::with(['created_by'])->get());
    }

    public function store(StoreCustomerSupportRequest $request)
    {
        $customerSupport = CustomerSupport::create($request->all());

        if ($request->input('image', false)) {
            $customerSupport->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new CustomerSupportResource($customerSupport))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CustomerSupport $customerSupport)
    {
        abort_if(Gate::denies('customer_support_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerSupportResource($customerSupport->load(['created_by']));
    }

    public function update(UpdateCustomerSupportRequest $request, CustomerSupport $customerSupport)
    {
        $customerSupport->update($request->all());

        if ($request->input('image', false)) {
            if (!$customerSupport->image || $request->input('image') !== $customerSupport->image->file_name) {
                $customerSupport->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($customerSupport->image) {
            $customerSupport->image->delete();
        }

        return (new CustomerSupportResource($customerSupport))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CustomerSupport $customerSupport)
    {
        abort_if(Gate::denies('customer_support_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerSupport->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
