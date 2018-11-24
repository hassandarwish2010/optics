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
            <label for="title">{{ __('lang.code') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="code" placeholder="{{ __('lang.code') }}" name="code" value="@if(old('code') != null){{ old('code') }}@elseif(isset($product)){{$product->code}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('code'))
                <span class="help-block">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>

  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="category_id">{{ __('lang.brand') }} *</label>
            <div class="input-group">
              <select class="js-example-basic-multiple-limit js-states form-control" name="brand_id">
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @isset($product) @if($product->brand_id == $brand->id) {{ 'selected' }} @endif @endisset @if(old('brand_id') == $brand->id) {{ 'selected' }} @endif>{{ $brand->title }}</option>
                  @endforeach
              </select>
            </div>
            <div class="input-group">
            @if ($errors->has('brand_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('brand_id') }}</strong>
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
            <label for="title">{{ __('lang.type') }} *</label>
            <div class="input-group">
              <select class="js-example-basic-multiple-limit js-states form-control" name="type">
                  <option value="1" @isset($product) @if($product->type == 1) {{ 'selected' }} @endif @endisset @if(old('type') == 1) {{ 'selected' }} @endif>Sunglasses</option>
                  <option value="2" @isset($product) @if($product->type == 2) {{ 'selected' }} @endif @endisset @if(old('type') == 2) {{ 'selected' }} @endif>Optical</option>
              </select>
            </div>
            <div class="input-group">
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>

  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="category_id">{{ __('lang.gender') }} *</label>
            <div class="input-group">
              <select class="js-example-basic-multiple-limit js-states form-control" name="gender">
                  <option value="1" @isset($product) @if($product->gender == 1) {{ 'selected' }} @endif @endisset @if(old('gender') == 1) {{ 'selected' }} @endif>Men</option>
                  <option value="2" @isset($product) @if($product->gender == 2) {{ 'selected' }} @endif @endisset @if(old('gender') == 2) {{ 'selected' }} @endif>Women</option>
                  <option value="3" @isset($product) @if($product->gender == 3) {{ 'selected' }} @endif @endisset @if(old('gender') == 2) {{ 'selected' }} @endif>Kids</option>
              </select>
            </div>
            <div class="input-group">
            @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                <label for="details">{{ __('lang.details') }}</label>
                <textarea id="editor1" name="details" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.details') }}">@if(old('details') != null){{ old('details') }}@elseif(isset($product->details)){{$product->details}}@endif</textarea>
                @if ($errors->has('details'))
                    <span class="help-block">
                        <strong>{{ $errors->first('details') }}</strong>
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
          @isset($product)
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="thumb-image">
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
  <div class="seo col-sm-12">
    <h1>SEO INFO</h1>
    <button type="button" class="btn btn-primary" onclick="loadProductsSeoInfo();return false;" style="display: block;margin: 20px auto;">Generate SEO Info</button>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="permalink">{{ __('lang.permalink') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" id="permalink" placeholder="{{ __('lang.permalink') }}" name="permalink" value="@if(old('permalink') != null){{ old('permalink') }}@elseif(isset($product)){{$product->permalink}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('permalink'))
                <span class="help-block">
                    <strong>{{ $errors->first('permalink') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
  <div class="col col-md-6">
      <div class="white-box">
        <div class="form-group">
            <label for="keywords">{{ __('lang.keywords') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" id="keywords" placeholder="{{ __('lang.keywords') }}" name="keywords" value="@if(old('keywords') != null){{ old('keywords') }}@elseif(isset($product)){{$product->keywords}}@endif" required="required">
            </div>
            <div class="input-group">
            @if ($errors->has('keywords'))
                <span class="help-block">
                    <strong>{{ $errors->first('keywords') }}</strong>
                </span>
            @endif
            </div>
        </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                <label for="description">{{ __('lang.description') }}</label>
                <textarea name="description" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.description') }}">@if(old('description') != null){{ old('description') }}@elseif(isset($product->description)){{$product->description}}@endif</textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
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
