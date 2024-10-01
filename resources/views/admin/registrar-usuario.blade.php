<!-- resources/views/registrar-usuario.blade.php -->

<x-app-layout>


    <div class="py-5 bg-white dark:bg-gray-100 mt-10">
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-red-500 leading-tight">
                    {{ __('REGISTRAR USUARIO: ') }}
                </h2>
            </x-slot>
            <form action="{{ route('register.store') }}" method="POST"> <!-- Cambiado a 'register.store' -->
                @csrf
                <div class="mb-4">
                    <label class="block text-blue-800 font-bold mb-2" for="inline-full-name" for="name">Nombre
                        Completo:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-blue-800 font-bold mb-2" for="inline-full-name" for="email">Correo
                        Electrónico:</label>
                    <input value="" type="email" class="form-control" id="email" name="email"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-blue-800 font-bold mb-2" for="inline-full-name"
                        for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-4">
                    <label class="block text-blue-800 font-bold mb-2" for="inline-full-name"
                        for="password_confirmation">Confirmar Contraseña:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="mb-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear
                        Usuario</button>
                </div>
            </form>
        </div>

</x-app-layout>
