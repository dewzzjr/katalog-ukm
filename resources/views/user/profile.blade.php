@extends('layout') 

@section('title', $data->name) 

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
@include('user.components.header')
@include('user.components.navbar')
    <!-- Tab container -->
    <div id="sticky-menu" class="ui text container borderless">
        @if($errors->any())
        <div class="ui negative message">
            <i class="close icon"></i>
            <div class="header">
                Error!
            </div>
            <ul>
                @foreach( $errors->all() as $error )
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @elseif(isset($success))
        <div class="ui positive message">
            <i class="close icon"></i>
            <div class="header">
                Succes!
            </div>
            <ul>
                <li>{{ $success }}</li>
            </ul>
        </div>
        @endif
        @include('user.components.info')
        @if(Auth::id() == $data->id)
            @include('user.components.setting')
        @endif
    </div>

@include('layouts.footer')
@endsection 

@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/viewerjs/0.10.0/viewer.min.js "></script>
    <script>
    var order = {!! ($data->ukm == null ? 0 : 1) !!};
    $(document)
    .ready(function () {

        // fix secondary menu to page on passing
        $('.secondary.menu').visibility({
            type: 'fixed'
        });
        $('.overlay').visibility({
            type: 'fixed',
            offset: 80
        });

        // create tab
        $('.menu .item')
            .tab({
                onLoad: function(){
                    google.maps.event.trigger(maps[order].map, 'resize');
                    if(order == 1) {
                        maps[order].map.setCenter(maps[order].markers[0].getPosition());
                        maps[order].map.panTo(maps[order].markers[0].getPosition());
                        maps[order].map.setZoom(14);
                    }
                }
            });

        // create menu
        $('.vertical.menu')
            .sticky({
                context: '#sticky-menu',
                offset: 85,
            });
    });
    </script>
@endpush