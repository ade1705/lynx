@extends('layouts.app-no-auth')

@section('content')
<div class="container py-md-5 mt-md-5">
    <div class="row justify-content-center  p-md-0 p-3">
        <div class="col-md-4 shadow">
            <div class="p-4">
                <h1 class="font-weight-bold">Holla, Amigo!</h1>
                <p>However, this markup can be simplified using a simple CSS class to avoid repetition of SVG attributes between icons:</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>

                    <div class="form-group">

                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        <input type="hidden" value="provider" name="type" />
                    </div>

                    <div>
                            <button type="submit" class="btn btn-danger btn-block">
                                {{ __('Register') }}
                            </button>
                    </div>
                    <div class="text-center">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Already a member? Login') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
