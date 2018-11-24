@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="name">{{ __('lang.name') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="name" placeholder="{{ __('lang.name') }}" name="name" value="@if(old('name') != null){{ old('name') }}@elseif(isset($store)){{$store->name}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="name">{{ __('lang.phone') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                <input type="text" class="form-control" id="phone" placeholder="{{ __('lang.phone') }}" name="phone" value="@if(old('phone') != null){{ old('phone') }}@elseif(isset($store)){{$store->phone}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="country">{{ __('lang.country') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                <input type="text" class="form-control" id="country" placeholder="{{ __('lang.country') }}" name="country" value="@if(old('country') != null){{ old('country') }}@elseif(isset($store)){{$store->country}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('country'))
                <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="city">{{ __('lang.city') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                <input type="text" class="form-control" id="city" placeholder="{{ __('lang.city') }}" name="city" value="@if(old('city') != null){{ old('city') }}@elseif(isset($store)){{$store->city}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="country">{{ __('lang.address') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                <input type="text" class="form-control" id="address" placeholder="{{ __('lang.address') }}" name="address" value="@if(old('address') != null){{ old('address') }}@elseif(isset($store)){{$store->address}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="working_hours">{{ __('lang.working_hours') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                <input type="text" class="form-control" id="working_hours" placeholder="{{ __('lang.working_hours') }}" name="working_hours" value="@if(old('working_hours') != null){{ old('working_hours') }}@elseif(isset($store)){{$store->working_hours}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('working_hours'))
                <span class="help-block">
                    <strong>{{ $errors->first('working_hours') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col col-md-12">
    <div class="white-box">
      <div class="form-group">
          <button type="submit" class="btn btn-success btn-block waves-effect waves-light mt-25">{{ __('lang.save') }}</button>
      </div>
    </div>
  </div>
</div>
