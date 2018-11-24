@extends('web.layouts.layout')

@section('title', 'Our Products')

@section('content')
<div class="container">
  <h2 class="text-center">Our products</h2><br>
  <div class="row">
    @forelse($products as $product)
      <div class="col-sm-3">
        <div class="product">
          <img src="{{ $product->image }}" alt="{{ $product->name }}" class="main-product-image" data-full-src="{{ $product->full_image }}" style="cursor:pointer;">
          <h3 class="text-center main-product-title">{{ $product->brand->title }}</h3>
          <h6 class="text-center main-product-code">{{ $product->code }}</h6>
          <ul class="list-unstyled" style="text-align: center;margin-top: 20px;">
          <li class="child-product-li">
            <a href="javascript:void(0);" data-src="{{ $product->image }}"  class="chid-product-link" data-full-src="{{ $product->full_image }}">
              <img src="{{ $product->image }}" alt="" class="chid-product-image">
            </a>
          </li>
          @forelse($product->images as $image)
            <li class="child-product-li">
              <a href="javascript:void(0);" data-src="{{ $image->image }}"  class="chid-product-link"   data-full-src="{{ $image->full_image }}">
                <img src="{{ $image->image }}" alt="" class="chid-product-image">
              </a>
            </li>
          @empty

          @endforelse
          </ul>
        </div>
        <br><br>
      </div>
    @empty
      There is no products until now ! <br><br><br><br>
    @endforelse
  </div>
</div>
@endsection
