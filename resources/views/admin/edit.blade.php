<x-app-layout>
    <div class="py-5 bg-white dark:bg-gray-100 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-red-500 leading-tight">
                    {{ __('EDITAR ROLES: ') }}
                </h2>
            </x-slot>

            @if (session('info'))
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Mensaje!!</p>
                    <p class="text-sm">{{ session('info') }}</p>
                </div>
            @endif

            <div class="mb-4">
                <form action="{{ route('users.update', $user) }}" method="post">
                    @method('put')
                    @csrf

                    <!-- NOMBRE -->
                    <div class="mb-4">
                        <label class="block text-blue-800 font-bold mb-2" for="name">
                            Nombre
                        </label>
                        <input name="name" id="name"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            type="text" value="{{ $user->name }}">
                    </div>

                    <!-- ROLES -->
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach

                    <!-- NUEVA CONTRASEÑA -->
                    <div class="mt-6">
                        <label class="block text-sm font-semibold tracking-wide mb-2"
                            style="color: var(--color-acento);">
                            Actualizar contraseña
                        </label>

                        <input type="password" name="password" placeholder="Dejar vacío para no modificar"
                            class="w-full max-w-sm px-3 py-2 text-sm rounded-lg border transition duration-200
               focus:outline-none focus:ring-2 focus:ring-offset-1"
                            style="border: 1px solid var(--borde); background: var(--bg-card);">
                    </div>


                    <!-- BOTÓN -->
                    <div>
                        <button
                            class="bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded"
                            type="submit">
                            Actualizar Usuario
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
