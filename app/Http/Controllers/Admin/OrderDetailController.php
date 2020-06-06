<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyOrderDetailRequest;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Order;
use App\OrderDetail;
use App\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrderDetailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('order_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OrderDetail::with(['orders', 'products', 'created_by'])->select(sprintf('%s.*', (new OrderDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'order_detail_show';
                $editGate      = 'order_detail_edit';
                $deleteGate    = 'order_detail_delete';
                $crudRoutePart = 'order-details';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('order', function ($row) {
                $labels = [];

                foreach ($row->orders as $order) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $order->ship_name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('product', function ($row) {
                $labels = [];

                foreach ($row->products as $product) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $product->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : "";
            });
            $table->editColumn('quanity', function ($row) {
                return $row->quanity ? $row->quanity : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'order', 'product']);

            return $table->make(true);
        }

        return view('admin.orderDetails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('order_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::all()->pluck('ship_name', 'id');

        $products = Product::all()->pluck('name', 'id');

        return view('admin.orderDetails.create', compact('orders', 'products'));
    }

    public function store(StoreOrderDetailRequest $request)
    {
        $orderDetail = OrderDetail::create($request->all());
        $orderDetail->orders()->sync($request->input('orders', []));
        $orderDetail->products()->sync($request->input('products', []));

        return redirect()->route('admin.order-details.index');
    }

    public function edit(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::all()->pluck('ship_name', 'id');

        $products = Product::all()->pluck('name', 'id');

        $orderDetail->load('orders', 'products', 'created_by');

        return view('admin.orderDetails.edit', compact('orders', 'products', 'orderDetail'));
    }

    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        $orderDetail->update($request->all());
        $orderDetail->orders()->sync($request->input('orders', []));
        $orderDetail->products()->sync($request->input('products', []));

        return redirect()->route('admin.order-details.index');
    }

    public function show(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderDetail->load('orders', 'products', 'created_by');

        return view('admin.orderDetails.show', compact('orderDetail'));
    }

    public function destroy(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderDetailRequest $request)
    {
        OrderDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
