<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductOptionRequest;
use App\Http\Requests\StoreProductOptionRequest;
use App\Http\Requests\UpdateProductOptionRequest;
use App\Option;
use App\Product;
use App\ProductOption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductOptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productOptions = ProductOption::all();

        return view('admin.productOptions.index', compact('productOptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id');

        $options = Option::all()->pluck('name', 'id');

        return view('admin.productOptions.create', compact('products', 'options'));
    }

    public function store(StoreProductOptionRequest $request)
    {
        $productOption = ProductOption::create($request->all());
        $productOption->products()->sync($request->input('products', []));
        $productOption->options()->sync($request->input('options', []));

        return redirect()->route('admin.product-options.index');
    }

    public function edit(ProductOption $productOption)
    {
        abort_if(Gate::denies('product_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::all()->pluck('name', 'id');

        $options = Option::all()->pluck('name', 'id');

        $productOption->load('products', 'options');

        return view('admin.productOptions.edit', compact('products', 'options', 'productOption'));
    }

    public function update(UpdateProductOptionRequest $request, ProductOption $productOption)
    {
        $productOption->update($request->all());
        $productOption->products()->sync($request->input('products', []));
        $productOption->options()->sync($request->input('options', []));

        return redirect()->route('admin.product-options.index');
    }

    public function show(ProductOption $productOption)
    {
        abort_if(Gate::denies('product_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productOption->load('products', 'options');

        return view('admin.productOptions.show', compact('productOption'));
    }

    public function destroy(ProductOption $productOption)
    {
        abort_if(Gate::denies('product_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productOption->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductOptionRequest $request)
    {
        ProductOption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
