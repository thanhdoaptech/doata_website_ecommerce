@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.order.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="1">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ship_name">{{ trans('cruds.order.fields.ship_name') }}</label>
                <input class="form-control {{ $errors->has('ship_name') ? 'is-invalid' : '' }}" type="text" name="ship_name" id="ship_name" value="{{ old('ship_name', '') }}" required>
                @if($errors->has('ship_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ship_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.ship_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ship_address">{{ trans('cruds.order.fields.ship_address') }}</label>
                <input class="form-control {{ $errors->has('ship_address') ? 'is-invalid' : '' }}" type="text" name="ship_address" id="ship_address" value="{{ old('ship_address', '') }}" required>
                @if($errors->has('ship_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ship_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.ship_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ship_address_2">{{ trans('cruds.order.fields.ship_address_2') }}</label>
                <input class="form-control {{ $errors->has('ship_address_2') ? 'is-invalid' : '' }}" type="text" name="ship_address_2" id="ship_address_2" value="{{ old('ship_address_2', '') }}">
                @if($errors->has('ship_address_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ship_address_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.ship_address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.order.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.order.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zip">{{ trans('cruds.order.fields.zip') }}</label>
                <input class="form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                @if($errors->has('zip'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zip') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.zip_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.order.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.order.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', '') }}">
                @if($errors->has('fax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.order.fields.shipping_status') }}</label>
                @foreach(App\Order::SHIPPING_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('shipping_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="shipping_status_{{ $key }}" name="shipping_status" value="{{ $key }}" {{ old('shipping_status', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="shipping_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('shipping_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.shipping_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tax">{{ trans('cruds.order.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="text" name="tax" id="tax" value="{{ old('tax', '') }}">
                @if($errors->has('tax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.order.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tracking_number">{{ trans('cruds.order.fields.tracking_number') }}</label>
                <input class="form-control {{ $errors->has('tracking_number') ? 'is-invalid' : '' }}" type="text" name="tracking_number" id="tracking_number" value="{{ old('tracking_number', '') }}">
                @if($errors->has('tracking_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tracking_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.tracking_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_shipped">{{ trans('cruds.order.fields.date_shipped') }}</label>
                <input class="form-control datetime {{ $errors->has('date_shipped') ? 'is-invalid' : '' }}" type="text" name="date_shipped" id="date_shipped" value="{{ old('date_shipped') }}">
                @if($errors->has('date_shipped'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_shipped') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.date_shipped_helper') }}</span>
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