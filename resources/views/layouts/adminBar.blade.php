<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TOMOK TOUR AJIBATA') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

{{-- SideBar Content --}}
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">MENU ADMIN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-transparent">
                <a class="nav-link active" aria-current="page" href="{{route('tambah_pemilik_kapal')}}">
                    <i class="bi bi-person-plus"></i> Tambah Akun Pemilik Kapal
                </a>
            </li>
            <li class="list-group-item bg-transparent">
                <a class="nav-link active" aria-current="page" href="{{route('index_pemilik_kapal')}}">
                    <i class="bi bi-person-lines-fill"></i> Pemilik Kapal
                </a>
            </li>
            <li class="list-group-item bg-transparent">
                <a class="nav-link" href="{{route('index_supir')}}">
                    <i class="bi bi-people-fill"></i> Nahkoda
                </a>
            </li>
            <li class="list-group-item bg-transparent">
                <a class="nav-link" href="{{route('index_muatan')}}">
                    <i class="bi bi-box-seam"></i> Muatan
                </a>
            </li>
            <li class="list-group-item bg-transparent">
                <a class="nav-link" href="{{route('index_rute')}}">
                    <i class="bi bi-geo-alt-fill"></i> Rute
                </a>
            </li>
            <li class="list-group-item bg-transparent">
                <a class="nav-link" href="{{route('index_jadwal')}}">
                    <i class="bi bi-calendar2-week-fill"></i> Jadwal
                </a>
            </li>
            <li class="list-group-item bg-transparent">
                <a class="nav-link" href="/home">
                    <i class="bi bi-calendar2-week-fill"></i> Home
                </a>
            </li>
        </ul>
    </div>
</div>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Menu</button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    {{-- ADMIN NAV --}}
                    @if(Auth::check() && Auth::user()->role_id == 2)

                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav me-auto">

                        <li>
                            <a class="navbar-brand" href="{{ url('/') }}">
                                {{ config('app.name', 'TOMOK-AJIBATA TRIP') }}
                            </a>
                        </li>

                    </ul>

                    @endif
                    {{-- SHIP_OWNER NAV
                    @if(Auth::check() && Auth::user()->role_id == 3)
                    <ul class="navbar-nav me-auto"></ul>
                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_kapal')}}">Kapal</a></li>
                    </ul>
                    @endif --}}


                    {{-- PENUMPANG NAV --}}
                    @if(Auth::check() && Auth::user()->role_id == 1)
                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_jadwal_penumpang')}}">Pesan Jadwal</a></li>
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('pesanan_jadwal')}}">Pesanan Saya</a></li>
                    </ul>

                    @endif


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>