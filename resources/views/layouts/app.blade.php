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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts


    <style>
        /* ===========================================================
            MODO CLARO PARA LARAVEL (POLICE CLEAN STYLE)
            =========================================================== */

        /* 1. Fondo General y Reseteo */
        html.light-mode body {
            background-color: #f1f5f9 !important;
            background-image: none !important;
            color: #1e293b !important;
        }

        /* 2. Contenedores de Blade (Solo Divs, NO botones) */
        html.light-mode div.bg-\[\#1e293b\]\/60,
        html.light-mode div.bg-\[\#1e293b\]\/70,
        html.light-mode div.bg-slate-800,
        html.light-mode div.bg-white\/10 {
            background-color: #ffffff !important;
            color: #1e293b !important;
            border: 1px solid #e2e8f0 !important;
        }

        /* 2.1 PROTECCIÓN DE BOTONES AZULES */
        html.light-mode .bg-blue-600,
        html.light-mode .bg-blue-500,
        html.light-mode button.bg-\[\#1e293b\],
        html.light-mode a.bg-\[\#1e293b\] {
            background-color: #2563eb !important;
            color: #ffffff !important;
            border: none !important;
        }

        /* 3. FIX DE SELECTORES Y CAMPOS DE TEXTO */
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

        /* 3.1 RESTAURACIÓN DE CHECKBOXES */
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

        /* 4. FIX DE TEXTOS "FANTASMA" (Tipografías generales) */
        /* Todo el texto general de la web será negro en modo claro */
        html.light-mode h1,
        html.light-mode h2,
        html.light-mode h3,
        html.light-mode h4,
        html.light-mode h5,
        html.light-mode p,
        html.light-mode label {
            color: #000000 !important;
        }

        /* 4.1 EXCEPCIÓN PARA IMÁGENES (ÁREAS OPERATIVAS / COMISARÍAS) */
        /* Si el texto está dentro de un div con fondo oscuro (bg-black/40),
   forzamos que sea BLANCO y quitamos cualquier sombra sucia */
        html.light-mode .bg-black\/40 h2,
        html.light-mode .bg-black\/40 p,
        html.light-mode .bg-black\/40 h1,
        html.light-mode [class*="bg-black/"] h2,
        html.light-mode [class*="bg-black/"] p,
        html.light-mode {
            color: #ffffff !important;
            text-shadow: none !important;
            filter: none !important;
        }

        /* 4.2 PROTECCIÓN TEXTO EN BOTONES */
        html.light-mode a[class*="bg-blue-"],
        html.light-mode a[class*="bg-red-"],
        html.light-mode a[class*="bg-green-"],
        html.light-mode button *,
        html.light-mode .btn * {
            color: #ffffff !important;
        }

        /* 5. HEADER Y FOOTER */
        html.light-mode header {
            background-color: #ffffff !important;
            border-bottom: 1px solid #1c71e0 !important;
        }

        html.light-mode footer {
            background-color: #ffffff !important;
            color: #64748b !important;
            border-top: 1px solid #e2e8f0 !important;
        }

        /* 6. BOTÓN TEMA (Corregido) */
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

        /* 7. PARCHE TEXTOS GRISES REBELDES */
        html.light-mode .text-gray-900,
        html.light-mode .text-gray-800,
        html.light-mode .text-gray-700,
        html.light-mode .text-gray-600,
        html.light-mode .text-slate-900,
        html.light-mode .text-slate-800,
        html.light-mode .text-slate-700,
        html.light-mode .text-slate-600 {
            color: #1e293b !important;
        }

        html.light-mode .text-gray-500,
        html.light-mode .text-slate-500 {
            color: #475569 !important;
        }




        /* 8. EXCEPCIÓN PARA TEXTOS SOBRE IMÁGENES O FOTOS OSCURAS */
        /* Esta regla busca textos que estén dentro de contenedores con fondo de imagen */
        html.light-mode .relative h1,
        html.light-mode .relative p,
        html.light-mode .absolute h1,
        html.light-mode .absolute p,
        html.light-mode .relative span,
        html.light-mode .bg-cover h1,
        html.light-mode .bg-cover p {
            color: #ffffff !important;
            /* Mantenemos blanco sobre las fotos */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
            /* Agregamos sombra para legibilidad */

        }



        /* 9. EXCEPCIÓN ESPECÍFICA PARA TUS CARDS DE "ÁREAS OPERATIVAS" */
        /* Si usas una clase específica para esas fotos, agrégala aquí */
        html.light-mode div[style*="background-image"] h1,
        html.light-mode div[style*="background-image"] p,
        html.light-mode div[style*="background-image"] span {
            color: #ffffff !important;
        }

        /* 10. FIX ESPECÍFICO PARA BUSCADORES Y PLACEHOLDERS */
        /* Esto hace que el texto "Buscar usuario..." sea visible en modo claro */
        html.light-mode input::placeholder,
        html.light-mode textarea::placeholder {
            color: #64748b !important;
            /* Un gris azulado oscuro legible */
            opacity: 1 !important;
        }

        /* Si el input tiene un ID o clase específica como buscador */
        html.light-mode input[type="search"],
        html.light-mode input[type="text"] {
            color: #1e293b !important;
            /* Texto que escribes en negro/azul oscuro */
            background-color: #ffffff !important;
        }

        /* FIX PARA BUSCADOR Y TEXTOS GRISES */
        html.light-mode .text-gray-900,
        html.light-mode .text-gray-800,
        html.light-mode .text-gray-700,
        html.light-mode .text-slate-900,
        html.light-mode .text-slate-800,
        html.light-mode .text-slate-700 {
            color: #0f172a !important;
            /* Negro azulado para textos principales */
        }

        html.light-mode .text-gray-600,
        html.light-mode .text-gray-500,
        html.light-mode .text-slate-600,
        html.light-mode .text-slate-500 {
            color: #475569 !important;
            /* Gris intermedio para nombres en buscadores o placeholders */
        }

        /* REGLA DE ORO PARA EL BUSCADOR (Específica) */
        html.light-mode input[type="text"],
        html.light-mode input[type="search"] {
            color: #000000 !important;
            /* Lo que escribes debe ser negro puro */
        }

        html.light-mode input::placeholder {
            color: #64748b !important;
            /* El texto "Buscar..." ahora será visible */
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
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
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
            class="text-center footer-tight bg-gray-800 font-semibold text-xs text-white left-0 w-full shadow-lg z-20 flex items-center justify-center space-x-2 py-3 transition-all">
            <img src="{{ asset('foto/Escudo comunicaciones 50x50.png') }}" alt="Escudo" class="h-8 w-auto">
            <p class="m-0">© 2024 Policía de Tierra del Fuego.</p>
        </footer>
    </div>

   {{--  <button onclick="toggleTheme()" id="theme-toggle-btn">
        <span id="theme-icon">🌙</span> <span id="theme-text">Modo Oscuro</span>
    </button> --}}

    @stack('modals')
    @livewireScripts

    <script src="https://unpkg.com/@fullcalendar/core/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid/main.js"></script>
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
        // Tus funciones de toggleTheme y updateThemeUI...
        function toggleTheme() {
            const isLight = document.documentElement.classList.toggle('light-mode');
            localStorage.setItem('theme-police', isLight ? 'light' : 'dark');
            updateThemeUI(isLight);
        }

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
    </script>

    {{-- Nuevo --}}

    <script>
        document.addEventListener('click', function(event) {

            const btn = event.target.closest('button, a');
            if (!btn) return;

            if (btn.dataset.confirmed === "true") return;

            const text = (btn.innerText || '')
                .toLowerCase()
                .replace(/[!?.¿¡]/g, '')
                .trim();

            // ❌ Ignorar acciones comunes
            if (['buscar', 'cerrar', 'volver', 'cancelar'].some(p => text.includes(p))) return;

            // 🔴 Eliminar → NO manejamos acá
            const esEliminar =
                text.includes('eliminar') ||
                text.includes('borrar') ||
                btn.classList.contains('bg-red-600');

            if (esEliminar) return;

            // 🟢 Acciones positivas
            const esAccionPositiva = [
                'guardar', 'actualizar', 'crear', 'registrar',
                'modificar', 'confirmar', 'asignar'
            ].some(p => text.includes(p));

            if (!esAccionPositiva) return;

            // 🔹 Solo preguntar si el botón realmente va a guardar o enviar datos
            const form = btn.closest('form');
            const esBotonSubmit = btn.type === 'submit' || form || btn.hasAttribute('wire:click');
            if (!esBotonSubmit) return;


            // ⛔ Frenamos SOLO UNA VEZ
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

                // 🔐 Marcamos confirmado
                btn.dataset.confirmed = "true";

                // ✅ FORM NORMAL
                const form = btn.closest('form');
                if (form && !form.hasAttribute('wire:submit')) {
                    form.submit();
                    return;
                }

                // ✅ LIVEWIRE
                const wireClick = btn.getAttribute('wire:click');
                if (wireClick) {
                    Livewire.dispatch(wireClick);
                }
            });

        }, true);
    </script>







</body>

</html>
