@extends('admin.layouts.layout')

@section('title', __('lang.banners'))

@include('admin/layouts/datatable')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">{{ __('lang.banners') }}</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">{{ __('lang.dashboard') }}</a></li>
        <li class="active">{{ __('lang.banners') }}</li>
      </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
  <div class="col-12">
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
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
      <div class="white-box">
          <a class="box-title m-b-1 btn btn-info btn-rounded" href="{{ route('banners.create') }}">{{ __('lang.add_new') }}</a>
          <div class="table-responsive">
              <table id="table" class="display nowrap" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>{{ __('lang.title') }}</th>
                          <th>{{ __('lang.position_name') }}</th>
                          <th>{{ __('lang.file') }}</th>
                          <th>{{ __('lang.description') }}</th>
                          <th>{{ __('lang.actions') }}</th>
                      </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>{{ __('lang.title') }}</th>
                        <th>{{ __('lang.position_name') }}</th>
                        <th>{{ __('lang.file') }}</th>
                        <th>{{ __('lang.description') }}</th>
                        <th>{{ __('lang.actions') }}</th>
                      </tr>
                  </tfoot>
                  <tbody>
                    @foreach($banners as $banner)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $banner->title }}</td>
                          <td>{{ $banner->position_name }}</td>
                          <td>
                            @if($banner->position_id == 5)
                              <video src="{{ $banner->file }}" controls style="width:100px;height:100px;"></video>
                            @else
                              <img src="{{ $banner->file }}" alt="{{ $banner->title }}" class="thumb-image">
                            @endif
                          </td>
                          <td>{{ $banner->description }}</td>
                          <td class="text-nowrap">
                              <a href="{{ route('banners.edit', $banner->id) }}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                              <a href="javascript:void(0)" class="delete_confirmation" data-toggle="modal" data-target="#myModal" data-action="{{ route('banners.destroy', $banner->id) }}">
                                 <i class="fa fa-close text-danger"></i>
                               </a>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@include('admin.partials.confirm_modal')
@endsection
