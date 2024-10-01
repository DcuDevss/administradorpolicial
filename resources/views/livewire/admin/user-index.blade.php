<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300 text-center" id="dataTable">
                <thead class="bg-black text-white">
                    <tr>
                        <th class="px-6 py-2 text-xs">Usuario</th>
                        <th class="px-6 py-2 text-xs">Email</th>
                        <th class="px-6 py-2 text-xs">Editar</th>
                        <th class="px-6 py-2 text-xs">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('users.edit', $user) }}" class="inline-block text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block text-center" onsubmit="return confirm('¿Está seguro que desea eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-0 bg-transparent border-none">
                                        <!-- Icono SVG del tacho de basura con una tapita más ancha -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M7 3h10v2H7V3z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l1 14h12l1-14H5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11v6M11 11v6M15 11v6" />
                                        </svg>
                                    </button>
                                </form>
                            </td>








                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $users->links('pagination::tailwind') }}
        </div>

        <!-- Botón para crear nuevo usuario -->
        <!-- Verifica si el usuario tiene el rol 'Admin' -->

        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 mb-4">
            <a href="{{ route('register.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear Nuevo Usuario
            </a>
        </div>

    </div>


</x-app-layout>
