@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.option.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.options.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.option.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.option.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="groups">{{ trans('cruds.option.fields.group') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('groups') ? 'is-invalid' : '' }}" name="groups[]" id="groups" multiple>
                    @foreach($groups as $id => $group)
                        <option value="{{ $id }}" {{ in_array($id, old('groups', [])) ? 'selected' : '' }}>{{ $group }}</option>
                    @endforeach
                </select>
                @if($errors->has('groups'))
                    <div class="invalid-feedback">
                        {{ $errors->first('groups') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.option.fields.group_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection