<div>

    <div class="mb-8">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Mis activos
                </h1>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Consulta y administra los equipos tecnológicos asociados a tu dependencia.
                </p>
            </div>

            <div class="flex flex-col gap-2 sm:flex-row">

                {{--   @can('activos.create') --}}
                {{-- Crear activo --}}
                <a href="{{ route('mis-activos.crear') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">

                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>

                    Agregar activo
                </a>
                {{--   @endcan --}}

                {{-- Volver al panel --}}
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>

                    Volver al panel
                </a>

            </div>

        </div>

    </div>

    {{-- Filtros --}}
    @include('livewire.activos._partials.filtros')

    {{-- =========================================================
        RESULTADOS
    ========================================================== --}}
    @if ($activos->isEmpty())

        <div
            class="rounded-2xl border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">

            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700">

                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
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
                @include('livewire.activos._partials.tarjeta', [
                    'activo' => $activo,
                ])
            @endforeach

        </div>

    @endif

</div>
