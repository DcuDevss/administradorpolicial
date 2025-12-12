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

    <link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">
    <link href="https://unpkg.com/@fullcalendar/core/main.css" rel="stylesheet">
    <link href="https://unpkg.com/@fullcalendar/daygrid/main.css" rel="stylesheet">
    <link href="https://unpkg.com/@fullcalendar/timegrid/main.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Fondo general */
        body {
            background-image: url('/foto/base.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
        }

        /* Para inputs del login */
        .login-page input,
        .login-page input[type="password"],
        .login-page input[type="email"],
        .login-page input[type="text"] {
            color: #ffffff !important;
        }

        .login-page input::placeholder {
            color: #d1d5db !important;
        }

        /* Estilos de la tarjeta/card */
        .card {
            width: 490px;
            height: 500px;
            background: #07182E;
            position: relative;
            display: flex;
            place-items: center;
            overflow: hidden;
            border-radius: 20px;
        }

        .card h2 {
            z-index: 1;
            color: white;
            font-size: 2em;
        }

        .card p {
            z-index: 1;
            color: white;
            font-size: 1em;
        }

        .card strong {
            z-index: 1;
            color: red;
            font-size: 2em;
        }

        .card::before {
            content: '';
            position: absolute;
            width: 100px;
            height: 130%;
            background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
            height: 130%;
            animation: rotBGimg 3s linear infinite;
            transition: all 0.2s linear;
        }

        @keyframes rotBGimg {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .card::after {
            content: '';
            position: absolute;
            background: #07182E;
            inset: 5px;
            border-radius: 15px;
        }

        /* Animación suave tipo zoom */
        @keyframes zoomBg {
            0% {
                background-size: 100%;
            }

            50% {
                background-size: 110%;
            }

            100% {
                background-size: 100%;
            }
        }

        /* Animación 'pulse' */
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-pulse {
            animation: pulse 1s infinite;
        }
    </style>
</head>

<body class="font-san antialiased bg-gray-800 p-0 mt-16 mb-16">

    <x-banner />

    <div class="min-h-screen">

        @livewire('navigation-menu')

        @if (isset($header))
            <header class="bg-slate-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class=>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    <script src="https://unpkg.com/@fullcalendar/core/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/timegrid/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/interaction/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>

    {{-- <script src="{{ asset('vendor/jetstream/js/jetstream.js') }}"></script> --}}

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    @push('scripts')
        <script>
            // Inicializar DataTable (si usas jQuery/DataTables)
            $(document).ready(function() {
                $('#notificacionesTable').DataTable();
            });
        </script>
    @endpush

    @stack('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tipoEquipoSelect = document.getElementById("tipo_equipo");
            const formularioImpresora = document.getElementById("formulario_impresora");
            const formularioPC = document.getElementById("formulario_pc");

            if (tipoEquipoSelect) {
                tipoEquipoSelect.addEventListener("change", function() {
                    // Ocultar ambos por defecto
                    if (formularioImpresora) formularioImpresora.classList.add("hidden");
                    if (formularioPC) formularioPC.classList.add("hidden");

                    const selectedOption = tipoEquipoSelect.value;
                    if (selectedOption === "1" && formularioImpresora) { // ID de impresora
                        formularioImpresora.classList.remove("hidden");
                    } else if (selectedOption === "2" && formularioPC) { // ID de PC
                        formularioPC.classList.remove("hidden");
                    }
                });
            }
        });
    </script>
</body>

<footer class="text-center py-3 bg-transparent text-xs text-white fixed bottom-0 left-0 w-full shadow-lg">
    <p>@ 2024 Policía de Tierra del Fuego, Antártida e Islas del Atlántico Sur.</p>
</footer>

</html>
