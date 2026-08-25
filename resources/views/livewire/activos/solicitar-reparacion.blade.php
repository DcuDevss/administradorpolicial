{{-- =========================================================
    FORMULARIO DE SOLICITUD DE REVISIÓN
========================================================= --}}
<div class="max-h-[70vh]  bg-white dark:bg-gray-800">

    <div class="space-y-6 p-6">

        {{-- =====================================================
            ACTIVO
        ====================================================== --}}
        <div
            class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/30">

            <div class="flex items-start gap-3">

                {{-- Icono --}}
                <div
                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-600 dark:bg-blue-900/40 dark:text-blue-400">

                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L4.5 12l5.25-5m4.5 10L19.5 12l-5.25-5" />
                    </svg>

                </div>

                <div class="min-w-0 flex-1">

                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Equipo
                    </p>

                    <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-white">
                        {{ $activo->marca ?? 'Sin marca' }}
                        {{ $activo->modelo ?? '' }}
                    </p>

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        {{ $activo->categoria?->nombre ?? 'Activo' }}

                        @if ($activo->codigo_interno)
                            · Código {{ $activo->codigo_interno }}
                        @endif
                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
            INFORMACIÓN DEL PROBLEMA
        ====================================================== --}}
        <div>

            <div class="mb-4">

                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Información del problema
                </h3>

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Indicá qué sucede con el equipo para que el área técnica pueda evaluar la solicitud.
                </p>

            </div>


            {{-- Motivo --}}
            <div>

                <label
                    for="titulo"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    Motivo de la solicitud
                    <span class="text-red-500">*</span>

                </label>

                <input
                    id="titulo"
                    type="text"
                    wire:model="titulo"
                    maxlength="150"
                    autocomplete="off"
                    placeholder="Ej.: El equipo no enciende"
                    class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500">

                <div class="mt-1 flex items-start justify-between gap-4">

                    <div>
                        @error('titulo')
                            <p class="text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <span class="shrink-0 text-xs text-gray-400">
                        Máx. 150 caracteres
                    </span>

                </div>

            </div>


            {{-- Descripción --}}
            <div class="mt-5">

                <label
                    for="descripcion"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                    Descripción del problema
                    <span class="text-red-500">*</span>

                </label>

                <textarea
                    id="descripcion"
                    wire:model="descripcion"
                    rows="5"
                    maxlength="5000"
                    placeholder="Describí qué sucede con el equipo, cuándo comenzó el problema y cualquier información que pueda ayudar a identificar la falla."
                    class="mt-2 block w-full resize-y rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500"></textarea>

                <div class="mt-1 flex items-start justify-between gap-4">

                    <div>
                        @error('descripcion')
                            <p class="text-sm text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <span class="shrink-0 text-xs text-gray-400">
                        Máx. 5000 caracteres
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
            PRIORIDAD
        ====================================================== --}}
        <div class="border-t border-gray-200 pt-6 dark:border-gray-700">

            <div class="mb-4">

                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Prioridad de atención
                </h3>

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Seleccioná la prioridad que considerás adecuada según el impacto que tiene el problema.
                </p>

            </div>


            <label
                for="prioridad"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300">

                Prioridad
                <span class="text-red-500">*</span>

            </label>

            <select
                id="prioridad"
                wire:model="prioridad"
                class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                <option value="baja">
                    Baja
                </option>

                <option value="media">
                    Media
                </option>

                <option value="alta">
                    Alta
                </option>

                <option value="urgente">
                    Urgente
                </option>

            </select>

            {{-- Ayuda sobre prioridad --}}
            <div
                class="mt-3 rounded-lg border border-blue-100 bg-blue-50 p-3 dark:border-blue-900/40 dark:bg-blue-900/20">

                <div class="flex items-start gap-2">

                    <svg
                        class="mt-0.5 h-4 w-4 shrink-0 text-blue-600 dark:text-blue-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />

                    </svg>

                    <p class="text-xs leading-5 text-blue-700 dark:text-blue-300">
                        La prioridad indicada es orientativa y podrá ser revisada posteriormente
                        por el área técnica según la situación del equipo.
                    </p>

                </div>

            </div>

            @error('prioridad')
                <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- =====================================================
        ACCIONES
    ====================================================== --}}
    <div
        class="flex flex-col-reverse gap-3 border-t border-gray-200 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-900/30 sm:flex-row sm:justify-end">

        {{-- Cancelar --}}
        <button
            type="button"
            @click="mostrarModalReparacion = false"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700 dark:focus:ring-offset-gray-900">

            Cancelar

        </button>


        {{-- Generar solicitud --}}
        <button
            type="button"
            wire:click="guardar"
            wire:loading.attr="disabled"
            wire:target="guardar"
            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 dark:focus:ring-offset-gray-900">

            <span wire:loading.remove wire:target="guardar">
                Generar solicitud
            </span>

            <span
                wire:loading
                wire:target="guardar"
                class="inline-flex items-center">

                <svg
                    class="mr-2 h-4 w-4 animate-spin"
                    fill="none"
                    viewBox="0 0 24 24">

                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4">
                    </circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
                    </path>

                </svg>

                Registrando...

            </span>

        </button>

    </div>

</div>