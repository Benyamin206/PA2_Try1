<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    {{-- ADMIN NAV --}}
                    @if(Auth::check() && Auth::user()->role_id == 2)

                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav me-auto">
                       
                        <li><a href="{{route('tambah_pemilik_kapal')}}">tambah akun pemilik kapal</a></li>
                        
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_supir')}}">Nahkoda</a></li> 
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_muatan')}}">Muatan</a></li>                          
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_rute')}}">Rute</a></li>
                    </ul>

                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_jadwal')}}">Jadwal</a></li>
                    </ul>
                    
                    {{-- SHIP_OWNER NAV --}}
                    @elseif(Auth::check() && Auth::user()->role_id == 3)
                    <ul class="navbar-nav me-auto"></ul>
                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_kapal')}}">Kapal</a></li> 
                    </ul>
                    @endif
                    

                    {{-- PENUMPANG NAV --}}
                    @if(Auth::check() && Auth::user()->role_id == 1)                                        
                    <ul class="navbar-nav me-auto">
                        <li><a href="{{route('index_jadwal_penumpang')}}">Pesan Jadwal</a></li>
                    </ul>

                    {{-- <ul class="navbar-nav me-auto">
                        <li><a href="{{route('pesanan_jadwal')}}">Pesanan Jadwal</a></li>
                    </ul> --}}

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Pemesanan Jadwal
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('pesanan_jadwal_paid')}}">Sudah Bayar</a></li>
                              <li><a class="dropdown-item" href="#">Belum Bayar</a></li>

                            </ul>
                          </li>
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
