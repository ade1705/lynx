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
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary text-white sidebar collapse">
                    <div class="sidebar-sticky pt-3 px-3">
                        <div class="py-2">

                        </div>
                        <div class="mb-3">
                            <a class="btn btn-light btn-lg btn-block" href="/dashboard/services/new">Add New Service</a>
                        </div>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('dashboard') }}">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard-orders') }}">
                                    <span data-feather="file"></span>
                                    Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard-messages') }}">
                                    <span data-feather="users"></span>
                                    Messages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard-services') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard-profile') }}">
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
<script>
    window.userAvatar = "<?php echo \Auth::user()->profile->profile_full_avatar ?>";
</script>
</body>
</html>
