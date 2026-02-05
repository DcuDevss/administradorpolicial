<x-app-layout>

    {{-- FONDO GENERAL IGUAL A LAS OTRAS VISTAS --}}
   {{--  <style>
        body {
            background-image: url('{{ asset('foto/base.webp') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style> --}}

    {{-- TÍTULO --}}
    <div class="text-center text-xl font-bold text-white mb-4 mt-4">
        <h1>Técnico Comunicaciones</h1>
    </div>

    {{-- GRID DE CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 p-4">

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
            <div
                class="relative group h-32 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">

                <img src="{{ asset('foto/' . $c['img']) }}"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                <a href="{{ route($c['route']) }}"
                    class="absolute inset-0 flex items-center justify-center bg-black/40 group-hover:bg-black/60
                          transition-all duration-300 text-white text-lg font-extrabold text-center px-2">

                    <h2 class="drop-shadow-lg">{{ $c['title'] }}</h2>

                </a>

            </div>
        @endforeach

    </div>

</x-app-layout>
