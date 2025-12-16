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

                        {{-- Columna 3: Eliminar (¡MODIFICADA PARA SWEETALERT2!) --}}
                        <td class="border px-4 py-2 text-center">
                            {{-- 1. Asignamos un ID único al formulario --}}
                            <form id="delete-role-form-{{ $role->id }}"
                                action="{{ route('admin-roles.destroy', $role) }}" method="post">
                                @method('delete')
                                @csrf

                                <div class="text-center">
                                    {{-- 2. Cambiamos 'type="submit"' por 'type="button"' y llamamos a confirmDelete --}}
                                    <button
                                        class="bg-red-600 hover:bg-red-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                        type="button" onclick="confirmDeleteRole({{ $role->id }})">
                                        Eliminar Rol
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
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

{{-- *** FUNCIÓN JAVASCRIPT CON SWEETALERT2 PARA ROLES *** --}}
@push('scripts')
    <script>
        // Usamos un nombre diferente (confirmDeleteRole) para evitar conflictos con confirmDelete de usuarios
        function confirmDeleteRole(roleId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡El rol será eliminado permanentemente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', // Rojo para eliminar
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, ¡borrar el rol!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario con el ID único
                    document.getElementById('delete-role-form-' + roleId).submit();
                }
            })
        }
    </script>
@endpush
