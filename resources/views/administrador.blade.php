<x-app-layout>
    <h1 class="text-center text-xl font-bold text-white mb-4 mt-4 uppercase tracking-widest">Administrador</h1>

    <div class="contenedor-cards">
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
            <div class="card-profesional">
                <img src="{{ asset('foto/' . $card['img']) }}" alt="{{ $card['title'] }}" loading="lazy">

                <a href="{{ route('crear-notificacion') }}" class="card-overlay">
                    <h2 class="card-titulo">
                        {{ $card['title'] }}
                    </h2>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
