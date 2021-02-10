@extends('admin.admin_layouts')

@section('admin_content')
<div class="box-login">
    <div id="header-login">
        <div id="cont-lock"><img src="{{ asset('public/assets/dist/img/logo/muda advertiing.png') }}"
                class="muda-login"></div>
        <div id="bottom-head">
            <h1 id="logintoregister">Login For Admin</h1>
        </div>
    </div>
    <form action="{{route('admin.login')}}" class="d-block" method="post">
      @csrf
        <div class="group-login">
            <input id="email" type="email" class="inputMaterial @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required />
            <!-- <input class="inputMaterial" type="text" required> -->
            <span class="highlight"></span>
            <span class="bar-login"></span>
            <label class="label-login">Email</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="group-login">
            <input id="password" type="password" class="inputMaterial @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" />
            <!-- <input class="inputMaterial" type="password" required> -->
            <span class="highlight"></span>
            <span class="bar-login"></span>
            <label class="label-login">Password</label>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button id="buttonlogintoregister" type="submit">Login</button>
    </form>
    <div id="footer-box-login">
        <p class="footer-text-login"><a href="{{ route('admin.password.request') }}" class="text-white">I forgot my
                password</a></p>
    </div>
</div>

@endsection
