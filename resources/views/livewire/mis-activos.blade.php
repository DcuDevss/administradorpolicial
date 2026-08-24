<div>

    {{-- =========================================================
        ENCABEZADO
    ========================================================== --}}
    <div class="mb-8">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Mis activos
                </h1>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Consulta los equipos tecnológicos disponibles en el sistema.
                </p>
            </div>

            {{-- Volver al panel --}}
            <a
                href="{{ route('dashboard') }}"
                class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700"
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

                Volver al panel
            </a>

        </div>

    </div>


    {{-- =========================================================
        FILTROS
    ========================================================== --}}
    <div class="mb-8 rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">

        <div class="mb-5">

            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Buscar activos
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Utilizá los filtros para encontrar rápidamente un equipo.
            </p>

        </div>


        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">

            {{-- =================================================
                BÚSQUEDA GENERAL
            ================================================== --}}
            <div class="lg:col-span-2">

                <label
                    for="buscar"
                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Buscar
                </label>

                <input
                    id="buscar"
                    type="text"
                    wire:model.live.debounce.400ms="buscar"
                    placeholder="Marca, modelo, código o número de serie..."
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                >

            </div>


            {{-- =================================================
                CATEGORÍA
            ================================================== --}}
            <div>

                <label
                    for="categoria"
                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Categoría
                </label>

                <select
                    id="categoria"
                    wire:model.live="categoriaId"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                >

                    <option value="">
                        Todas las categorías
                    </option>

                    @foreach ($categorias as $categoria)

                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- =================================================
                UBICACIÓN
            ================================================== --}}
            <div>

                <label
                    for="ubicacion"
                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Ubicación
                </label>

                <select
                    id="ubicacion"
                    wire:model.live="ubicacionId"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                >

                    <option value="">
                        Todas las ubicaciones
                    </option>

                    @foreach ($ubicaciones as $ubicacion)

                        <option value="{{ $ubicacion->id }}">
                            {{ $ubicacion->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- =================================================
                ESTADO
            ================================================== --}}
            <div>

                <label
                    for="estado"
                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300"
                >
                    Estado
                </label>

                <select
                    id="estado"
                    wire:model.live="estado"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                >

                    <option value="">
                        Todos los estados
                    </option>

                    <option value="activo">
                        Activo
                    </option>

                    <option value="en_revision">
                        En revisión
                    </option>

                    <option value="en_reparacion">
                        En reparación
                    </option>

                    <option value="listo_para_retirar">
                        Listo para retirar
                    </option>

                    <option value="fuera_de_servicio">
                        Fuera de servicio
                    </option>

                    <option value="dado_de_baja">
                        Dado de baja
                    </option>

                </select>

            </div>

        </div>


        {{-- =================================================
            LIMPIAR FILTROS
        ================================================== --}}
        @if ($buscar || $categoriaId || $ubicacionId || $estado)

            <div class="mt-5">

                <button
                    type="button"
                    wire:click="limpiarFiltros"
                    class="text-sm font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300"
                >
                    Limpiar filtros
                </button>

            </div>

        @endif

    </div>


    {{-- =========================================================
        RESULTADOS
    ========================================================== --}}
    @if ($activos->isEmpty())

        <div
            class="rounded-2xl border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800"
        >

            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">

                <svg
                    class="h-6 w-6 text-gray-500 dark:text-gray-400"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                    />
                </svg>

            </div>

            <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">
                No se encontraron activos
            </h3>

            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                No existen activos que coincidan con los filtros seleccionados.
            </p>

        </div>

    @else

        {{-- =====================================================
            CONTADOR
        ====================================================== --}}
        <div class="mb-4">

            <p class="text-sm text-gray-500 dark:text-gray-400">

                Activos encontrados:

                <span class="font-semibold text-gray-700 dark:text-gray-200">
                    {{ $activos->count() }}
                </span>

            </p>

        </div>


        {{-- =====================================================
            TARJETAS
        ====================================================== --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($activos as $activo)

                <div
                    wire:key="activo-{{ $activo->id }}"
                    class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800"
                >

                    {{-- -----------------------------------------
                        CABECERA
                    ------------------------------------------ --}}
                    <div class="border-b border-gray-200 p-6 dark:border-gray-700">

                        <div class="flex items-start justify-between gap-4">

                            <div>

                                <p
                                    class="text-xs font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400"
                                >
                                    {{ $activo->categoria?->nombre ?? 'Activo' }}
                                </p>

                                <h2
                                    class="mt-1 text-lg font-bold text-gray-900 dark:text-white"
                                >
                                    {{ $activo->marca ?? 'Sin marca' }}
                                    {{ $activo->modelo ?? '' }}
                                </h2>

                            </div>


                            {{-- Estado --}}
                            <span
                                class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700 dark:bg-green-900/40 dark:text-green-400"
                            >
                                {{ ucfirst(str_replace('_', ' ', $activo->estado)) }}
                            </span>

                        </div>

                    </div>


                    {{-- -----------------------------------------
                        INFORMACIÓN
                    ------------------------------------------ --}}
                    <div class="space-y-3 p-6">

                        {{-- Código interno --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Código interno
                            </p>

                            <p class="mt-1 text-sm font-semibold text-gray-800 dark:text-gray-200">
                                {{ $activo->codigo_interno ?? 'Sin asignar' }}
                            </p>

                        </div>


                        {{-- Número de serie --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Número de serie
                            </p>

                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                {{ $activo->numero_serie ?? 'Sin registrar' }}
                            </p>

                        </div>


                        {{-- Dependencia --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Dependencia
                            </p>

                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                {{ $activo->dependencia?->nombre ?? 'Sin dependencia' }}
                            </p>

                        </div>


                        {{-- Ubicación --}}
                        <div>

                            <p class="text-xs font-medium uppercase tracking-wide text-gray-400">
                                Ubicación
                            </p>

                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                {{ $activo->ubicacion?->nombre ?? 'Sin ubicación' }}
                            </p>

                        </div>

                    </div>


                    {{-- -----------------------------------------
                        ACCIÓN
                    ------------------------------------------ --}}
                    <div class="border-t border-gray-200 p-6 dark:border-gray-700">

                        <a
                            href="{{ route('mis-activos.detalle', $activo) }}"
                            class="block w-full rounded-lg bg-blue-600 px-4 py-2.5 text-center text-sm font-semibold text-white transition hover:bg-blue-700"
                        >
                            Ver activo
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>