@extends('web.layouts.layout')

@section('title', 'Our Contact_lenses')

@section('content')
<div class="container">
  <h2 class="text-center">Our Contact_lenses</h2><br>
  <div class="row">
    @if(count($lense)>0)
      @foreach($lense as $lens)
      <div class="col-sm-3">
        <div class="product">
          <img src="{{ $lens->image }}" alt="{{ $lens->image }}" class="main-product-image" data-full-src="{{ $lens->full_image }}" style="cursor:pointer;">
          <h3 class="text-center main-product-title">{{ $lens->brand_name }}</h3>
          <h6 class="text-center main-product-code">{{ $lens->color }}</h6>
          <ul class="list-unstyled" style="text-align: center;margin-top: 20px;">
          <li class="child-product-li">
            <a href="javascript:void(0);" data-src="{{ $lens->image }}"  class="chid-product-link" data-full-src="{{ $lens->full_image }}">
              <img src="{{ $lens->image }}" alt="" class="chid-product-image">
            </a>
          </li>
          @foreach($lensess->images as $image)
            <li class="child-product-li">
              <a href="javascript:void(0);" data-src="{{ $image->image }}"  class="chid-product-link"   data-full-src="{{ $image->full_image }}">
                <img src="{{ $image->image }}" alt="" class="chid-product-image">
              </a>
            </li>
          

          @endforeach
          </ul>
        </div>
        <br><br>
      </div>
      @endforeach
  @else
      There is no Contact_lenses until now ! <br><br><br><br>
   @endif
  </div>
</div>
@endsection
