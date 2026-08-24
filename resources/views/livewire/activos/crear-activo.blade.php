<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
                Gestión de activos
            </p>

            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Agregar activo
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Registra los datos básicos del equipo para incorporarlo al sistema.
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

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

            {{-- Mensaje de éxito --}}
            @if (session()->has('success'))
                <div
                    class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 dark:border-green-800 dark:bg-green-900/20">
                    <div class="flex items-start">

                        <svg class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-green-600 dark:text-green-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>

                        <p class="text-sm font-medium text-green-700 dark:text-green-300">
                            {{ session('success') }}
                        </p>

                    </div>
                </div>
            @endif

            {{-- Formulario --}}
            <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">

                {{-- Encabezado --}}
                <div class="border-b border-gray-200 p-6 dark:border-gray-700">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-100 dark:bg-blue-900/40">
                            <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2a4 4 0 014-4h4m0 0V7m0 4h-4m4 0l3-3m-3 3l3 3M5 5h6a2 2 0 012 2v2H5a2 2 0 01-2-2V7a2 2 0 01-2-2z" />
                            </svg>
                        </div>

                        <div>
                            <h1 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Carga rápida de activo
                            </h1>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Completá los datos básicos del equipo.
                            </p>
                        </div>

                    </div>

                </div>

                {{-- Información --}}
                <div class="border-b border-gray-200 bg-blue-50 px-6 py-4 dark:border-gray-700 dark:bg-blue-900/10">

                    <div class="flex items-start">

                        <svg class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-blue-600 dark:text-blue-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z" />
                        </svg>

                        <div>
                            <p class="text-sm font-semibold text-blue-800 dark:text-blue-300">
                                Registro inicial
                            </p>

                            <p class="mt-1 text-sm leading-5 text-blue-700 dark:text-blue-400">
                                En esta etapa sólo se solicitan los datos básicos del equipo.
                                La información técnica y patrimonial podrá ser completada posteriormente
                                por personal autorizado.
                            </p>
                        </div>

                    </div>

                </div>

                <form wire:submit="guardar">

                    <div class="space-y-6 p-6">

                        {{-- Categoría --}}
                        <div>
                            <label for="categoria_activo_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Categoría
                                <span class="text-red-500">*</span>
                            </label>

                            <select id="categoria_activo_id" wire:model="categoria_activo_id"
                                class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <option value="">
                                    Seleccionar categoría
                                </option>

                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>

                            @error('categoria_activo_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Marca y modelo --}}
                        <div class="grid gap-6 sm:grid-cols-2">

                            <div>
                                <label for="marca"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Marca
                                </label>

                                <input id="marca" type="text" wire:model="marca"
                                    placeholder="Ej.: Dell, HP, Lenovo"
                                    class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500">

                                @error('marca')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="modelo"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Modelo
                                </label>

                                <input id="modelo" type="text" wire:model="modelo"
                                    placeholder="Ej.: OptiPlex 3080"
                                    class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500">

                                @error('modelo')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>

                        {{-- Ubicación --}}
                        <div>
                            <label for="ubicacion_id"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Ubicación
                                <span class="text-red-500">*</span>
                            </label>

                            <select id="ubicacion_id" wire:model="ubicacion_id"
                                class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <option value="">
                                    Seleccionar ubicación
                                </option>

                                @foreach ($ubicaciones as $ubicacion)
                                    <option value="{{ $ubicacion->id }}">
                                        {{ $ubicacion->nombre }}
                                        @if ($ubicacion->dependencia)
                                            — {{ $ubicacion->dependencia->nombre }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>

                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                La dependencia del activo se determinará automáticamente a partir de la ubicación
                                seleccionada.
                            </p>

                            @error('ubicacion_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Observaciones --}}
                        <div>
                            <label for="observaciones"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Observaciones
                            </label>

                            <textarea id="observaciones" wire:model="observaciones" rows="4" maxlength="2000"
                                placeholder="Podés indicar información adicional sobre el equipo, ubicación o situación actual."
                                class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500"></textarea>

                            @error('observaciones')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    {{-- Acciones --}}
                    <div
                        class="flex flex-col-reverse gap-3 border-t border-gray-200 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-900/30 sm:flex-row sm:justify-end">

                        <a href="{{ route('mis-activos') }}"
                            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                            Cancelar
                        </a>

                     

                        {{-- Registrar activo --}}
                        <button type="button" wire:click="guardar" wire:loading.attr="disabled"
                            wire:target="guardar"
                            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 dark:focus:ring-offset-gray-900">

                            <span wire:loading.remove wire:target="guardar">
                                Registrar activo
                            </span>

                            <span wire:loading wire:target="guardar" class="inline-flex items-center">
                                <svg class="mr-2 h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>

                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>

                                Registrando...
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
