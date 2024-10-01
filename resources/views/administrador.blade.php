<x-app-layout>

    <h1 class="text-center text-xl font-bold text-white mb-4 mt-4">Administrador</h1>


    <div class="grid grid-cols-1 gap-5 lg:grid-cols-5 lg:gap-8">

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/primera.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Primera</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/segunda.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Segunda</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/tercera.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Tercera</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/cuarta.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Cuarta</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/quinta1.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Quinta</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/famila1.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria GyFU N 1</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/genero2.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria GyFU N 2</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/investigaciones.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Investigaciones</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300  relative">
            <img src="{{ asset('foto/recursos.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Recursos Humanos</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300  relative">
            <img src="{{ asset('foto/administracion.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Administracion</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300  relative">
            <img src="{{ asset('foto/narco.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Brigada narcocriminalidad</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300  relative">
            <img src="{{ asset('foto/complejos.webp') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Brigada Delitos Complejos</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300  relative">
            <img src="{{ asset('foto/auto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Automotores</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300  relative">
            <img src="{{ asset('foto/365.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Destacamento 365</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300  relative">
            <img src="{{ asset('foto/deseu.webp') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Division Servicios Especiales</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/custodiagobierno.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Custodia gubernamental</h2>
            </a>
        </div>


        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/cientifica.JPG') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Division Policía Científica</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/Comisariatolhuin.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('crear-notificacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Tolhuin</h2>
            </a>
        </div>


       
    </div>




</x-app-layout>

