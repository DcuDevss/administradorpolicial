<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Administrador Policial')</title>

    <!-- Icono -->
    <link rel="icon" href="{{ asset('foto/favicon.png') }}">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Estilos y scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <!-- Estilo de layout -->
    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            color: #e2e8f0;
        }

        .header-blur {
            backdrop-filter: blur(10px);
            background: rgba(30, 41, 59, 0.5);
        }

        .footer-blur {
            backdrop-filter: blur(5px);
            background: rgba(15, 23, 42, 0.6);
        }

        /* 🔥 Fix para inputs del login (incluye password) */
        input {
            color: #f1f5f9 !important;

        }

        input::placeholder {
            color: #94a3b8 !important;
            /* placeholder gris medio */
        }
    </style>

    <style>
        /* Color visible para inputs en pantallas de login */
        .login-page input,
        .login-page input[type="password"],
        .login-page input[type="email"],
        .login-page input[type="text"] {
            color: #090505 !important;
            /* blanco */
        }

        .login-page input::placeholder {
            color: #cbd5e1 !important;
            /* gris clarito visible */
        }

        /* 🔥 Fondo del Login */
        body.login-page {
            background: url("{{ asset('foto/base.png') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            color: #e2e8f0;
        }
    </style>






</head>

<body class="font-sans antialiased login-page">


    <!-- Barra de navegación -->
    @auth
        <div class="header-blur fixed top-0 w-full z-50 shadow-lg">
            @livewire('navigation-menu')
        </div>
    @endauth

    <!-- Contenido principal -->
    <div class="@auth pt-20 pb-20 @else pt-10 pb-10 @endauth">
        @isset($header)
            <header class="header-blur shadow-md mb-6">
                <div class="max-w-7xl mx-auto py-6 px-6">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>

    <!-- Footer institucional -->
    <footer
        class="text-center footer-tight bg-gray-800 font-semibold text-xs text-white fixed bottom-0 left-0 w-full shadow-lg z-20 flex items-center justify-center space-x-2">
        <img src="{{ asset('foto/Escudo comunicaciones 50x50.png') }}" alt="Escudo Comunicaciones" class="h-8 w-auto">
        <p class="m-0">© 2024 Policía de Tierra del Fuego, Antártida e Islas del Atlántico Sur.</p>
    </footer>

    @livewireScripts
    @stack('scripts')
</body>

</html>
