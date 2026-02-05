<app-layout>
    <div class="px-6 py-4">
        <div class="container-dinamico bg-gray-800 shadow rounded-lg">

            <x-slot name="header">
                <div class="flex items-center justify-between -my-4 py-0">
                    <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                        {{ __('AUDITORIAS:') }}
                    </h2>
                    <span class="text-[15px] text-gray-400 font-bold uppercase tracking-tighter">
                        Registro de movimientos
                    </span>
                </div>
            </x-slot>



            <!-- 🔍 FILTROS -->
            <div class="flex flex-wrap gap-3 p-4">

                <!-- Buscar -->
                <input wire:model.debounce.500ms="search" type="text" placeholder="Buscar acción o descripción..."
                    class="bg-gray-50 border text-sm rounded p-2 w-56">

                <!-- Acción -->
                <select wire:model="action" class="bg-gray-50 border text-sm rounded p-2 w-56">
                    <option value="">Acción</option>
                    <option value="create">Alta</option>
                    <option value="update">Edición</option>
                    <option value="delete">Eliminado</option>
                    <option value="user.delete">Usuario Eliminado</option>
                    <option value="role.update">Actualización de rol</option>
                    <option value="user.create">Usuario Creado</option>
                    <option value="user.update">Usuario Actualizado</option>
                    <option value="role.create">Rol Creado</option>
                    <option value="role.delete">Rol Eliminado</option>
                    <option value="role.update">Rol Actualizado</option>
                </select>



                {{-- <!-- Usuario -->
            <select wire:model="user_id" class="bg-gray-50 border text-sm rounded p-2 w-56">
                <option value="">Usuario</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>

            <!-- Fechas -->
            <input wire:model="desde" type="date" class="bg-gray-50 border text-sm rounded p-2">
            <input wire:model="hasta" type="date" class="bg-gray-50 border text-sm rounded p-2"> --}}
            </div>

            <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-700">
                <table class="w-full text-sm text-left text-gray-300">
                    <thead class="bg-gray-900 text-gray-400 uppercase text-xs tracking-wider">
                        <tr>
                            <th class="px-6 py-3 font-bold border-b border-gray-700 text-center">Fecha</th>
                            <th class="px-6 py-3 font-bold border-b border-gray-700">Usuario</th>
                            <th class="px-6 py-3 font-bold border-b border-gray-700 text-center">Acción</th>
                            <th class="px-6 py-3 font-bold border-b border-gray-700">Descripción</th>
                            <th class="px-6 py-3 font-bold border-b border-gray-700">Entidad</th>
                            {{-- <th class="px-4 py-2">IP</th> --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800 bg-gray-900/50">
                        @forelse ($audits as $a)
                            <tr class="hover:bg-gray-800/80 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-400 font-medium">
                                    {{ $a->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-start">
                                        <span class="font-semibold text-gray-200">{{ $a->user?->name ?? '—' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="px-2 py-1 rounded-md bg-gray-800 text-blue-400 text-xs font-bold border border-blue-900/30">
                                        {{ $a->action_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 italic text-gray-400">
                                    {{ $a->description ?? '—' }}
                                </td>

                                <td class="px-6 py-4 text-gray-200 font-medium">
                                    {{ $a->entity_label }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-3 text-gray-700" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        <span>No hay auditorías registradas</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- 📄 PAGINACIÓN -->
            <div class="p-4">
                {{ $audits->links() }}
            </div>

        </div>
    </div>
</app-layout>
