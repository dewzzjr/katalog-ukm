<div class="ui fixed inverted menu">
	<div class="ui container">
		<div class="header item">
			<img class="logo" src="favicon.png"> Katalog UKM
		</div>
		<a href="#" class="item active">
			<i class="block layout icon"></i> Home
		</a>
		<div class="ui simple dropdown item">
			Kategori
			<i class="dropdown icon"></i>
			<div class="menu">
				<a class="inverted item" href="{{ route('home') }}?category=makanan"><i class="icon food"></i> Makanan</a>
				<a 
				class="inverted item" 
				href="{{ route('home') }}?category=fashion"><i class="icon pied piper hat">
				</i> Fashion</a>
				<a 
				class="inverted item" 
				href="{{ route('home') }}?category=kerajinan">
				<i class="icon cut"></i> Kerajinan</a>
			</div>
		</div>
		{{--  <div class="right item">  --}}
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
		{{--  </div>  --}}
	</div>
</div>