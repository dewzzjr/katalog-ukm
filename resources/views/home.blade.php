@extends('layout') 

@section('title', 'Katalog UKM') 

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
@include('layouts.nav')
@include('layouts.search')
	<div id="main"class="ui container">
	@if($ukm->total() == 0)
		<h1>TIDAK DITEMUKAN</h1>
	@else
		<div class="ui vertical segment centered grid">
		{{ $ukm->links() }}
		</div>
		<div class="ui vertical segment link four stackable doubling cards">
		@if(Request::get('type') != 'product')
		@foreach ($ukm->data as $card)
			@component('layouts.card.ukm', $card)
			@endcomponent
		@endforeach
		@else
		@foreach ($ukm->data as $card)
			@component('layouts.card.product', $card)
			@endcomponent
		@endforeach
		@endif
		</div>
		<div class="ui vertical segment centered grid">
		{{ $ukm->links() }}
		</div>
	@endif
	</div>
@include('layouts.footer')
@endsection 

@push('scripts')
<script>
	$('select').dropdown();

</script>
@endpush