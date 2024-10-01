<x-app-layout>

    <!-- Contenedor principal -->
    <div class="relative">
        <!-- Contenedor de la tabla de usuarios -->
        @livewire('admin.user-index')

        <!-- Botón en la parte inferior centrado -->
        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 mb-4">
            <a href="{{ route('register.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear Nuevo Usuario
            </a>
        </div>
    </div>

</x-app-layout>
