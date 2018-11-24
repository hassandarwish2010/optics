@extends('admin.layouts.layout')

@section('title')
  Edit {{ $store->name }}
@endsection

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">{{ $store->name }}</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">{{ __('lang.dashboard') }}</a></li>
        <li><a href="{{ route('stores.index') }}">{{ __('lang.stores') }}</a></li>
        <li class="active">{{ $store->name }}</li>
      </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-sm-12">
      <div class="white-box">
        <div class="row adminform">
          <h3 class="box-title m-b-0">{{ $store->name }}</h3>
          <form class="form-full-width" action="{{ route('stores.update', $store->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            @include('admin/stores/form')
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
