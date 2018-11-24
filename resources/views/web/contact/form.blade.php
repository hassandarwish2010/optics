<section class="contact">
  <div class="container">
    <h3 class="text-center">Contact us</h3><br />

<div class="row">
  <div class="col-md-8">
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
    
      <form action="{{ route('contact') }}" method="post">
        @csrf
        <input class="form-control" name="name" placeholder="Name..." / required="required"><br />
        <input class="form-control" name="email" placeholder="E-mail..." / required="required"><br />
        <textarea class="form-control" name="details" placeholder="How can we help you?" style="height:150px;" required="required"></textarea><br />
        <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
      </form>
  </div>
  <div class="col-md-4">
    @if(isset($setting->address) && $setting->address != null)
      <b>Address: </b>
      {{ $setting->address }}<br /><br /><br />
    @endif

    @if(isset($setting->email) && $setting->email != null)
      <b>Email: </b>
      {{ $setting->email }}<br /><br /><br />
    @endif

    @if(isset($setting->phone) && $setting->phone != null)
      <b>Phone: </b>
      {{ $setting->phone }}<br /><br /><br />
    @endif


  </div>
</div>

</div>
</section>
