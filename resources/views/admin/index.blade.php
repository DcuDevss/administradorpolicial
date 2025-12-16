<x-app-layout>

    {{-- 1. TÍTULO DENTRO DEL LAYOUT --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-500 leading-tight">
            {{ __('ROL DE USUARIOS: ') }}
        </h2>
    </x-slot>

    <div class="py-5 bg-white dark:bg-gray-100 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Aquí se carga el componente Livewire (que contiene la paginación con un margen inferior) --}}
            @livewire('admin.user-index')

            {{-- 2. BOTÓN DE CREAR --}}
            {{-- SE REDUCE mt-6 A mt-4 O mt-2 PARA ACERCARLO A LA PAGINACIÓN --}}
            <div class="text-center mt-2 mb-6">
                <a href="{{ route('register.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Crear Nuevo Usuario
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
