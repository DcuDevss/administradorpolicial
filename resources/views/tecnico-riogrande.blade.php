<x-app-layout>

    {{-- TÍTULO --}}
    <h1 class="text-center text-xl font-bold text-white mb-4 mt-4 uppercase tracking-widest">
        D.C.R.G
    </h1>

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="flex justify-center items-start pt-10">
        {{-- Usamos una variante de la grilla para que las 2 cards sean más grandes --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 w-full max-w-5xl px-6">

            {{-- CARD 1: COMUNICACIONES --}}
            <div class="card-profesional !h-96"> {{-- !h-96 sobrescribe la altura por defecto para esta vista --}}

                <img src="{{ asset('foto/botondcu.jpg') }}" alt="Comunicaciones" loading="lazy">

                <a href="{{ route('createComunicacionesRiogrande') }}" class="card-overlay">
                    <h2 class="card-titulo !text-2xl">Comunicaciones</h2>
                </a>

            </div>

            {{-- CARD 2: INFORMÁTICA --}}
            <div class="card-profesional !h-96">

                <img src="{{ asset('foto/informatica.jpg') }}" alt="Informática" loading="lazy">

                <a href="{{ route('createRiograndeGeneral') }}" class="card-overlay">
                    <h2 class="card-titulo !text-2xl">Informática</h2>
                </a>

            </div>

        </div>
    </div>

</x-app-layout>
