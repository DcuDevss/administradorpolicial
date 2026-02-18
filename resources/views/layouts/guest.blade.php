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
           🎨 CONFIGURACIÓN TEMA DARK GUEST
           ============================================================ */
        body.login-page {
            background-color: var(--bg-principal, #000000) !important;
            color: var(--texto-principal, #ece9e9);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-bg-overlay {
            position: fixed;
            inset: 0;

            background: linear-gradient(135deg,
                    rgba(0, 0, 0, 0.4) 0%,
                    rgba(30, 41, 59, 0.2) 100%),
                url("{{ asset('foto/base.webp') }}") no-repeat center center fixed;
            background-size: cover;
            z-index: -1;
        }

        /* Selector superior ultra compacto */
        .guest-theme-selector {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
            border: 1px solid var(--borde, rgba(255, 255, 255, 0.15));
            border-radius: 9999px;

            padding: 4px 12px;
            display: inline-flex;
            gap: 8px;
            margin-bottom: 2rem;
        }

        .btn-mode-mini {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
        }

        .btn-mode-mini:hover {
            transform: scale(1.2);
            border-color: #ffffff;
            box-shadow: 0 0 10px currentColor;
        }

        /* Tooltip simple para los botones */
        .btn-mode-mini::after {
            content: attr(data-label);
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 8px;
            text-transform: uppercase;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.2s;
            color: #94a3b8;
        }

        .btn-mode-mini:hover::after {
            opacity: 1;
        }

        /* Fix para inputs */
        .login-page input {
            background: rgba(15, 23, 42, 0.8) !important;
            border: 1px solid var(--borde) !important;
            color: #ffffff !important;
        }
    </style>
</head>

<body class="font-sans antialiased login-page">
    <div class="login-bg-overlay"></div>

    {{-- Contenedor principal centrado verticalmente --}}
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center py-6">

        {{-- SELECTOR DE MASCARILLAS MINI: Margen reducido de mb-8 a mb-4 --}}
        <div class="guest-theme-selector animate-fade-in mb-4">
            <button onclick="cambiarMascarilla('dark')" class="btn-mode-mini bg-slate-800" data-label="Dark"
                style="color: #4f9cff;"></button>

            <button onclick="cambiarMascarilla('original')" class="btn-mode-mini bg-blue-800 border-yellow-500"
                data-label="TDF" style="color: #ffd700;"></button>

            <button onclick="cambiarMascarilla('tactical-emerald')" class="btn-mode-mini bg-[#00ff9d]"
                data-label="Tactical" style="color: #00ff9d;"></button>

            <button onclick="cambiarMascarilla('cyber-command')" class="btn-mode-mini bg-[#00f5ff]" data-label="Cyber"
                style="color: #00f5ff;"></button>

            <button onclick="cambiarMascarilla('royal')" class="btn-mode-mini bg-[#e94560]" data-label="Royal"
                style="color: #e94560;"></button>
        </div>

        <main class="w-full {{-- sm:max-w-2xl px-6 --}}">
            {{ $slot }}
        </main>
    </div>

    {{-- Footer --}}
    <div class="mt-10">
        @include('layouts.partials._footer')
    </div>

    @livewireScripts
    @stack('scripts')

    <script>
        function cambiarMascarilla(tema) {
            document.documentElement.setAttribute('data-theme', tema);
            localStorage.setItem('theme', tema);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            document.documentElement.setAttribute('data-theme', savedTheme);
        });
    </script>
</body>

</html>
