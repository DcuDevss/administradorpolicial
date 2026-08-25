@if ($solicitudes->count())

    <div class="mt-6 border-t border-gray-200 pt-6 dark:border-gray-700">

        <div class="mb-4">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                Solicitudes de reparación
            </h3>

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                Historial de solicitudes asociadas a este equipo.
            </p>
        </div>


        <div class="space-y-3">

            @foreach ($solicitudes as $solicitud)

                <div
                    wire:key="solicitud-{{ $solicitud->id }}"
                    class="rounded-xl border border-gray-200 bg-white p-4 dark:border-gray-700 dark:bg-gray-800">

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">

                        <div class="min-w-0">

                            <h4 class="text-sm font-semibold text-gray-900 dark:text-white">
                                {{ $solicitud->titulo }}
                            </h4>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                {{ $solicitud->descripcion }}
                            </p>

                        </div>


                        <div class="flex shrink-0 flex-wrap items-center gap-2">

                            @php
                                $estadoClasses = match ($solicitud->estado) {
                                    'pendiente' =>
                                        'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400',

                                    'cancelada' =>
                                        'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300',

                                    'en_revision' =>
                                        'bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-400',

                                    'en_reparacion' =>
                                        'bg-orange-100 text-orange-700 dark:bg-orange-900/40 dark:text-orange-400',

                                    'resuelta' =>
                                        'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400',

                                    default =>
                                        'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
                                };
                            @endphp


                            <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $estadoClasses }}">
                                {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                            </span>


                            <span
                                class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 dark:bg-blue-900/40 dark:text-blue-400">

                                Prioridad:
                                {{ ucfirst($solicitud->prioridad) }}

                            </span>


                            @if ($solicitud->estado === 'pendiente' && $solicitud->usuario_id === auth()->id())

                                <button
                                    type="button"
                                    wire:click="cancelarSolicitud({{ $solicitud->id }})"
                                    wire:confirm="¿Está seguro de cancelar esta solicitud de revisión?"
                                    wire:loading.attr="disabled"
                                    wire:target="cancelarSolicitud({{ $solicitud->id }})"
                                    class="inline-flex items-center justify-center rounded-lg border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 transition hover:bg-red-100 disabled:cursor-not-allowed disabled:opacity-50">

                                    <span
                                        wire:loading.remove
                                        wire:target="cancelarSolicitud({{ $solicitud->id }})">
                                        Cancelar
                                    </span>

                                    <span
                                        wire:loading
                                        wire:target="cancelarSolicitud({{ $solicitud->id }})">
                                        Cancelando...
                                    </span>

                                </button>

                            @endif

                        </div>

                    </div>


                    <div class="mt-3 border-t border-gray-100 pt-3 dark:border-gray-700">

                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            Solicitud registrada el
                            {{ $solicitud->created_at?->format('d/m/Y H:i') }}
                        </p>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- Paginación --}}
        @if ($solicitudes->hasPages())

            <div class="mt-5">
                {{ $solicitudes->links() }}
            </div>

        @endif

    </div>

@endif