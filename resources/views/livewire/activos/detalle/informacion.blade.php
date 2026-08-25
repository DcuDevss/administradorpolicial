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
