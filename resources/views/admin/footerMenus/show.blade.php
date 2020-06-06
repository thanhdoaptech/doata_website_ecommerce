@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.footerMenu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.footer-menus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.footerMenu.fields.id') }}
                        </th>
                        <td>
                            {{ $footerMenu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.footerMenu.fields.name') }}
                        </th>
                        <td>
                            {{ $footerMenu->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.footerMenu.fields.parent') }}
                        </th>
                        <td>
                            {{ $footerMenu->parent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.footerMenu.fields.image') }}
                        </th>
                        <td>
                            @foreach($footerMenu->image as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.footerMenu.fields.sort') }}
                        </th>
                        <td>
                            {{ $footerMenu->sort }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.footerMenu.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $footerMenu->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.footer-menus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection