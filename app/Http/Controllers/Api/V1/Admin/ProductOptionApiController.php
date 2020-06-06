<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductOptionRequest;
use App\Http\Requests\UpdateProductOptionRequest;
use App\Http\Resources\Admin\ProductOptionResource;
use App\ProductOption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductOptionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductOptionResource(ProductOption::with(['products', 'options'])->get());
    }

    public function store(StoreProductOptionRequest $request)
    {
        $productOption = ProductOption::create($request->all());
        $productOption->products()->sync($request->input('products', []));
        $productOption->options()->sync($request->input('options', []));

        return (new ProductOptionResource($productOption))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProductOption $productOption)
    {
        abort_if(Gate::denies('product_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProductOptionResource($productOption->load(['products', 'options']));
    }

    public function update(UpdateProductOptionRequest $request, ProductOption $productOption)
    {
        $productOption->update($request->all());
        $productOption->products()->sync($request->input('products', []));
        $productOption->options()->sync($request->input('options', []));

        return (new ProductOptionResource($productOption))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProductOption $productOption)
    {
        abort_if(Gate::denies('product_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productOption->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
