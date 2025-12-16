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

    <h1 class="text-center text-xl font-bold text-white mb-4 mt-4">Administrador</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">

        {{-- CARD COMPONENT --}}
        @php
            $cards = [
                ['img' => 'primera.jpg', 'title' => 'Comisaría Primera'],
                ['img' => 'segunda.jpg', 'title' => 'Comisaría Segunda'],
                ['img' => 'tercera.jpg', 'title' => 'Comisaría Tercera'],
                ['img' => 'cuarta.jpg', 'title' => 'Comisaría Cuarta'],
                ['img' => 'quinta1.jpg', 'title' => 'Comisaría Quinta'],
                ['img' => 'famila1.jpeg', 'title' => 'Comisaría GyFU N°1'],
                ['img' => 'genero2.jpg', 'title' => 'Comisaría GyFU N°2'],
                ['img' => 'investigaciones.jpeg', 'title' => 'Investigaciones'],
                ['img' => 'recursos.jpeg', 'title' => 'Recursos Humanos'],
                ['img' => 'administracion.jpeg', 'title' => 'Administración'],
                ['img' => 'narco.jpg', 'title' => 'Brigada Narcocriminalidad'],
                ['img' => 'complejos.webp', 'title' => 'Delitos Complejos'],
                ['img' => 'auto.jpg', 'title' => 'Automotores'],
                ['img' => '365.jpg', 'title' => 'Destacamento 365'],
                ['img' => 'deseu.webp', 'title' => 'Servicios Especiales'],
                ['img' => 'custodiagobierno.jpg', 'title' => 'Custodia Gubernamental'],
                ['img' => 'cientifica.JPG', 'title' => 'Policía Científica'],
                ['img' => 'Comisariatolhuin.jpg', 'title' => 'Tolhuin'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div
                class="relative group rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">

                <img src="{{ asset('foto/' . $card['img']) }}"
                    class="w-full h-40 object-cover group-hover:scale-110 transition-transform duration-500">

                <a href="{{ route('crear-notificacion') }}"
                    class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all flex items-center justify-center">

                    <h2 class="text-white text-lg font-extrabold tracking-wide drop-shadow-lg text-center px-2">
                        {{ $card['title'] }}
                    </h2>
                </a>
            </div>
        @endforeach

    </div>

</x-app-layout>
