@extends('admin.layouts.layout')

@section('title')
  Edit {{ $brand->title }}
@endsection

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">{{ $brand->title }}</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">{{ __('lang.dashboard') }}</a></li>
        <li><a href="{{ route('brands.index') }}">{{ __('lang.brands') }}</a></li>
        <li class="active">{{ $brand->title }}</li>
      </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-sm-12">
      <div class="white-box">
        <div class="row adminform">
          <h3 class="box-title m-b-0">{{ $brand->title }}</h3>
          <form class="form-full-width" action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            @include('admin/brands/form')
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
