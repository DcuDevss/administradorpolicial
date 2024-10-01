<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<div class="min-h-screen bg-slate-800 ">
    @livewire('navigation-menu')



    <!-- Page Heading shadow  -->
    @if (isset($header))
        <header class="bg-slate-800 ">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Administrador Policial')</title>

    <!-- Fonts -->
    {{-- Icono de  la pagina --}}
    <link rel="icon" href="{{ asset('foto/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Styles -->
    @livewireStyles
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">
    <link href="https://unpkg.com/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://unpkg.com/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://unpkg.com/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




    <style>
        /* Efecto de transición al pasar el mouse por encima */
        /* .h-32 a:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }*/


        .card {
            width: 490px;
            height: 500px;
            background: #07182E;
            position: relative;
            display: flex;
            // place-content: center;
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
            ;
            inset: 5px;
            border-radius: 15px;
        }


        /* .card:hover:before {
  background-image: linear-gradient(180deg, rgb(81, 255, 0), purple);
  animation: rotBGimg 3.5s linear infinite;
} */
    </style>

    <style>
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



    @stack('modals')

    @livewireScripts
    <script src="https://unpkg.com/@fullcalendar/core/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/daygrid/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/timegrid/main.js"></script>
    <script src="https://unpkg.com/@fullcalendar/interaction/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script> <!-- Agregamos Alpine.js -->



    <script src="{{ asset('vendor/jetstream/js/jetstream.js') }}"></script>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    @push('scripts')
        <script>
            // Inicializar DataTable
            $(document).ready(function() {
                $('#notificacionesTable').DataTable();
            });
        </script>
    @endpush

    @stack('scripts')


    {{-- @push('scripts')
    <script>
        $(document).ready(function () {
            $('.select2-autocomplete').select2({
                tags: true,
                createTag: function(params) {
                    return {
                        id: params.term,
                        text: params.term,
                        newOption: true
                    };
                }
            });
        });
    </script>
    @endpush --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tipoEquipoSelect = document.getElementById("tipo_equipo");
            const formularioImpresora = document.getElementById("formulario_impresora");
            const formularioPC = document.getElementById("formulario_pc");

            tipoEquipoSelect.addEventListener("change", function() {
                formularioImpresora.classList.add("hidden");
                formularioPC.classList.add("hidden");

                const selectedOption = tipoEquipoSelect.value;
                if (selectedOption === "1") { // ID de impresora
                    formularioImpresora.classList.remove("hidden");
                    formularioPC.classList.add("hidden");
                } else if (selectedOption === "2") { // ID de PC
                    formularioPC.classList.remove("hidden");
                    formularioImpresora.classList.add("hidden");
                }
            });
        });
    </script>
</body>

<footer
    class="text-center  py-6 bg-transparent font-semibold text-xs text-white shadow-lg m-0 p-0 fixed bottom-0 left-0 w-full ">
    <p class="text-xs">@ 2024 Policía de Tierra del Fuego, Antártida e Islas del Atlántico Sur.</p>
</footer>

</html>
