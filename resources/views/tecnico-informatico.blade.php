<x-app-layout>

    <style>
        /* Fondo general */
        body {
            background-image: url('{{ asset('foto/base.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>

    <h1 class="text-center text-xl font-bold text-white mb-4 mt-4">Técnico Informática</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">

        {{-- Configuración de tarjetas --}}
        @php
            $cards = [
                [
                    'img' => 'patrullero.jpg',
                    'title' => 'Areas operativas Informática',
                    'route' => 'createInventarioGeneral',
                ],
                [
                    'img' => 'investigaciones.jpeg',
                    'title' => 'Investigaciones',
                    'route' => 'createInvestigacionesGeneral',
                ],
                ['img' => 'administracion.jpeg', 'title' => 'Administración', 'route' => 'createAdministracionGeneral'],
                ['img' => 'jefatura.jpeg', 'title' => 'Jefatura', 'route' => 'createJefaturaGeneral'],
                ['img' => 'recursos.jpeg', 'title' => 'Recursos Humanos', 'route' => 'createRecursosGeneral'],
                ['img' => 'Comisariatolhuin.jpg', 'title' => 'Tolhuin', 'route' => 'createTolhuinGeneral'],
                ['img' => 'polrg.jpeg', 'title' => 'D.C.R.G', 'route' => 'createRiograndeGeneral'],
                ['img' => 'notificacion4.png', 'title' => 'Notificaciones de trabajo', 'route' => 'ver-notificaciones'],
                ['img' => 'estadistica.jpg', 'title' => 'Estadísticas', 'route' => 'estadistica'],
                ['img' => 'reparador.jpg', 'title' => 'Trabajos Generales', 'route' => 'createTrabajosInformatica'],
                [
                    'img' => 'imagen-inventario.jpeg',
                    'title' => 'Inventario General 2',
                    'route' => 'TotalInventarioInformatica',
                ],
                [
                    'img' => 'imagen-inventario.jpeg',
                    'title' => 'Inventario General 2',
                    'route' => 'TotalInventarioInformatica',
                ],
            ];
        @endphp

        {{-- Render dinámico de tarjetas --}}
        @foreach ($cards as $card)
            <div
                class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">

                <img src="{{ asset('foto/' . $card['img']) }}"
                    class="w-full h-40 object-cover group-hover:scale-110 transition-transform duration-500">

                <a href="{{ route($card['route']) }}"
                    class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all flex items-center justify-center">

                    <h2 class="text-white text-lg font-extrabold tracking-wide drop-shadow-lg text-center px-2">
                        {{ $card['title'] }}
                    </h2>
                </a>
            </div>
        @endforeach

    </div>

    {{-- TODO TU CÓDIGO COMENTADO QUEDA COMO ESTABA --}}

</x-app-layout>
