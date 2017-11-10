@extends('layout') 

@section('title', 'UKM - ' . $data->name) 

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/detail.css') }}">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/viewerjs/0.10.0/viewer.min.css">
@endsection

@section('content')
@include('detail.components.header')
@include('detail.components.navbar')
    <!-- Tab container -->
    <div id="sticky-menu" class="ui text container borderless">
        <div class="left ui rail internal">
            <div class="ui inverted labeled icon vertical menu">
                <a class="item"><i class="arrow left icon"></i> Back</a>
                <a class="item"><i class="block layout icon"></i> Menu</a>
                <a class="item"><i class="user icon"></i> Profil</a>
            </div>
        </div>
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