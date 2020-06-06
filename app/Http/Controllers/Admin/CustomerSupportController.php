<?php

namespace App\Http\Controllers\Admin;

use App\CustomerSupport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCustomerSupportRequest;
use App\Http\Requests\StoreCustomerSupportRequest;
use App\Http\Requests\UpdateCustomerSupportRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CustomerSupportController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('customer_support_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CustomerSupport::with(['created_by'])->select(sprintf('%s.*', (new CustomerSupport)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'customer_support_show';
                $editGate      = 'customer_support_edit';
                $deleteGate    = 'customer_support_delete';
                $crudRoutePart = 'customer-supports';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('sort', function ($row) {
                return $row->sort ? $row->sort : "";
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'active']);

            return $table->make(true);
        }

        return view('admin.customerSupports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('customer_support_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerSupports.create');
    }

    public function store(StoreCustomerSupportRequest $request)
    {
        $customerSupport = CustomerSupport::create($request->all());

        if ($request->input('image', false)) {
            $customerSupport->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $customerSupport->id]);
        }

        return redirect()->route('admin.customer-supports.index');
    }

    public function edit(CustomerSupport $customerSupport)
    {
        abort_if(Gate::denies('customer_support_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerSupport->load('created_by');

        return view('admin.customerSupports.edit', compact('customerSupport'));
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

        return redirect()->route('admin.customer-supports.index');
    }

    public function show(CustomerSupport $customerSupport)
    {
        abort_if(Gate::denies('customer_support_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerSupport->load('created_by');

        return view('admin.customerSupports.show', compact('customerSupport'));
    }

    public function destroy(CustomerSupport $customerSupport)
    {
        abort_if(Gate::denies('customer_support_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerSupport->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerSupportRequest $request)
    {
        CustomerSupport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('customer_support_create') && Gate::denies('customer_support_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CustomerSupport();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
