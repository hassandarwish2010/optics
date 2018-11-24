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

@section('js')

<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
  });
</script>
@endsection

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="title">{{ __('lang.color') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="color" placeholder="{{ __('lang.color') }}" name="color" value="@if(old('color') != null){{ old('color') }}@elseif(isset($lenses)){{$lenses->color}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('color'))
                <span class="help-block">
                    <strong>{{ $errors->first('color') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>

  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="title">{{ __('lang.brand') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="brand_name" placeholder="{{ __('lang.brand') }}" name="brand_name" value="@if(old('brand_name') != null){{ old('brand_name') }}@elseif(isset($lenses)){{$lenses->brand_name}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('brand_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('brand_name') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
</div>




<div class="row">
  <div class="col-md-12">
    <div class="white-space">
      <div class="form-group">
          <label for="image">{{ __('lang.image') }} @isset($product) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <input type="file" class="form-control" id="image" name="image">
          </div>
          @isset($lenses)
            <img src="{{ $lenses->image }}" alt="{{ $lenses->image }}" class="thumb-image">
          @endisset
          <div class="input-group">
            @if ($errors->has('image'))
                <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
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
