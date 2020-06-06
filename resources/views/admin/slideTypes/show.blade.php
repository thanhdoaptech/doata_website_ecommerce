@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.slideType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.slide-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.id') }}
                        </th>
                        <td>
                            {{ $slideType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.name') }}
                        </th>
                        <td>
                            {{ $slideType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.description') }}
                        </th>
                        <td>
                            {{ $slideType->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.width') }}
                        </th>
                        <td>
                            {{ $slideType->width }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.height') }}
                        </th>
                        <td>
                            {{ $slideType->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.price') }}
                        </th>
                        <td>
                            {{ $slideType->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.max_item') }}
                        </th>
                        <td>
                            {{ $slideType->max_item }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.slideType.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $slideType->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.slide-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection