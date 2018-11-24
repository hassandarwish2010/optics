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
            <label for="title">{{ __('lang.title') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="title" placeholder="{{ __('lang.title') }}" name="title" value="@if(old('title') != null){{ old('title') }}@elseif(isset($banner)){{$banner->title}}@endif" required="required">
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

  <div class="col col-md-6">
    <div class="white-box">
      <div class="form-group">
          <label for="image">{{ __('lang.file') }} @isset($banner) @else * @endisset</label>
          <div class="input-group">
              <div class="input-group-addon"><i class="ti-gallery"></i></div>
              <input type="file" class="form-control" id="file" name="file">
          </div>
          @isset($banner)
            @if($banner->position_id == 5)
              <video src="{{ $banner->file }}" controls style="width:100px;height:100px;"></video>
            @else
              <img src="{{ $banner->file }}" alt="{{ $banner->title }}" class="thumb-image">
            @endif
          @endisset
          <div class="input-group">
            @if ($errors->has('file'))
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
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
                <label for="description">{{ __('lang.description') }} *</label>
                <select class="js-example-basic-multiple-limit js-states form-control" name="position_id">
                  <option value="1" @isset($banner) @if($banner->position_id == 1) {{ 'selected' }} @endif @endisset @if(old('position_id') == 1) {{ 'selected' }} @endif>Men</option>
                  <option value="2" @isset($banner) @if($banner->position_id == 2) {{ 'selected' }} @endif @endisset @if(old('position_id') == 2) {{ 'selected' }} @endif>Women</option>
                  <option value="3" @isset($banner) @if($banner->position_id == 3) {{ 'selected' }} @endif @endisset @if(old('position_id') == 3) {{ 'selected' }} @endif>Best sellers</option>
                  <option value="4" @isset($banner) @if($banner->position_id == 4) {{ 'selected' }} @endif @endisset @if(old('position_id') == 4) {{ 'selected' }} @endif>Execlusive</option>
                  <option value="5" @isset($banner) @if($banner->position_id == 5) {{ 'selected' }} @endif @endisset @if(old('position_id') == 5) {{ 'selected' }} @endif>Video</option>
                  <option value="6" @isset($banner) @if($banner->position_id == 6) {{ 'selected' }} @endif @endisset @if(old('position_id') == 6) {{ 'selected' }} @endif>Designer colllections</option>
                   <option value="7" @isset($banner) @if($banner->position_id == 7) {{ 'selected' }} @endif @endisset @if(old('position_id') == 7) {{ 'selected' }} @endif>slideShow</option>

                </select>
                @if ($errors->has('position_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('position_id') }}</strong>
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
                <label for="description">{{ __('lang.description') }} *</label>
                <textarea id="editor1" name="description" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.description') }}">@if(old('description') != null){{ old('description') }}@elseif(isset($banner->description)){{$banner->description}}@endif</textarea>
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
