<x-app-layout>

    {{-- FONDO GENERAL IGUAL AL DE LA OTRA VISTA --}}
    <style>
        body {
            background-image: url('{{ asset('foto/base.webp') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>

    {{-- TÍTULO --}}
    <div class="text-center text-xl font-bold text-white mb-4 mt-4">
        <h1>D.C.R.G</h1>
    </div>

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="flex justify-center min-h-screen items-start pt-10">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12 w-full max-w-5xl px-4">

            {{-- CARD 1 --}}
            <div class="h-96 w-full rounded-lg relative overflow-hidden shadow-lg">
                <img src="{{ asset('foto/botondcu.jpg') }}"
                    class="w-full h-full object-cover rounded-lg transition-transform duration-500 hover:scale-105">

                <a href="{{ route('createComunicacionesRiogrande') }}"
                    class="absolute inset-0 flex items-center justify-center
                          bg-black bg-opacity-40 hover:bg-opacity-60
                          transition-all duration-300 text-white text-2xl font-bold">
                    Comunicaciones
                </a>
            </div>

            {{-- CARD 2 --}}
            <div class="h-96 w-full rounded-lg relative overflow-hidden shadow-lg">
                <img src="{{ asset('foto/informatica.jpg') }}"
                    class="w-full h-full object-cover rounded-lg transition-transform duration-500 hover:scale-105">

                <a href="{{ route('createRiograndeGeneral') }}"
                    class="absolute inset-0 flex items-center justify-center
                          bg-black bg-opacity-20 hover:bg-opacity-50
                          transition-all duration-300 text-white text-2xl font-bold">
                    Informática
                </a>
            </div>

        </div>
    </div>

</x-app-layout>
