<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
                {{ $activo->categoria?->nombre ?? 'Activo' }}
            </p>

            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ $activo->marca ?? 'Sin marca' }}
                {{ $activo->modelo ?? '' }}
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Información técnica, ubicación y estado del equipo
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            {{-- Volver --}}
            <div class="mb-6">
                <a
                    href="{{ route('mis-activos') }}"
                    class="inline-flex items-center text-sm font-medium text-blue-600 transition hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300"
                >
                    <svg
                        class="mr-2 h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 19l-7-7 7-7"
                        />
                    </svg>

                    Volver a mis activos
                </a>
            </div>

            {{-- Estado --}}
            @php
                $estadoClasses = match ($activo->estado) {
                    'activo' =>
                        'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400',

                    'en_revision' =>
                        'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400',

                    'en_reparacion' =>
                        'bg-orange-100 text-orange-700 dark:bg-orange-900/40 dark:text-orange-400',

                    'listo_para_retirar' =>
                        'bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-400',

                    'fuera_de_servicio' =>
                        'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-400',

                    'dado_de_baja' =>
                        'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300',

                    default =>
                        'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
                };

                $estadoNombre = match ($activo->estado) {
                    'en_revision' => 'En revisión',
                    'en_reparacion' => 'En reparación',
                    'listo_para_retirar' => 'Listo para retirar',
                    'fuera_de_servicio' => 'Fuera de servicio',
                    'dado_de_baja' => 'Dado de baja',
                    default => ucfirst($activo->estado),
                };
            @endphp

            {{-- Contenedor principal --}}
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">

                {{-- Encabezado del activo --}}
                <div class="border-b border-gray-200 p-6 dark:border-gray-700">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <p class="text-sm font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">
                                {{ $activo->categoria?->nombre ?? 'Activo' }}
                            </p>

                            <h1 class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">
                                {{ $activo->marca ?? 'Sin marca' }}
                                {{ $activo->modelo ?? '' }}
                            </h1>

                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                Código interno:
                                <span class="font-semibold text-gray-700 dark:text-gray-300">
                                    {{ $activo->codigo_interno ?? 'Sin asignar' }}
                                </span>
                            </p>

                        </div>

                        {{-- Estado --}}
                        <span
                            class="inline-flex w-fit items-center rounded-full px-4 py-2 text-sm font-semibold {{ $estadoClasses }}"
                        >
                            <span class="mr-2 h-2 w-2 rounded-full bg-current"></span>

                            {{ $estadoNombre }}
                        </span>

                    </div>

                </div>

                {{-- Datos principales --}}
                <div class="p-6">

                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Información del activo
                    </h2>

                    <div class="mt-5 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                        {{-- Código interno --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Código interno
                            </p>

                            <p class="mt-1 text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $activo->codigo_interno ?? 'Sin asignar' }}
                            </p>
                        </div>

                        {{-- Número de serie --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Número de serie
                            </p>

                            <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ $activo->numero_serie ?? 'Sin registrar' }}
                            </p>
                        </div>

                        {{-- Código patrimonial --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Código patrimonial
                            </p>

                            <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ $activo->codigo_patrimonial ?? 'Sin registrar' }}
                            </p>
                        </div>

                        {{-- Marca --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Marca
                            </p>

                            <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ $activo->marca ?? 'Sin registrar' }}
                            </p>
                        </div>

                        {{-- Modelo --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Modelo
                            </p>

                            <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ $activo->modelo ?? 'Sin registrar' }}
                            </p>
                        </div>

                        {{-- Fecha de alta --}}
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Fecha de alta
                            </p>

                            <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ $activo->fecha_alta?->format('d/m/Y') ?? 'Sin registrar' }}
                            </p>
                        </div>

                    </div>

                </div>

                {{-- Ubicación --}}
                <div class="border-t border-gray-200 p-6 dark:border-gray-700">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900/40">

                            <svg
                                class="h-5 w-5 text-purple-600 dark:text-purple-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17.657 16.657L13.414 21a2 2 0 01-2.828 0l-4.243-4.343a8 8 0 1111.314 0z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>

                        </div>

                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Ubicación
                            </h2>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Dependencia y ubicación actual del equipo
                            </p>
                        </div>

                    </div>

                    <div class="mt-5 grid gap-6 sm:grid-cols-2">

                        <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-700">

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Dependencia
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $activo->dependencia?->nombre ?? 'Sin dependencia' }}
                            </p>

                        </div>

                        <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-700">

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Ubicación
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $activo->ubicacion?->nombre ?? 'Sin ubicación' }}
                            </p>

                        </div>

                    </div>

                </div>

                {{-- Especificaciones técnicas --}}
                <div class="border-t border-gray-200 p-6 dark:border-gray-700">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/40">

                            <svg
                                class="h-5 w-5 text-blue-600 dark:text-blue-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z"
                                />
                            </svg>

                        </div>

                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Especificaciones técnicas
                            </h2>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Características técnicas registradas del activo
                            </p>
                        </div>

                    </div>

                    @if ($activo->especificaciones->isEmpty())

                        <div class="mt-5 rounded-xl border border-dashed border-gray-300 p-6 text-center dark:border-gray-600">

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                No hay especificaciones técnicas registradas.
                            </p>

                        </div>

                    @else

                        <div class="mt-5 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">

                            <div class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($activo->especificaciones as $especificacion)

                                    <div class="flex flex-col gap-1 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                            {{ ucfirst(str_replace('_', ' ', $especificacion->clave)) }}
                                        </span>

                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ $especificacion->valor }}

                                            @if ($especificacion->unidad)
                                                <span class="font-normal text-gray-500 dark:text-gray-400">
                                                    {{ $especificacion->unidad }}
                                                </span>
                                            @endif
                                        </span>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endif

                </div>

                {{-- Observaciones --}}
                @if ($activo->observaciones)

                    <div class="border-t border-gray-200 p-6 dark:border-gray-700">

                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Observaciones
                        </h2>

                        <div class="mt-4 rounded-xl bg-gray-50 p-5 dark:bg-gray-900/40">

                            <p class="text-sm leading-6 text-gray-600 dark:text-gray-400">
                                {{ $activo->observaciones }}
                            </p>

                        </div>

                    </div>

                @endif

                {{-- Acción de reparación --}}
                <div class="border-t border-gray-200 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-900/30">

                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                                ¿Este equipo necesita atención?
                            </h3>

                            <p class="mt-1 max-w-xl text-sm text-gray-500 dark:text-gray-400">
                                Desde aquí podrás informar una falla y solicitar una revisión técnica del equipo.
                            </p>

                        </div>

                        <button
                            type="button"
                            disabled
                            class="inline-flex items-center justify-center rounded-lg bg-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-600 dark:bg-gray-700 dark:text-gray-400"
                        >
                            Solicitar revisión

                            <svg
                                class="ml-2 h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>

                        </button>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>