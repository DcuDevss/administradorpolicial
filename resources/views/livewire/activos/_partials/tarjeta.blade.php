<div wire:key="activo-{{ $activo->id }}" class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">

    <div class="border-b border-gray-200 p-6 dark:border-gray-700">

        @php
            $estadoClasses = match ($activo->estado) {
                'activo' => 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400',

                'en_revision' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400',

                'en_reparacion' => 'bg-orange-100 text-orange-700 dark:bg-orange-900/40 dark:text-orange-400',

                'listo_para_retirar' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-400',

                'fuera_de_servicio' => 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-400',

                'dado_de_baja' => 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300',

                default => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
            };

            $estadoNombre = match ($activo->estado) {
                'en_revision' => 'En revisión',
                'en_reparacion' => 'En reparación',
                'listo_para_retirar' => 'Listo para retirar',
                'fuera_de_servicio' => 'Fuera de servicio',
                'dado_de_baja' => 'Dado de baja',
                default => ucfirst($activo->estado),
            };

            $mensajeEstado = match ($activo->estado) {
                'en_revision' => 'El equipo se encuentra en proceso de revisión técnica.',

                'en_reparacion' => 'El equipo se encuentra actualmente en reparación.',

                'listo_para_retirar' => 'El equipo se encuentra reparado y está listo para ser retirado.',

                'fuera_de_servicio' => 'El equipo se encuentra fuera de servicio y no está disponible para uso.',

                'dado_de_baja' => 'El activo fue dado de baja y ya no se encuentra disponible.',

                default => null,
            };
        @endphp


        {{-- Información principal --}}
        <div class="flex items-start justify-between gap-4">

            <div class="min-w-0">

                <p class="text-xs font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">
                    {{ $activo->categoria?->nombre ?? 'Activo' }}
                </p>

                <h2 class="mt-1 text-lg font-bold text-gray-900 dark:text-white">
                    {{ $activo->marca ?? 'Sin marca' }}
                    {{ $activo->modelo ?? '' }}
                </h2>

            </div>


            {{-- Estado --}}
            <div class="flex shrink-0 flex-col items-end gap-2">

                <span class="{{ $estadoClasses }} rounded-full px-3 py-1 text-xs font-semibold">
                    {{ $estadoNombre }}
                </span>

                @if ($activo->tiene_solicitud_pendiente)
                    <span
                        class="inline-flex items-center gap-1.5 rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400">

                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                        </svg>

                        Revisión pendiente

                    </span>
                @endif

            </div>

        </div>


        {{-- Aviso cuando el activo no está disponible --}}
        @if ($mensajeEstado)
            <div
                class="mt-4 flex items-start gap-3 rounded-lg border border-gray-200 bg-gray-50 p-3 dark:border-gray-700 dark:bg-gray-900/30">

                <svg class="mt-0.5 h-5 w-5 shrink-0 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16a2 2 0 001.73 3z" />

                </svg>

                <div>

                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-300">
                        {{ $estadoNombre }}
                    </p>

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        {{ $mensajeEstado }}
                    </p>

                </div>

            </div>
        @endif

    </div>


    {{-- Información --}}
    <div class="space-y-3 p-6">

        <div>

            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                Código interno
            </p>

            <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-gray-200">
                {{ $activo->codigo_interno ?? 'Sin asignar' }}
            </p>

        </div>


        <div>

            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                Número de serie
            </p>

            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                {{ $activo->numero_serie ?? 'Sin registrar' }}
            </p>

        </div>


        <div>

            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                Dependencia
            </p>

            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                {{ $activo->dependencia?->nombre ?? 'Sin dependencia' }}
            </p>

        </div>


        <div>

            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                Ubicación
            </p>

            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                {{ $activo->ubicacion?->nombre ?? 'Sin ubicación' }}
            </p>

        </div>

    </div>


    {{-- Acción --}}
    <div class="border-t border-gray-200 p-6 dark:border-gray-700">

        <a href="{{ route('mis-activos.detalle', $activo) }}"
            class="block w-full rounded-lg bg-blue-600 px-4 py-2.5 text-center text-sm font-semibold text-white transition hover:bg-blue-700">

            @if ($activo->estado === 'activo')
                Ver activo
            @elseif ($activo->estado === 'en_revision')
                Ver revisión
            @elseif ($activo->estado === 'en_reparacion')
                Ver reparación
            @elseif ($activo->estado === 'listo_para_retirar')
                Ver detalles
            @else
                Ver activo
            @endif

        </a>

    </div>

</div>
