<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">BoxoPay</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary text-white sidebar collapse">
                    <div class="sidebar-sticky pt-3 px-3">
                        <div class="py-2">

                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user()->type === \App\User::USER_TYPE_PROVIDER)
                        <div class="mb-3">
                            <a class="btn btn-light btn-lg btn-block" href="/dashboard/services/new">Add New Service</a>
                        </div>
                        @endif
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link @if (\Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard') active @endif" href="{{ route('dashboard') }}">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (\Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard-orders') active @endif" href="{{ route('dashboard-orders') }}">
                                    <span data-feather="file"></span>
                                    Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if (\Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard-messages') active @endif" href="{{ route('dashboard-messages') }}">
                                    <span data-feather="users"></span>
                                    Messages
                                </a>
                            </li>
                            @if(\Illuminate\Support\Facades\Auth::user()->type === \App\User::USER_TYPE_PROVIDER)
                            <li class="nav-item">
                                <a class="nav-link @if (\Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard-services') active @endif" href="{{ route('dashboard-services') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    Services
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link @if (\Illuminate\Support\Facades\Route::currentRouteName() === 'dashboard-profile') active @endif" href="{{ route('dashboard-profile') }}">
                                    <span data-feather="layers"></span>
                                    Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="col-md-10 offset-md-1">
                        <div class="py-3">

                        </div>
                        @auth
                            <?php \Auth::user()->load('profile'); ?>
                        @endauth
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </div>
    <style>

        .navbar .navbar-toggler {
            top: .25rem;
            right: 1rem;
        }
    </style>
<script>
    window.userAvatar = "<?php echo \Auth::user()->profile->profile_full_avatar ?>";
</script>
</body>
</html>
