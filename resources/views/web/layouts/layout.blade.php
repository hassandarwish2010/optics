<!DOCTYPE html>
<html class="no-js" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{ config('app.name', 'Sedrak') }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('public/publics/images/favicon.ico') }}">
    <meta name="theme-color" content="#000000">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('public/web/template/styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/web/css/style.css') }}">
    @yield('css')
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116937179-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116937179-1');
</script>
</head>
  <body>
    <!--[if lt IE 10]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" upgrade your browser to improve your experience.</p>-->
    <header class="nav-down">
      <div class="bottom-header--wrapper clearfix container">
        <h1 class="logo">
          <span class="visually-hidden">  {{ config('app.name', 'Sedrak') }} </span>
          <a href="{{ route('landing') }}">
            <img src="{{ asset('public/publics/images/logo.png') }}" srcset="{{ asset('public/publics/images/logo.png') }}">
          </a>
        </h1>
        <div class="actions-search-lang-wrapper">
          <ul class="nav">
            <li class="main-li "><a class="location" style="font-size: 17px;padding: 10px 5px" href="{{ route('stores') }}"> Our stores </a></li>
            <li class="main-li dropdown">
              <a href="javascript:void(0);" style="font-size: 17px;padding: 10px 5px">Designer colections</a> 
              <ul role="menu" class="dropdown-menu">
                <li class="leaf">
                  <a href="javascript:void(0);">Men</a>
                  <ul class="second-level">
                    <li><a href="{{ route('products', ['gender' => 1, 'type' => 1]) }}">  Sunglasses </a></li>
                    <li><a href="{{ route('products', ['gender' => 1, 'type' => 2]) }}"> Optical </a></li>
                  </ul>
                </li>
                <li class="leaf">
                  <a href="javascript:void(0);">Women</a>
                  <ul class="second-level">
                    <li><a href="{{ route('products', ['gender' => 2, 'type' => 1]) }}"> Sunglasses </a></li>
                    <li><a href="{{ route('products', ['gender' => 2, 'type' => 2]) }}"> Optical </a></li>
                  </ul>
                </li>
                <li class="leaf">
                  <a href="javascript:void(0);">Kids</a>
                  <ul class="second-level">
                    <li><a href="{{ route('products', ['gender' => 3, 'type' => 1]) }}"> Sunglasses </a></li>
                    <li><a href="{{ route('products', ['gender' => 3, 'type' => 2]) }}"> Optical</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="main-li"><a href="{{ route('contact_lenses') }}" style="font-size: 17px;padding: 10px 5px">Contact_lenses</a></li>
            <li class="main-li dropdown">
              <a href="javascript:void(0);" style="font-size: 17px;padding: 10px 5px">About pages</a> 
              <ul role="menu" class="dropdown-menu">
                @forelse($about_pages as $about)
                <li class="leaf"><a href="{{ route('about', $about->permalink) }}" style="font-size: 17px;padding: 10px 5px">{{ $about->name }}</a></li>
                @empty
                  <li class="first leaf"><a href="#" class="active">There is no pages</a></li>
                @endforelse
              </ul>
            </li>

            <li class="main-li"><a href="{{ route('contact.get') }}"style="font-size: 17px;padding: 10px 5px">Contact</a></li>
          </ul>
        </div>
      </div>
    </header>

    @yield('content')

    <footer class="footer">
      <div class="container--narrow container">
        <div class="cols cols--3">
          <div class="col">
            <p class="to-uppercase">{{ config('app.name', 'Sedrak') }}</p>
            <ul class="list">
              @forelse($about_pages as $about)
              <li class="leaf"><a href="{{ route('about', $about->permalink) }}">{{ $about->name }}</a></li>
              @empty
                <li class="leaf"><a href="#" class="active">There is no pages</a></li>
              @endforelse
            </ul>
          </div>
          <div class="col">
            <p class="to-uppercase">Customer Care</p>
            <ul class="list">
              <li>
                <a href="{{ route('stores') }}">Our Stores</a>
                <a href="{{ route('contact.get') }}">Contact Us</a>
              </li>
            </ul>
          </div>
          <div class="col">
            <p class="to-uppercase">
              <span class="m-before">{{ config('app.name', 'Sedrak') }}</span>
              <span>Contacts</span>
            </p>
            <ul class="list">
              @php
                $setting = \App\Setting::first();
              @endphp
              @if(isset($setting->address) && $setting->address != null)
                <b>Address: </b>
                {{ $setting->address }}<br />
              @endif

              @if(isset($setting->email) && $setting->email != null)
                <b>Email: </b>
                {{ $setting->email }}<br />
              @endif

              @if(isset($setting->phone) && $setting->phone != null)
                <b>Phone: </b>
                {{ $setting->phone }}<br />
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom--wrapper">
        <div class="container--narrow container">
          <p>
            <img src="{{ asset('public/publics/images/logo.png') }}" alt="{{ config('app.name', 'Sedrak') }}">&copy; 2018 {{ config('app.name', 'Sedrak') }}, All Rights Reserved.
          </p>
          <ul class="list list--inline list--pipe-separator">
            <li><a href="#">About</a></li>
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </footer>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyA5lULIvpMthG3YBMyz8cLzZQ0VPXKO_hc"></script>
    <script src="{{ asset('public/web/template/scripts/main.js') }}"></script>
    <script src="http://localhost/sefrry/public/js/jquery-1.10.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('public/web/js/plugin.js') }}"></script>
  </body>

<!-- Mirrored from www.magrabioptical.com/ by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 03 Aug 2018 04:46:56 GMT -->
</html>
