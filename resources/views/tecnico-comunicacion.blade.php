<x-app-layout>

    {{-- TÍTULO --}}
    <div class="text-center text-xl font-bold text-white mb-4 mt-4 uppercase tracking-widest">
        <h1>Técnico Comunicaciones</h1>
    </div>

    {{-- GRID DE CARDS USANDO LA CLASE PERSONALIZADA --}}
    <div class="contenedor-cards">

        @php
            $cards = [
                ['img' => 'trabajogeneral.jpg', 'title' => 'Trabajos Generales', 'route' => 'createTrabajoGeneral'],
                ['img' => 'poliUsh.jpg', 'title' => 'Dependencias Ushuaia', 'route' => 'createComunicacionesUshuaia'],
                ['img' => 'jefatura.jpg', 'title' => 'Jefatura', 'route' => 'createComunicacionesJefatura'],
                ['img' => 'primera.jpg', 'title' => 'Comisaria Primera', 'route' => 'createComunicaciones1'],
                ['img' => 'segunda.jpg', 'title' => 'Comisaria Segunda', 'route' => 'createComunicaciones2'],
                ['img' => 'tercera.jpg', 'title' => 'Comisaria Tercera', 'route' => 'createComunicaciones3'],
                ['img' => 'cuarta.jpg', 'title' => 'Comisaria Cuarta', 'route' => 'createComunicaciones4'],
                ['img' => 'quinta1.jpg', 'title' => 'Comisaria Quinta', 'route' => 'createComunicaciones5'],
                ['img' => 'famila1.jpeg', 'title' => 'Comisaria GyFU N°1', 'route' => 'createComunicacionesFamilia1'],
                ['img' => 'genero2.jpg', 'title' => 'Comisaria GyFU N°2', 'route' => 'createComunicacionesFamilia2'],
                [
                    'img' => 'investigaciones.jpeg',
                    'title' => 'Investigaciones',
                    'route' => 'createComunicacionesInvestigacion',
                ],
                ['img' => 'recursos.jpeg', 'title' => 'Recursos Humanos', 'route' => 'createComunicacionesRecurso'],
                [
                    'img' => 'administracion.jpeg',
                    'title' => 'Administración',
                    'route' => 'createComunicacionesAdministracion',
                ],
                ['img' => 'narco.jpg', 'title' => 'Brigada Narcocriminalidad', 'route' => 'createComunicacionesNarco'],
                [
                    'img' => 'complejos.webp',
                    'title' => 'Brigada Delitos Complejos',
                    'route' => 'createComunicacionesComplejo',
                ],
                ['img' => 'auto.jpg', 'title' => 'Automotores', 'route' => 'createComunicacionesAutomotore'],
                ['img' => '365.jpg', 'title' => 'Destacamento 365', 'route' => 'createComunicacionesDto365'],
                [
                    'img' => 'cientifica.JPG',
                    'title' => 'Policía Científica',
                    'route' => 'createComunicacionesCientifica',
                ],
                ['img' => 'deseu.webp', 'title' => 'Servicios Especiales', 'route' => 'createComunicacionesDseu'],
                [
                    'img' => 'custodiagobierno.jpg',
                    'title' => 'Custodia Gubernamental',
                    'route' => 'createComunicacionesCustodia',
                ],
                ['img' => 'Comisariatolhuin.jpg', 'title' => 'Tolhuin', 'route' => 'createComunicacionesTolhuin'],
                ['img' => 'botondcu.jpg', 'title' => 'D.C.U', 'route' => 'createComunicacionesDcu'],
                ['img' => 'polrg.jpeg', 'title' => 'D.C.R.G', 'route' => 'createComunicacionesRiogrande'],
                ['img' => 'ht.jpg', 'title' => 'Inventario General Ushuaia', 'route' => 'TotalEquiposComunicacion'],
            ];
        @endphp

        @foreach ($cards as $c)
            <div class="card-profesional">

                <img src="{{ asset('foto/' . $c['img']) }}" alt="{{ $c['title'] }}" loading="lazy">

                <a href="{{ route($c['route']) }}" class="card-overlay">
                    <h2 class="card-titulo">{{ $c['title'] }}</h2>
                </a>

            </div>
        @endforeach

    </div>

</x-app-layout>
