@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productOption.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-options.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="products">{{ trans('cruds.productOption.fields.product') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productOption.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="options">{{ trans('cruds.productOption.fields.option') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('options') ? 'is-invalid' : '' }}" name="options[]" id="options" multiple>
                    @foreach($options as $id => $option)
                        <option value="{{ $id }}" {{ in_array($id, old('options', [])) ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
                @if($errors->has('options'))
                    <div class="invalid-feedback">
                        {{ $errors->first('options') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productOption.fields.option_helper') }}</span>
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