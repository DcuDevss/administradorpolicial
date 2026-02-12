<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="original">

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
        /* ============================================================
           🎨 PALETA INSTITUCIONAL ADAPTADA
           ============================================================ */
        html[data-theme="original"] {
            --bg-principal: #00385b;
            /* Azul institucional */
            --bg-card: rgba(0, 56, 91, 0.85);
            /* Azul institucional semitransparente */
            --bg-tabla-header: #002a45;
            /* Azul oscuro para headers */
            --color-acento: #92d050;
            /* Verde institucional */
            --texto-principal: #ffffff;
            --texto-secundario: #ffd700;
            /* Dorado del escudo */
            --borde: rgba(146, 208, 80, 0.3);
            /* Borde verde institucional */
        }

        /* Configuración base del cuerpo con el degradado institucional solicitado */
        body {
            background: linear-gradient(135deg, #00385b 0%, #002a45 100%);
            min-height: 100vh;
            color: var(--texto-principal);
        }

        /* Efecto de desenfoque (Glassmorphism) con el azul de la identidad */
        .header-blur {
            backdrop-filter: blur(10px);
            background: rgba(0, 42, 69, 0.7);
            /* Basado en --bg-tabla-header */
            border-bottom: 1px solid var(--borde);
        }

        /* Efecto de desenfoque para el pie de página */
        .footer-blur {
            backdrop-filter: blur(5px);
            background: rgba(0, 56, 91, 0.9);
            /* Basado en --bg-principal */
            border-top: 1px solid var(--borde);
        }

        /* Fuerza el color de texto blanco en todos los inputs para legibilidad */
        input {
            color: #ffffff !important;
        }

        /* Estilo para los textos de sugerencia usando el dorado institucional suave */
        input::placeholder {
            color: rgba(255, 215, 0, 0.5) !important;
        }
    </style>

    <style>
        /* ============================================================
            🔥 FIX ESPECÍFICO PARA LA PÁGINA DE LOGIN
           ============================================================ */

        /* Asegura que el texto que escribe el usuario sea BLANCO */
        .login-page input,
        .login-page input[type="password"],
        .login-page input[type="email"],
        .login-page input[type="text"] {
            color: #ffffff !important;
            background-color: rgba(0, 42, 69, 0.5) !important;
            border: 1px solid var(--borde) !important;
        }

        /* Color de placeholder ajustado al tono institucional */
        .login-page input::placeholder {
            color: #cbd5e1 !important;
        }

        /* Evita que el autocompletado cambie el color del texto */
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-text-fill-color: #ffffff !important;
            -webkit-box-shadow: 0 0 0px 1000px var(--bg-principal) inset !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        /* Configuración de la imagen de fondo con el overlay institucional degradado */
        body.login-page {
            background: linear-gradient(135deg, rgba(0, 56, 91, 0.85), rgba(146, 208, 80, 0.3)),
                url("{{ asset('foto/base.webp') }}") no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
        }

        /* ============================================================
           👤 COMPONENTES DE PERFIL (PROFILE GLASS) ADAPTADOS
           ============================================================ */

        .profile-section-container {
            background-color: var(--bg-card) !important;
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 1px solid var(--borde) !important;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        /* 🔥 Línea divisoria con el verde institucional */
        hr,
        .border-t,
        .border-b {
            border-color: var(--borde) !important;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .profile-section-container h3 {
            color: var(--texto-secundario) !important;
            /* Títulos en Dorado */
        }

        .profile-section-container p {
            color: var(--texto-principal) !important;
        }

        /* Modo Claro: Ajuste de la línea */
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
                    {{-- El texto del header ahora usa el dorado para resaltar --}}
                    <div class="text-2xl font-bold text-[var(--texto-secundario)]">
                        {{ $header }}
                    </div>
                </div>
            </header>
        @endisset

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>

    {{-- Se asume que el partial del footer ya usa internamente clases de fondo compatibles --}}
    @include('layouts.partials._footer')

    @livewireScripts
    @stack('scripts')
</body>

</html>
