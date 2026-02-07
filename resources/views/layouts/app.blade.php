<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Administrador Policial')</title>

    <link rel="icon" href="{{ asset('foto/favicon.png') }}">

    <script>
        (function() {
            const theme = localStorage.getItem('theme-police') || 'dark';
            if (theme === 'light') document.documentElement.classList.add('light-mode');
        })();
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://unpkg.com/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://unpkg.com/@fullcalendar/timegrid/main.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts


    <style>
        /* ============================================================
           MODO OSCURO – CONFIGURACIÓN DE FONDO (Base Institucional)
           ============================================================ */

        html:not(.light-mode) body {
            position: relative;
            z-index: 0;
        }

        /* Capa fija para la imagen de fondo oscura */
        html:not(.light-mode) body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url('/foto/base.webp');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            z-index: -10;
            pointer-events: none;
            filter: brightness(0.85) contrast(1.05);
        }

        /* ============================================================
           MODO CLARO – CONFIGURACIÓN DE FONDO
           ============================================================ */

        html.light-mode body {
            position: relative;
            z-index: 0;
        }

        /* Capa fija para la imagen de fondo clara */
        html.light-mode body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url('/foto/fondoclaro.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            z-index: -10;
            pointer-events: none;
        }

        /* ESTRUCTURA DE CAPAS: Asegura que el contenido flote sobre el fondo */
        #main-wrapper {
            position: relative;
            z-index: 10;
        }

        html.light-mode main,
        html.light-mode main>div,
        html.light-mode .max-w-7xl,
        html:not(.light-mode) main,
        html:not(.light-mode) main>div,
        html:not(.light-mode) .max-w-7xl {
            position: relative;
            z-index: 20;
        }

        /* ============================================================
           FIX CHAT (Modo Claro): Evita transparencias ilegibles
           ============================================================ */

        html.light-mode .fixed.h-full.flex {
            position: fixed !important;
            z-index: 50 !important;
            background-color: #ffffff !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        html.light-mode .fixed.h-full.flex * {
            z-index: 51 !important;
        }

        /* Elimina el efecto borroso que dificulta la lectura en blanco */
        html.light-mode .fixed,
        html.light-mode .fixed * {
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        /* ============================================================
           TARJETAS Y CONTENEDORES (Modo Claro)
           ============================================================ */

        html.light-mode div.bg-\[\#1e293b\]\/60,
        html.light-mode div.bg-\[\#1e293b\]\/70,
        html.light-mode div.bg-slate-800,
        html.light-mode div.bg-white\/10 {
            background-color: rgba(241, 245, 249, 0.92) !important;
            color: #000000 !important;
            border: 1px solid rgba(15, 23, 42, 0.12) !important;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08) !important;
        }

        /* PROTECCIÓN DE BOTONES: Mantiene el azul institucional legible */
        html.light-mode .bg-blue-600,
        html.light-mode .bg-blue-500,
        html.light-mode button.bg-\[\#1e293b\],
        html.light-mode a.bg-\[\#1e293b\] {
            background-color: #2563eb !important;
            color: #ffffff !important;
            border: none !important;
        }

        /* ============================================================
           FORMULARIOS: Selectores, Inputs y Checkboxes (Modo Claro)
           ============================================================ */

        /* Estilo para los menús desplegables (Selects) */
        html.light-mode select,
        html.light-mode .form-select {
            background-color: #ffffff !important;
            color: #1e293b !important;
            border: 1px solid #cbd5e1 !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e") !important;
            background-position: right 0.5rem center !important;
            background-repeat: no-repeat !important;
            background-size: 1.5em 1.5em !important;
            padding-right: 2.5rem !important;
            appearance: none !important;
            border-radius: 0.375rem !important;
        }

        /* Estilo para campos de texto (Inputs) */
        html.light-mode input[type="text"],
        html.light-mode input[type="email"],
        html.light-mode input[type="password"],
        html.light-mode input[type="number"],
        html.light-mode input[type="search"],
        html.light-mode textarea {
            background-color: #ffffff !important;
            color: #1e293b !important;
            border: 1px solid #cbd5e1 !important;
            background-image: none !important;
            appearance: auto !important;
            border-radius: 0.375rem !important;
        }

        /* Estilo para Checkboxes y Radios */
        html.light-mode input[type="checkbox"],
        html.light-mode input[type="radio"] {
            appearance: checkbox !important;
            -webkit-appearance: checkbox !important;
            background-color: #ffffff !important;
            border: 1px solid #cbd5e1 !important;
            width: 1rem !important;
            height: 1rem !important;
            cursor: pointer !important;
        }

        html.light-mode input[type="checkbox"]:checked {
            background-color: #2563eb !important;
            border-color: #2563eb !important;
        }

        /* ============================================================
           TIPOGRAFÍA: Fix de colores "Fantasma" (Modo Claro)
           ============================================================ */

        html.light-mode h1,
        html.light-mode h5,
        html.light-mode p,
        html.light-mode label {
            color: #000000 !important;
        }

        /* EXCEPCIÓN: Texto sobre fotos oscuras (Cards de comisarías) debe seguir siendo BLANCO */
        html.light-mode .bg-black\/40 h2,
        html.light-mode .bg-black\/40 p,
        html.light-mode .bg-black\/40 h1,
        html.light-mode [class*="bg-black/"] h2,
        html.light-mode [class*="bg-black/"] p,
        html.light-mode div[style*="background-image"] h1,
        html.light-mode div[style*="background-image"] p,
        html.light-mode div[style*="background-image"] span {
            color: #ffffff !important;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8) !important;
            filter: none !important;
        }

        /* FORZADO DE TEXTO BLANCO SOBRE FONDOS NEGROS O ELEMENTOS OSCUROS (Solución a imagen image_294207.png) */
        .bg-black p,
        .bg-black h1,
        .bg-black h2,
        .bg-black span,
        .bg-slate-900 p,
        .bg-slate-900 h1,
        .bg-slate-900 h2 {
            color: #ffffff !important;
        }

        /* Forzado de texto blanco en botones de colores */
        html.light-mode a[class*="bg-blue-"],
        html.light-mode a[class*="bg-red-"],
        html.light-mode a[class*="bg-green-"],
        html.light-mode button *,
        html.light-mode .btn * {
            color: #ffffff !important;
        }

        /* ============================================================
           HEADER Y FOOTER: Optimización de espacios
           ============================================================ */

        html.light-mode header {
            background-color: rgba(241, 245, 249, 0.92) !important;
            color: #000000 !important;
            border-bottom: 1px solid rgba(15, 23, 42, 0.15) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Reducción de altura del Header */
        html.light-mode header .max-w-7xl {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
        }

        html.light-mode footer {
            background-color: #03084769 !important;
            color: #1e293b !important;
            border-top: 1px solid rgba(15, 23, 42, 0.12) !important;
            padding-top: 0.25rem !important;
            padding-bottom: 0.25rem !important;
        }

        /* ============================================================
           BOTÓN FLOTANTE: Switcher de Tema (Sol/Luna)
           ============================================================ */

        #theme-toggle-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            background-color: #1e293b !important;
            padding: 12px 20px;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            color: #ffffff !important;
        }

        html.light-mode #theme-toggle-btn {
            background-color: #ffffff !important;
            border: 2px solid #cbd5e1 !important;
            color: #000000 !important;
        }

        html.light-mode #theme-toggle-btn * {
            color: #000000 !important;
        }

        /* PARCHE ADICIONAL: Asegura que clases de Tailwind grises no se pierdan en el blanco */
        html.light-mode .text-gray-900,
        html.light-mode .text-gray-800,
        html.light-mode .text-gray-700,
        html.light-mode .text-slate-900,
        html.light-mode .text-slate-800,
        html.light-mode .text-slate-700 {
            color: #1e293b !important;
        }

        /* ============================================================
           PLACEHOLDERS: Visibilidad en buscadores
           ============================================================ */

        html.light-mode input::placeholder,
        html.light-mode textarea::placeholder {
            color: #64748b !important;
            opacity: 1 !important;
        }

        /* PLACEHOLDERS: Visibilidad en MODO OSCURO */
        html:not(.light-mode) input::placeholder,
        html:not(.light-mode) textarea::placeholder {
            color: rgba(255, 255, 255, 0.5) !important;
            /* Blanco semitraslúcido */
            opacity: 1 !important;
        }
    </style>
</head>

<body class="antialiased font-sans text-gray-100 bg-[#0f172a]">

    <div id="main-wrapper" class="min-h-screen flex flex-col transition-all duration-300">

        <x-banner />

        @livewire('navigation-menu')

        @if (isset($header))
            <header class="bg-[#1e293b]/70 backdrop-blur-md shadow border-b border-white/10 mt-16 transition-all">
                <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="mt-6 mb-16 px-4 sm:px-6 lg:px-8 flex-grow">
            <div class="max-w-7xl mx-auto">
                <div class="bg-[#1e293b]/60 rounded-xl p-6 shadow-xl border border-white/10 transition-all">
                    {{ $slot }}
                </div>
            </div>
        </main>

        <footer
            class="text-center bg-gray-900/90 dark:bg-black/80 backdrop-blur-md font-medium text-[10px] md:text-xs text-gray-300 left-0 w-full z-20 flex items-center justify-center space-x-3 py-3 border-t border-white/5 transition-all">
            <img src="{{ asset('foto/Escudo comunicaciones 50x50.webp') }}" alt="Escudo"
                class="h-7 w-auto opacity-90 hover:opacity-100 transition-opacity duration-300" loading="lazy"
                decoding="async">

            <p class="m-0 tracking-wider uppercase">
                © {{ date('Y') }} <span class="text-white">Policía de Tierra del Fuego</span>
            </p>
        </footer>
    </div>

    @stack('modals')
    @livewireScripts

    <script defer src="https://unpkg.com/@fullcalendar/core@6.1.20/index.global.min.js"></script>
    <script defer src="https://unpkg.com/@fullcalendar/daygrid@6.1.20/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    @stack('scripts')

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

    <script>
        /* ============================================================
                                                   LÓGICA DE CAMBIO DE TEMA (Dark/Light Mode)
                                                   ============================================================ */
        function toggleTheme() {
            const isLight = document.documentElement.classList.toggle('light-mode');
            localStorage.setItem('theme-police', isLight ? 'light' : 'dark');
            updateThemeUI(isLight);
        }

        // Actualiza los iconos y textos del botón flotante
        function updateThemeUI(isLight) {
            const icon = document.getElementById('theme-icon');
            const text = document.getElementById('theme-text');
            if (isLight) {
                if (icon) icon.innerText = "☀️";
                if (text) text.innerText = "Modo Claro";
            } else {
                if (icon) icon.innerText = "🌙";
                if (text) text.innerText = "Modo Oscuro";
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const isLight = document.documentElement.classList.contains('light-mode');
            updateThemeUI(isLight);
        });

        /* ============================================================
           SISTEMA DE CONFIRMACIÓN GLOBAL (SweetAlert2)
           Intercepta clics en botones de Guardar/Actualizar
           ============================================================ */
        document.addEventListener('click', function(event) {
            const btn = event.target.closest('button, a');
            if (!btn) return;
            if (btn.dataset.confirmed === "true") return;

            const text = (btn.innerText || '').toLowerCase().replace(/[!?.¿¡]/g, '').trim();

            // 1. Ignorar botones de navegación simple
            if (['buscar', 'cerrar', 'volver', 'cancelar'].some(p => text.includes(p))) return;

            // 2. Ignorar eliminar (usualmente tienen su propio modal de confirmación)
            const esEliminar = text.includes('eliminar') || text.includes('borrar') || btn.classList.contains(
                'bg-red-600');
            if (esEliminar) return;

            // 3. Detectar palabras clave de acción para confirmar
            const esAccionPositiva = ['guardar', 'actualizar', 'crear', 'registrar', 'modificar', 'confirmar',
                'asignar'
            ].some(p => text.includes(p));
            if (!esAccionPositiva) return;

            // 4. Solo actuar si es un botón de envío o tiene acción Livewire
            const form = btn.closest('form');
            const esBotonSubmit = btn.type === 'submit' || form || btn.hasAttribute('wire:click');
            if (!esBotonSubmit) return;

            // FRENAR EL CLIC ORIGINAL PARA PREGUNTAR
            event.preventDefault();
            const isLight = document.documentElement.classList.contains('light-mode');

            Swal.fire({
                title: '¿Confirmar operación?',
                text: '¿Deseas procesar los cambios realizados?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Sí, proceder',
                cancelButtonText: 'Cancelar',
                background: isLight ? '#ffffff' : '#1e293b',
                color: isLight ? '#1e293b' : '#ffffff'
            }).then((result) => {
                if (!result.isConfirmed) return;

                // Marcar como confirmado para evitar bucle infinito
                btn.dataset.confirmed = "true";

                // Ejecutar envío según tipo de botón
                const form = btn.closest('form');
                if (form && !form.hasAttribute('wire:submit')) {
                    form.submit();
                } else if (btn.getAttribute('wire:click')) {
                    Livewire.dispatch(btn.getAttribute('wire:click'));
                } else {
                    btn.click(); // Re-disparar el clic
                }
            });

        }, true);
    </script>
</body>

</html>
