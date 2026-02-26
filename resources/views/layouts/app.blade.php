<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LaraKeep') }}</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:400,500,600&display=swap" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    LaraKeep
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow">
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        Configurações
                                    </a>
                                    <div class="dropdown-divider" style="border-top-color: var(--keep-border);"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sair
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

        <main>
            {{ $slot }}
        </main>

        <footer class="mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="footer-text">
                        💡 <span class="fw-bold text-white ms-1">LaraKeep</span>
                        <span class="footer-dot d-none d-md-inline">|</span>
                        <span class="d-block d-md-inline mt-2 mt-md-0">Organize suas ideias com simplicidade.</span>
                    </div>

                    <div class="mt-3 mt-md-0">
                        <a href="#" class="footer-link small">Sobre</a>
                        <a href="#" class="footer-link small ms-3">Privacidade</a>
                        <a href="https://keep.google.com" target="_blank" class="footer-link small ms-3">Google Keep</a>
                    </div>
                </div>
            </div>
        </footer>

        @if(session()->has('success') || session()->has('status'))
            <div class="keep-snackbar" id="global-alert">
                <span>{{ session('success') ?? session('status') }}</span>
                <button type="button" class="snackbar-close" onclick="this.parentElement.remove()">
                    FECHAR
                </button>
            </div>
        @endif

        <script src="{{ asset('js/global-alert.js') }}"></script>
    </div>

    @livewireScripts
</body>

</html>