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
            <label for="title">{{ __('lang.title') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="title" placeholder="{{ __('lang.title') }}" name="title" value="@if(old('title') != null){{ old('title') }}@elseif(isset($brand)){{$brand->title}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
  <div class="col-md-6">
    <div class="white-space">
      <div class="form-group">
          <label for="image">{{ __('lang.logo') }} @isset($brand) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <input type="file" class="form-control" id="logo" name="logo">
          </div>
          @isset($brand)
            <img src="{{ $brand->logo }}" alt="{{ $brand->title }}" class="thumb-image">
          @endisset
          <div class="input-group">
            @if ($errors->has('logo'))
                <span class="help-block">
                    <strong>{{ $errors->first('logo') }}</strong>
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
