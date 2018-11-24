@extends('web.layouts.layout')

@section('title', 'Our Stores page')

@section('content')
<div class="container stores">
  @forelse($stores as $store)
    <p><strong>{{ $store->name }}</strong></p>
    <p>Location : {{ $store->country }} [ {{ $store->city }} ]</p>
    <p>Addrress : {{ $store->address }}</p>
    <p>Phone : {{ $store->phone }}</p>
    <p>Working hours : {{ $store->working_hours }}</p>
  @empty
    <p>Thers is no store until now</p>
  @endforelse
</div>
@endsection
