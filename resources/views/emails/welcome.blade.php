<h1>Selamat Datang, {{ $user->name }}</h1>
<h2>di Katalog UKM</h2>

<p>Silahkan klik link dibawah ini untuk melakukan reset password</p>
<a href="{{ url('password/reset', $token) }}">{{ $token }}</a>