@extends('layouts.app-no-auth')

@section('content')
    <div class="container py-md-5 mt-md-5">
        <div class="row justify-content-center p-md-0 p-3">
            <div class="col-md-4 shadow">
                <div class="p-4">
                    <h1 class="font-weight-bold">Holla, Amigo!</h1>
                    <p>However, this markup can be simplified using a simple CSS class to avoid repetition of SVG attributes between icons:</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                                <input id="email" placeholder="E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">

                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-block">
                                    {{ __('Login') }}
                                </button>

                        </div>
                        <div class="d-flex justify-content-between">
                            @if (Route::has('password.request'))
                                <a class="" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
