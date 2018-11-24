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
  <div class="col col-md-12">
      <div class="white-box">
        <div class="form-group">
            <label for="title">{{ __('lang.name') }} *</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-tag"></i></div>
                <input type="text" class="form-control" id="name" placeholder="{{ __('lang.name') }}" name="name" value="@if(old('name') != null){{ old('name') }}@elseif(isset($job)){{$job->name}}@endif" required="required">
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
</div>

<div class="row">
  <div class="col-md-12">
      <div class="white-box">
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                <label for="details">{{ __('lang.details') }} *</label>
                <textarea id="editor1" name="details" rows="8" class="form-control" style="resize:vertical;width:100%;" placeholder="{{ __('lang.details') }}">@if(old('details') != null){{ old('details') }}@elseif(isset($job->details)){{$job->details}}@endif</textarea>
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
  <div class="col col-md-12">
    <div class="white-box">
      <div class="form-group">
          <button type="submit" class="btn btn-success btn-block waves-effect waves-light mt-25">{{ __('lang.save') }}</button>
      </div>
    </div>
  </div>
</div>
