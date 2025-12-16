<div>
    {{-- Mantenemos la lógica de Mensajes y Botón Nuevo Rol --}}
    @if (session('info'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Mensaje!!</p>
            <p class="text-sm">{{ session('info') }}</p>
        </div>
    @endif

    <div class="float-right mb-3">
        <a href="{{ route('admin-roles.create') }}"
            class="inline-block bg-slate-700 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
            Nuevo rol
        </a>
    </div>

    {{-- *** EL BUSCADOR CON LIVEWIRE *** --}}
    <div class="mb-4">
        <input wire:model.live="search"
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-black leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
            id="inline-full-name" type="text" placeholder="Buscar rol...">
    </div>

    {{-- *** LA TABLA FILTRADA Y CORREGIDA *** --}}
    <div class="mb-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    {{-- CORRECCIÓN DE ALINEACIÓN: Necesitamos solo 3 columnas. --}}
                    {{-- La fila del <tbody> tiene 3 celdas (Rol, Editar, Eliminar). --}}
                    {{-- QUITAMOS EL COLSPAN y dejamos las columnas de Editar y Eliminar separadas --}}
                    <th class="px-4 py-2">Rol</th>
                    <th class="px-4 py-2">Editar</th>
                    <th class="px-4 py-2">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                    <tr>
                        {{-- Columna 1: Rol (Nombre) --}}
                        <td class="border px-4 py-2 text-center">{{ $role->name }}</td>

                        {{-- Columna 2: Editar (Botón) --}}
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('admin-roles.edit', $role) }}"
                                class="inline-block bg-purple-500 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                Editar
                            </a>
                        </td>

                        {{-- Columna 3: Eliminar (Formulario/Botón) --}}
                        <td class="border px-4 py-2 text-center">
                            <form action="{{ route('admin-roles.destroy', $role) }}" method="post"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este rol?');">
                                @method('delete')
                                @csrf

                                <div class="text-center">
                                    <button
                                        class="bg-red-600 hover:bg-red-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        type="submit">
                                        Eliminar Rol
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        {{-- CORRECCIÓN DE ALINEACIÓN: El colspan debe ser 3 para abarcar las 3 columnas --}}
                        <td colspan="3" class="border px-4 py-4 text-center text-gray-500">
                            No se encontraron roles que coincidan con "{{ $search }}".
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Enlazar la paginación --}}
        <div class="mt-4">
            {{ $roles->links() }}
        </div>
    </div>
</div>
