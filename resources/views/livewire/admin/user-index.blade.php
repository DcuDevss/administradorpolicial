<div class="container mx-auto p-4">

    {{-- *** 1. BUSCADOR (SOLO) *** --}}
    <div class="flex justify-start items-center mb-6">
        <div class="w-full">
            <input wire:model.live="search"
                class="bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded w-full py-2 px-4 text-gray-800 dark:text-white leading-tight focus:outline-none focus:border-blue-500 transition-colors duration-200"
                type="text" placeholder="Buscar usuario por nombre o email...">
        </div>
    </div>


    {{-- *** 2. TABLA DE USUARIOS (DINÁMICA) *** --}}
    <div class="overflow-x-auto shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-center" id="dataTable">
            <thead class="bg-gray-50 dark:bg-black text-gray-700 dark:text-white">
                <tr>
                    <th class="px-6 py-3 text-xs uppercase tracking-wider font-bold">Usuario</th>
                    <th class="px-6 py-3 text-xs uppercase tracking-wider font-bold">Email</th>
                    <th class="px-6 py-3 text-xs uppercase tracking-wider font-bold">Editar</th>
                    <th class="px-6 py-3 text-xs uppercase tracking-wider font-bold">Eliminar</th>
                </tr>
            </thead>
            <tbody
                class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700 text-gray-800 dark:text-white">
                @forelse ($users as $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-600 dark:text-gray-300">{{ $user->email }}
                        </td>

                        {{-- Columna Editar --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('users.edit', $user) }}" class="inline-block text-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-blue-500 hover:text-blue-400 dark:text-blue-400 dark:hover:text-blue-300"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>

                        {{-- Columna Eliminar --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}"
                                method="POST" class="inline-block text-center">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $user->id }})"
                                    class="p-0 bg-transparent border-none focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-6 h-6 text-red-600 hover:text-red-500 dark:text-red-500 dark:hover:text-red-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 7h16M7 3h10v2H7V3z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 7l1 14h12l1-14H5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 11v6M11 11v6M15 11v6" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"
                            class="px-6 py-4 text-center text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-900">
                            No se encontraron usuarios que coincidan con "{{ $search }}".
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- *** 3. PAGINACIÓN *** --}}
    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

{{-- *** FUNCIÓN JAVASCRIPT CON SWEETALERT2 *** --}}
{{-- @push('scripts')
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, ¡borrarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario con el ID único
                    document.getElementById('delete-form-' + userId).submit();
                }
            })
        }
    </script>
@endpush --}}
@push('scripts')
    <script>
        function confirmDelete(userId) {
            // Detenemos cualquier otro evento para que no aparezcan 2 alertas
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }

            const isLight = document.documentElement.classList.contains('light-mode');

            Swal.fire({
                title: "¿Estás seguro de eliminar?",
                text: "¡No podrás revertir esta acción!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#dc2626', // Rojo oscuro
                cancelButtonColor: '#64748b', // Gris azulado
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: isLight ? '#ffffff' : '#1e293b',
                color: isLight ? '#1e293b' : '#ffffff',
                customClass: {
                    popup: 'rounded-xl border border-white/10'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Buscamos el formulario y lo enviamos
                    const form = document.getElementById('delete-form-' + userId);
                    if (form) {
                        form.dataset.confirmed = "true"; // Marcamos como confirmado para el global
                        form.submit();
                    }
                }
            });
        }
    </script>
@endpush
