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

            <!-- 🧾 TABLA -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-center text-gray-300">
                    <thead class="bg-gray-900 text-white uppercase">
                        <tr>
                            <th class="px-4 py-2">Fecha</th>
                            <th class="px-4 py-2">Usuario</th>
                            <th class="px-4 py-2">Acción</th>
                            <th class="px-4 py-2">Descripción</th>
                            <th class="px-4 py-2">Entidad</th>
                            {{-- <th class="px-4 py-2">IP</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($audits as $a)
                            <tr class="border-b border-gray-700 hover:bg-gray-700">
                                <td class="px-4 py-2">
                                    {{ $a->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $a->user?->name ?? '—' }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $a->action_label }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $a->description ?? '—' }}
                                </td>
                                {{-- <td class="px-4 py-2">
                                {{ $a->entity_label ?? '—' }}
                            </td> --}}
                                <td class="px-4 py-2">
                                    {{ $a->entity_label }}
                                </td>






                                {{--   <td class="px-4 py-2">
                                {{ $a->ip_address ?? '—' }}
                            </td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-gray-400">
                                    No hay auditorías registradas
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
