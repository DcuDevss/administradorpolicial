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