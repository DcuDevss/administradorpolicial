<div class="py-5 bg-slate-800 dark:bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="header mb-5">
            <h2 class="font-semibold text-xl text-red-500 leading-tight">
                {{ __('Historial de Modificaciones Tolhuin') }}
            </h2>
        </div>

        <div class="content bg-white dark:bg-gray-100 shadow-lg rounded-md p-6">
            <div x-data="{ open: true }" class="accordion mb-6">
                <div @click="open = !open"
                    class="flex items-center justify-between bg-slate-800 p-4 rounded-md transition cursor-pointer">
                    <p class="text-lg font-extrabold text-white">Modificaciones Realizadas Tolhuin</p>
                    <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                </div>

                <!-- Mostrar detalles del historial de trabajo -->
                <div x-show.transition.in.duration.800ms="open" class="border p-4">
                    <table class="w-full table-auto">
                        <thead class="text-m font-bold uppercase text-gray-500 bg-slate-400">
                            <tr>
                                <th class="p-1 text-center text-m text-blue-800 font-bold">
                                    Detalle de Modificacion
                                </th>
                                <th class="p-1 text-center text-m text-blue-800 font-bold">
                                    Última carga
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($historialTrabajos->count())
                                @foreach ($historialTrabajos as $trabajo)
                                    <tr>
                                        <td class="p-1 text-center text-m uppercase">
                                            {{ $trabajo->detalle_inventario }}
                                        </td>
                                        <td class="p-1 text-center text-m">
                                            @php
                                                $updatedAt = $trabajo->updated_at ? \Carbon\Carbon::parse($trabajo->updated_at) : null;
                                            @endphp
                                            @if ($updatedAt)
                                                <div class="flex flex-col">
                                                    <span class="text-red-500">
                                                        Fecha: {{ $updatedAt->format('d/m/Y') }}
                                                    </span>
                                                    <span>
                                                        Hora: {{ $updatedAt->format('H:i:s') }}
                                                    </span>
                                                </div>
                                            @else
                                                Sin ediciones
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        No hay historial de trabajos.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>


                    <!-- Paginación si es necesaria -->
                    <div class="mt-4">
                        {{ $historialTrabajos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
