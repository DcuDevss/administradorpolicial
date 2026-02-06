<x-app-layout>

    {{-- TÍTULO --}}
    <h1 class="text-center text-xl font-bold text-white mb-4 mt-4 uppercase tracking-widest">
        Técnico Informática
    </h1>

    {{-- GRID DE CARDS UTILIZANDO LA CLASE CONTENEDORA --}}
    <div class="contenedor-cards">

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

                // --- SECCIONES DE INVENTARIO GENERAL ---
                [
                    'img' => 'banderatdf.jpg',
                    'title' => 'Inventario general Provincial',
                    'route' => 'TotalInventarioProvincia',
                ],
                [
                    'img' => 'ushuaiafoto.jpg',
                    'title' => 'Inventario general Ushuaia',
                    'route' => 'TotalInventarioInformatica',
                ],
                [
                    'img' => 'rgfoto.jpg',
                    'title' => 'Inventario general Río Grande',
                    'route' => 'TotalInventarioInformaticaRioGrande',
                ],
                [
                    'img' => 'tolhuinfoto.jpg',
                    'title' => 'Inventario general Tolhuin',
                    'route' => 'TotalInventarioInformaticaTolhuin',
                ],
            ];
        @endphp

        {{-- Render dinámico de tarjetas --}}
        @foreach ($cards as $card)
            <div class="card-profesional">

                <img src="{{ asset('foto/' . $card['img']) }}" alt="{{ $card['title'] }}" loading="lazy">

                <a href="{{ route($card['route']) }}" class="card-overlay">
                    <h2 class="card-titulo">
                        {{ $card['title'] }}
                    </h2>
                </a>

            </div>
        @endforeach

    </div>

</x-app-layout>
