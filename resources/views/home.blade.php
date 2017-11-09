@extends('layout') 

@section('title', 'Katalog UKM') 

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
@include('layouts.nav')
@include('layouts.search')
<div id="main" class="ui vertical stripe segment">
	<div class="ui container">
		<div class="ui link four stackable doubling cards">
		@foreach ($data as $card)
			@component('layouts.card', $card)
			@endcomponent
		@endforeach
		</div>
	</div>
</div>
@include('layouts.footer')
@endsection 

@push('scripts')
<script>
	$('select').dropdown();

</script>
@endpush