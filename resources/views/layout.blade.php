<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>@yield('title')</title>

	<!-- Semantic CSS -->
	<link rel="icon" href="{{ url('icon.png') }}" title="Katalog UKM">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css" />
	@yield('style')
	

</head>

<body>
	@yield('content')

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
	@stack('scripts')

</body>

</html>