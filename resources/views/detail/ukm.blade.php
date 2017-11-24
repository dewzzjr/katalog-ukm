@extends('layout') 

@section('title', 'UKM - ' . $data->name) 

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/detail.css') }}">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/viewerjs/0.10.0/viewer.min.css">
@endsection
  <div class="ui fixed inverted menu">
    <div class="ui container">
		<a href="{{ URL::previous() }}" class="header item">
			<img class="logo" src="/favicon.png"> 
            <i class="arrow left icon"></i> Back
		</a>
        <a href="{{ route('home') }}" class="item">
            <i class="block layout icon"></i> Home
        </a>
		@guest
			<a class="ui right item inverted button" href="{{ route('login') }}">Login</a>
		@else
			<a class="ui right link item" href="{{ route('user') }}">
				<i class="user icon"></i> {{ Auth::user()->name }}
			</a>
			<a class="ui item inverted button" href="{{ route('logout') }}"
				onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
				Logout
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		@endguest
    </div>
  </div>

@section('content')
@include('detail.components.header')
@include('detail.components.navbar')
    <!-- Tab container -->
    <div id="sticky-menu" class="ui text container borderless">
        @include('detail.components.gallery')
        @include('detail.components.product')
        @include('detail.components.contact')
    </div>

@include('layouts.footer')
@endsection 

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/viewerjs/0.10.0/viewer.min.js "></script>
    <script src="{{ asset('js/detail.js') }}"></script>
@endpush