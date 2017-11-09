<div class="ui fixed inverted menu">
	<div class="ui container">
		<a href="#" class="header item">
			<img class="logo" src="favicon.png"> Katalog UKM
		</a>
		<a href="#" class="item">Home</a>
		<div class="ui simple dropdown item">
			Dropdown
			<i class="dropdown icon"></i>
			<div class="menu">
				<a class="item" href="#">Link Item</a>
				<a class="item" href="#">Link Item</a>
				<div class="divider"></div>
				<div class="header">Header Item</div>
				<div class="item">
					<i class="dropdown icon"></i> Sub Menu
					<div class="menu">
						<a class="item" href="#">Link Item</a>
						<a class="item" href="#">Link Item</a>
					</div>
				</div>
				<a class="item" href="#">Link Item</a>
			</div>
		</div>
		<div class="right item">
		@guest
			<a class="ui inverted button" href="{{ route('login') }}">Login</a>
		@else
			<a class="ui link item" href="{{ route('user') }}">{{ Auth::user()->name }}</a>
			<a class="ui inverted button" href="{{ route('logout') }}"
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
</div>