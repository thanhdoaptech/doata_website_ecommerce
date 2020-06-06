@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerSupport.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-supports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerSupport.fields.id') }}
                        </th>
                        <td>
                            {{ $customerSupport->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerSupport.fields.name') }}
                        </th>
                        <td>
                            {{ $customerSupport->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerSupport.fields.description') }}
                        </th>
                        <td>
                            {{ $customerSupport->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerSupport.fields.image') }}
                        </th>
                        <td>
                            @if($customerSupport->image)
                                <a href="{{ $customerSupport->image->getUrl() }}" target="_blank">
                                    <img src="{{ $customerSupport->image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerSupport.fields.sort') }}
                        </th>
                        <td>
                            {{ $customerSupport->sort }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerSupport.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $customerSupport->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-supports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection