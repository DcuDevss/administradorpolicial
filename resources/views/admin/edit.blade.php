<x-app-layout>
    <div class="py-5 bg-white dark:bg-gray-100 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-slot name="header">
                <h2 class="font-semibold text-xl text-red-500 leading-tight">
                    {{ __('EDITAR ROLES: ') }}
                </h2>
            </x-slot>

            {{--   @if (session('info'))
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Mensaje!!</p>
                    <p class="text-sm">{{ session('info') }}</p>
                </div>
            @endif --}}

            @if (session('info'))
                <div class="mb-6 rounded-lg px-4 py-3 border-l-4 shadow-sm"
                    style="
            background: var(--bg-card);
            border-left: 4px solid var(--color-acento);
            border-top: 1px solid var(--borde);
            border-right: 1px solid var(--borde);
            border-bottom: 1px solid var(--borde);
            color: var(--texto-principal);
         "
                    role="alert">

                    <p class="text-sm font-semibold mb-1" style="color: var(--color-acento);">
                        ✔ Operación realizada
                    </p>

                    <p class="text-sm opacity-90">
                        {{ session('info') }}
                    </p>
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

                    <!-- SECCIÓN CONTRASEÑA -->
                    <div class="mt-6 pt-4 border-t" style="border-color: var(--borde);">

                        <h3 class="text-xs uppercase tracking-widest mb-3" style="color: var(--texto-secundario);">
                            Seguridad de Acceso
                        </h3>

                        <div class="max-w-xs">
                            <label class="block text-xs font-semibold mb-1" style="color: var(--texto-principal);">
                                Nueva contraseña
                            </label>

                            <input type="password" name="password" placeholder="Opcional"
                                class="w-full px-3 py-1.5 text-sm rounded border focus:outline-none focus:ring-1"
                                style="border: 1px solid var(--borde); background: var(--bg-card);">

                            <p class="text-[11px] mt-1 opacity-70" style="color: var(--texto-secundario);">
                                Dejar en blanco si no desea modificarla.
                            </p>
                        </div>

                    </div>


                    <!-- BOTÓN -->
                    <div>
                        <button
                            class="bg-purple-500 mt-6 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded"
                            type="submit">
                            Actualizar Usuario
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
