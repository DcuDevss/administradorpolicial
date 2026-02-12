<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Administrador Policial')</title>

    <link rel="icon" href="{{ asset('foto/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        /* Configuración base del cuerpo con degradado institucional */
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            color: #e2e8f0;
        }

        /* Efecto de desenfoque (Glassmorphism) para el encabezado */
        .header-blur {
            backdrop-filter: blur(10px);
            background: rgba(30, 41, 59, 0.5);
        }

        /* Efecto de desenfoque para el pie de página */
        .footer-blur {
            backdrop-filter: blur(5px);
            background: rgba(15, 23, 42, 0.6);
        }

        /* Fuerza el color de texto blanco en todos los inputs para legibilidad */
        input {
            color: #ffffff !important;
        }

        /* Estilo para los textos de sugerencia dentro de los campos */
        input::placeholder {
            color: #94a3b8 !important;
        }
    </style>

    <style>
        /* ============================================================
           🔥 FIX ESPECÍFICO PARA LA PÁGINA DE LOGIN
           ============================================================ */

        /* Asegura que el texto que escribe el usuario sea BLANCO (Corregido de negro) */
        .login-page input,
        .login-page input[type="password"],
        .login-page input[type="email"],
        .login-page input[type="text"] {
            color: #ffffff !important;
        }

        /* Color de placeholder para que destaque sobre el fondo del input */
        .login-page input::placeholder {
            color: #cbd5e1 !important;
        }

        /* Evita que el autocompletado del navegador cambie el color del texto a negro */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #ffffff !important;
            /* Mantiene un fondo oscuro sutil en el autocompletado */
            -webkit-box-shadow: 0 0 0px 1000px rgba(0, 0, 0, 0.3) inset !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Configuración de la imagen de fondo específica para la pantalla de acceso */
        body.login-page {
            background: url("{{ asset('foto/base.webp') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            color: #e2e8f0;
        }

        /* ============================================================
   👤 COMPONENTES DE PERFIL (PROFILE GLASS)
   ============================================================ */

        /* Contenedor de las secciones de Perfil */
        .profile-section-container {
            background-color: rgba(30, 41, 59, 0.4) !important;
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        /* 🔥 Línea divisoria reforzada */
        hr,
        .border-t,
        .border-b {
            border-color: rgba(255, 255, 255, 0.2) !important;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* Ajuste de textos en Profile para que no se pierdan */
        .profile-section-container h3,
        .profile-section-container p {
            color: #e2e8f0 !important;
        }

        /* Modo Claro: Ajuste de la línea para fondo blanco */
        html.light-mode hr,
        html.light-mode .border-t {
            border-color: rgba(0, 0, 0, 0.1) !important;
        }
    </style>
</head>

<body class="font-sans antialiased login-page">

    @auth
        <div class="header-blur fixed top-0 w-full z-50 shadow-lg">
            @livewire('navigation-menu')
        </div>
    @endauth

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

    @include('layouts.partials._footer')

    @livewireScripts
    @stack('scripts')
</body>

</html>
