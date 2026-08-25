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
            <a href="{{ route('mis-activos') }}"
                class="inline-flex items-center text-sm font-medium text-blue-600 transition hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>

                Volver a mis activos
            </a>
        </div>

        {{-- Estado del activo --}}
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
        @endphp

        {{-- Contenedor principal --}}
        <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">

            {{-- Encabezado --}}
            @include('livewire.activos.detalle.encabezado')


            {{-- Información --}}
            @include('livewire.activos.detalle.informacion')

            {{-- Ubicación --}}
            @include('livewire.activos.detalle.ubicacion')


            {{-- Especificaciones --}}
            @include('livewire.activos.detalle.especificaciones')

            {{-- Observaciones --}}
            @include('livewire.activos.detalle.observaciones')


            {{-- Acción de reparación --}}
            @include('livewire.activos.detalle.accion-reparacion')


        </div>

    </div>
    {{-- Historial --}}
    @include('livewire.activos.detalle.historial-solicitudes')
    {{-- historial de solicitudes --}}

</div>
