@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.topMenu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.top-menus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.topMenu.fields.id') }}
                        </th>
                        <td>
                            {{ $topMenu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topMenu.fields.name') }}
                        </th>
                        <td>
                            {{ $topMenu->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topMenu.fields.link') }}
                        </th>
                        <td>
                            {{ $topMenu->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topMenu.fields.icon') }}
                        </th>
                        <td>
                            @if($topMenu->icon)
                                <a href="{{ $topMenu->icon->getUrl() }}" target="_blank">
                                    <img src="{{ $topMenu->icon->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.topMenu.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $topMenu->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.top-menus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection