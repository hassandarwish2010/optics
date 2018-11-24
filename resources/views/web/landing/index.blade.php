@extends('web.layouts.layout')

@section('title', 'Home page')

@php
  $banner = banner(6);
@endphp
@if($banner != null)
@section('css')
<style media="screen">
.designers-container:after {
  background-image: url({{ $banner->file }});
}
</style>
@endsection
@endif

<div class="col-md-12" style="background-color: #000;color: #fff;text-align: center;height: 40px;  line-height: 40px;">{{$setting->des}}</div>

@section('content')
@include('admin.layouts.nav');
<section class="categories container">
  <h2 class="visually-hidden">Categories</h2>
  <div class="cols cols--2 cols--no-gutter">
    
    @if(banner(2) != null)
    <div class="col categories__item gender" data-gender="2" style="background-image: url({{ banner(2)->file }});">
      <div class="categories__content">
        <div>
          <h3 class="categories__">{{ banner(2)->position_name }}</h3>
          <div class="categories__links">
            <ul class="categories__links__list list">
              <li class="categories__links__item"><a href="#">New</a></li>
              <li class="categories__links__item"><a href="#">Essentials</a></li>
              <li class="categories__links__item"><a href="#">Best Sellers</a></li>
              <li class="categories__links__item"><a href="#">Accessories</a></li>
              <li class="categories__links__item"><a href="#">Shop By Designers</a></li>
              <li class="categories__links__item"><a href="#">Shop By Style</a></li>
              <li class="categories__links__item"><a href="#">Personalization</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if(banner(1) != null)
    <div class="col categories__item gender" data-gender="1" style="background-image: url({{ banner(1)->file }});">
      <div class="categories__content">
        <div>
          <h3 class="categories__">{{ banner(1)->position_name }}</h3>
          <div class="categories__links">
            <ul class="categories__links__list list">
              <li class="categories__links__item"><a href="#">New</a></li>
              <li class="categories__links__item"><a href="#">Essentials</a></li>
              <li class="categories__links__item"><a href="#">Best Sellers</a></li>
              <li class="categories__links__item"><a href="#">Accessories</a></li>
              <li class="categories__links__item"><a href="#">Shop By Designers</a></li>
              <li class="categories__links__item"><a href="#">Shop By Style</a></li>
              <li class="categories__links__item"><a href="#">Personalization</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>

<!-- Starting just arrived products -->
@if($just_arrived_products != null)
<br><br><br>
<section class="just-arrived--wrapper container">
  <h2 class="">Just arrived </h2>
  <div class="just-arrived slider cols cols--4">
    @foreach($just_arrived_products as $product)
    <div class="product-card-wrapper col">
      <div class="product-card">
        <div class="product-card__media">
          <a href="javascript:void(0);" data-src="{{ $product->full_image }}" class="make-fancy">
            <img src="{{ $product->image }}" alt="{{ $product->code }}">
          </a>
          <p class="product-card__title">{{ $product->brand->title }} <span> {{ $product->code }} </span></p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endif
<!-- Ending just arrived products -->

<!-- Starting banners section -->
<section class="discover container">
  <h2 class="">Discover</h2>
  <div class="cols cols--2 equal-height">
    @if(count($vidios)>0)
    <div class="col discover-item">
      <div class="discover-item__image">
        <video src="{{ banner(5)->file }}" autoplay muted loop></video>
        <button class="button button--primary">Discover</button>
      </div>
      <h3 class="">{{ $vidios[0]->title }}</h3>
      <p>{{strip_tags($vidios[0]->description )}}</p>
    </div>
    @endif
    <div class="col discover-item discover-item--double">
      @if(banner(3) != null)
      <div class="discover-item">
        <div class="discover-item__image"><img src="{{ banner(3)->file }}" alt="">
          <button class="button button--primary">Discover</button>
        </div>
        <h3 class="">{{ banner(3)->position_name }}</h3>
        <p>{{ banner(3)->title }}</p>
      </div>
      @endif
      @if(banner(4) != null)
      <div class="discover-item">
        <div class="discover-item__image"><img src="{{ banner(4)->file }}" alt="">
          <button class="button button--primary">Discover</button>
        </div>
        <h3 class="">{{ banner(4)->position_name }}</h3>
        <p>{{ banner(4)->title }}</p>
      </div>
      @endif
    </div>
  </div>
</section>
<!-- Ending banners section -->

<!-- Starting collections section -->
<div class="designers-containe">
  <section class="designers container">
    <h2 class="">Designers <span>Collection</span></h2>
    <div class="designers__lists">
        @forelse($collections as $collection)
          <div class="col-3">
            <span class="designers__list__item"><a href="#">{{ $collection->title }}</a></span>
          </div>
        @empty
          <div class="text-center">
            There is no collection until now !
          </div>
        @endforelse
    </div>
    <div class="designers__action"></div>
  </section>
</div>

<!-- Random brands -->
{{--
@if($twoBrandsRandom != null)
<section class="brands container">
  <h2 class="">Brands</h2>
  <div class="cols cols--2 cols--no-gutter equal-height">
    @foreach($twoBrandsRandom as $brand)
    <a class="col brands__item discover-item" href="#">
      <div class="discover-item__image"><img src="{{ $brand->logo }}" alt="">
        <button class="button button--primary">Discover</button>
      </div>
      <h3 class="">{{ $brand->title }}</h3>
    </a>
    @endforeach
  </div>
</section>
@endif
<!-- Random brands -->

<section class="blog container">
  <div class="cols cols--2 cols--no-gutter equal-height">
    <div class="col">
      <h2 class="blog__title  --has-icon">Blog</h2>
      <div class="article-summary">
        <h3 class="article-summary__title">From MAGRABi to every woman out there ..</h3>
        <p> Empower Your Vision</p>
        <p class="article-summary__body">As the leading eyewear & eyecare brand in the Middle East, whose core business is dedicated to vision, MAGRABi activated its first major campaign since the launch of its renewed brand identity in late 2016. Bringing together some of the most followed influencers on the Middle East’s social media sphere, the main campaign film - on air June3 – is an ode to women of the region, and is built on an empowering message: One which emphasizes on having a strong “vision”, as in the ability to imagine and plan her future the way she sees it.</p>
      </div>
    </div>
    <div class="col">
      <div class="article-summary__image"><img src="images/magrabi-campaign.jpg" alt=""></div>
    </div>
  </div>
</section>

<section class="services--wrapper">
  <div class="wrapper">
    <h1 class=" --has-icon">Services</h1>
    <div class="services__slider slider">
      <div class="magrabi-service__slider--img"><img src="images/content/services/img1.jpg" alt="Take Your Free Eye Test">
        <p>Take Your Free Eye Test</p>
      </div>
      <div class="magrabi-service__slider--img"><img src="images/content/services/img2.jpg" alt="Get Your Lenses Fitted">
        <p>Get Your Lenses Fitted</p>
      </div>
      <div class="magrabi-service__slider--img"><img src="images/content/services/img3.jpg" alt="Quick Fixes">
        <p>Quick Fixes</p>
      </div>
      <div class="magrabi-service__slider--img"><img src="images/content/services/img4.jpg" alt="Get Personalized Styling">
        <p>Get Personalized Styling</p>
      </div>
      <div class="magrabi-service__slider--img"><img src="images/content/services/img5.jpg" alt="Personalize Your Eye Case">
        <p>Personalize Your Eye Case</p>
      </div>
      <div class="magrabi-service__slider--img"><img src="images/content/services/img6.jpg" alt="Get Guarnteed Warranty">
        <p>Get Guarnteed Warranty</p>
      </div>
      <div class="magrabi-service__slider--img"><img src="images/content/services/img7.jpg" alt="Wrap Your Gift In Style">
        <p>Wrap Your Gift In Style</p>
      </div>
    </div>
  </div>
</section>
--}}

<!-- Starting mails section -->
@include('web.contact.form')
@include('web.partials.glasses')
<!-- Ending mails section -->
@endsection
