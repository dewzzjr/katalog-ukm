@extends('layout')
@section('title', 'Katalog UKM - Login')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection
@push('scripts')
	<script src="{{ asset('js/login.js') }}"></script>
@endpush
@section('content')
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui red image header">
      <img src="{{ asset('icon.png') }}" class="image">
      <div class="content">
        Login ke Akun
      </div>
    </h2>
    <form class="ui large form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="Alamat E-mail">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="ui fluid large red submit button">Login</div>
      </div>

      <div class="ui error message">
        @if ($errors->has('email') OR $errors->has('password'))
            <li>{{ $errors->first('email') }}</li>
            <li>{{ $errors->first('password') }}</li>
        @endif
      </div>

    </form>

    <div class="ui message">
      Hubungi kami untuk mendapatkan akses Akun 
      <br />
      <a href="#">Kontak Kami</a>
    </div>
    <div class="ui message">
      Lupa Password <a href="{{ route('password.request') }}">Klik di sini</a>
    </div>
  </div>
</div>
@endsection
