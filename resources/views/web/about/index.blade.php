@extends('web.layouts.layout')

@section('title', $about->name)

@section('content')
<div class="about-page">
  <div class="container">
    <h1 class="text-center">{{ $about->name }}</h1>
    <div style="margin:50px 0;line-height:39px;">
      {!! $about->details !!}
    </div>
  </div>
</div>
@endsection
