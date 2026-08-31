<div class="min-h-screen bg-gray-950 px-4 py-6 text-white sm:px-6 lg:px-8">

    <div class="mx-auto max-w-6xl">

        {{-- MENSAJE DE ÉXITO --}}
        @if (session()->has('success'))
            <div
                class="mb-5 flex items-center gap-3 rounded-lg border border-green-700/50 bg-green-900/30 px-4 py-3 text-sm text-green-300"
            >
                <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />
                </svg>

                <span>{{ session('success') }}</span>
            </div>
        @endif


        {{-- ERRORES GENERALES --}}
        @error('general')
            <div
                class="mb-5 rounded-lg border border-red-700/50 bg-red-900/30 px-4 py-3 text-sm text-red-300"
            >
                {{ $message }}
            </div>
        @enderror


        {{-- ENCABEZADO --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <div class="mb-1 text-xs font-semibold uppercase tracking-[0.2em] text-blue-400">
                    Área de Reparaciones
                </div>

                <h1 class="text-2xl font-bold text-white">
                    Solicitud de reparación #{{ $solicitud->id }}
                </h1>

                <p class="mt-1 text-sm text-gray-400">
                    Detalle y gestión de la solicitud.
                </p>
            </div>

            <a
                href="{{ url()->previous() }}"
                class="inline-flex items-center justify-center rounded-lg border border-gray-700 bg-gray-800 px-4 py-2 text-sm font-semibold text-gray-200 transition hover:bg-gray-700"
            >
                ← Volver
            </a>

        </div>


        {{-- INFORMACIÓN PRINCIPAL --}}
        <div class="grid gap-5 lg:grid-cols-3">

            {{-- SOLICITUD --}}
            <div class="lg:col-span-2">

                <div class="overflow-hidden rounded-xl border border-gray-800 bg-gray-900 shadow-xl">

                    <div class="border-b border-gray-800 px-5 py-4">

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                            <div>
                                <h2 class="text-lg font-bold text-white">
                                    {{ $solicitud->titulo }}
                                </h2>

                                <p class="mt-1 text-xs text-gray-500">
                                    Registrada el
                                    {{ $solicitud->created_at
                                        ->tz('America/Argentina/Buenos_Aires')
                                        ->format('d/m/Y H:i:s') }}
                                </p>
                            </div>

                            {{-- ESTADO --}}
                            @php
                                $estadoClasses = match ($solicitud->estado) {
                                    'pendiente' => 'bg-yellow-900/40 text-yellow-300 border-yellow-700/40',
                                    'en_evaluacion' => 'bg-blue-900/40 text-blue-300 border-blue-700/40',
                                    'aprobada' => 'bg-green-900/40 text-green-300 border-green-700/40',
                                    'rechazada' => 'bg-red-900/40 text-red-300 border-red-700/40',
                                    'turnada' => 'bg-indigo-900/40 text-indigo-300 border-indigo-700/40',
                                    'cancelada' => 'bg-gray-800 text-gray-400 border-gray-700',
                                    'cerrada' => 'bg-gray-800 text-gray-400 border-gray-700',
                                    default => 'bg-gray-800 text-gray-300 border-gray-700',
                                };
                            @endphp

                            <span
                                class="inline-flex w-fit items-center rounded-full border px-3 py-1 text-xs font-bold uppercase {{ $estadoClasses }}"
                            >
                                {{ str_replace('_', ' ', $solicitud->estado) }}
                            </span>

                        </div>

                    </div>


                    <div class="space-y-6 p-5">

                        {{-- ACTIVO --}}
                        <div>

                            <div class="mb-3 text-xs font-bold uppercase tracking-wider text-gray-500">
                                Activo
                            </div>

                            <div class="rounded-lg border border-gray-800 bg-gray-950 p-4">

                                <div class="grid gap-4 sm:grid-cols-2">

                                    <div>
                                        <div class="text-xs text-gray-500">
                                            Identificación
                                        </div>

                                        <div class="mt-1 font-semibold text-white">
                                            {{ $solicitud->activo->codigo_interno
                                                ?? $solicitud->activo->codigo_patrimonial
                                                ?? 'Sin código' }}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">
                                            Tipo
                                        </div>

                                        <div class="mt-1 font-semibold text-white">
                                            {{ $solicitud->activo->categoria->nombre ?? 'Sin categoría' }}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">
                                            Marca / Modelo
                                        </div>

                                        <div class="mt-1 font-semibold text-white">
                                            {{ $solicitud->activo->marca ?? '—' }}
                                            {{ $solicitud->activo->modelo ?? '' }}
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-xs text-gray-500">
                                            Número de serie
                                        </div>

                                        <div class="mt-1 font-semibold text-white">
                                            {{ $solicitud->activo->numero_serie ?? '—' }}
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- SOLICITANTE --}}
                        <div>

                            <div class="mb-3 text-xs font-bold uppercase tracking-wider text-gray-500">
                                Solicitante
                            </div>

                            <div class="rounded-lg border border-gray-800 bg-gray-950 p-4">

                                <div class="font-semibold text-white">
                                    {{ $solicitud->usuario->name ?? 'Usuario no disponible' }}
                                </div>

                                @if ($solicitud->activo->dependencia)
                                    <div class="mt-1 text-sm text-gray-400">
                                        {{ $solicitud->activo->dependencia->nombre
                                            ?? $solicitud->activo->dependencia->name
                                            ?? 'Dependencia no disponible' }}
                                    </div>
                                @endif

                            </div>

                        </div>


                        {{-- PRIORIDAD --}}
                        <div>

                            <div class="mb-3 text-xs font-bold uppercase tracking-wider text-gray-500">
                                Prioridad
                            </div>

                            @php
                                $prioridadClasses = match ($solicitud->prioridad) {
                                    'baja' => 'bg-gray-800 text-gray-300',
                                    'normal', 'media' => 'bg-blue-900/40 text-blue-300',
                                    'alta' => 'bg-orange-900/40 text-orange-300',
                                    'critica', 'urgente' => 'bg-red-900/40 text-red-300',
                                    default => 'bg-gray-800 text-gray-300',
                                };
                            @endphp

                            <span
                                class="inline-flex rounded-full px-3 py-1 text-xs font-bold uppercase {{ $prioridadClasses }}"
                            >
                                {{ $solicitud->prioridad }}
                            </span>

                        </div>


                        {{-- DESCRIPCIÓN --}}
                        <div>

                            <div class="mb-2 text-xs font-bold uppercase tracking-wider text-gray-500">
                                Descripción del problema
                            </div>

                            <div class="whitespace-pre-wrap rounded-lg border border-gray-800 bg-gray-950 p-4 text-sm leading-relaxed text-gray-300">
                                {{ $solicitud->descripcion }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- PANEL DE TURNO --}}
            <div>

                <div class="overflow-hidden rounded-xl border border-gray-800 bg-gray-900 shadow-xl">

                    <div class="border-b border-gray-800 px-5 py-4">

                        <div class="text-xs font-bold uppercase tracking-wider text-blue-400">
                            Gestión del turno
                        </div>

                        <h2 class="mt-1 text-lg font-bold text-white">
                            Turno de reparación
                        </h2>

                    </div>


                    <div class="p-5">

                        @if ($solicitud->turno)

                            {{-- TURNO EXISTENTE --}}
                            <div class="space-y-4">

                                <div
                                    class="rounded-lg border border-indigo-700/40 bg-indigo-900/20 p-4"
                                >

                                    <div class="mb-3 flex items-center justify-between">

                                        <span class="text-xs font-bold uppercase tracking-wider text-gray-500">
                                            Estado
                                        </span>

                                        <span
                                            class="rounded-full border border-green-700/40 bg-green-900/30 px-3 py-1 text-xs font-bold uppercase text-green-300"
                                        >
                                            {{ str_replace('_', ' ', $solicitud->turno->estado) }}
                                        </span>

                                    </div>


                                    <div class="grid grid-cols-2 gap-4">

                                        <div>

                                            <div class="text-xs text-gray-500">
                                                Fecha
                                            </div>

                                            <div class="mt-1 font-bold text-white">
                                                {{ $solicitud->turno->fecha->format('d/m/Y') }}
                                            </div>

                                        </div>


                                        <div>

                                            <div class="text-xs text-gray-500">
                                                Hora
                                            </div>

                                            <div class="mt-1 font-bold text-white">
                                                {{ substr($solicitud->turno->hora, 0, 5) }}
                                            </div>

                                        </div>

                                    </div>

                                </div>


                                @if ($solicitud->turno->observaciones)

                                    <div>

                                        <div class="mb-1 text-xs font-bold uppercase tracking-wider text-gray-500">
                                            Observaciones
                                        </div>

                                        <div class="rounded-lg border border-gray-800 bg-gray-950 p-3 text-sm text-gray-300">
                                            {{ $solicitud->turno->observaciones }}
                                        </div>

                                    </div>

                                @endif


                                <div class="rounded-lg border border-gray-800 bg-gray-950 p-3 text-xs text-gray-400">
                                    La solicitud ya posee un turno asignado.
                                </div>

                            </div>

                        @else

                            {{-- SIN TURNO --}}
                            <div class="text-center">

                                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-blue-900/30 text-blue-400">

                                    <svg
                                        class="h-7 w-7"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        />
                                    </svg>

                                </div>

                                <h3 class="font-bold text-white">
                                    Sin turno asignado
                                </h3>

                                <p class="mt-1 text-sm leading-relaxed text-gray-400">
                                    Esta solicitud todavía no tiene un turno programado.
                                </p>


                                @if (!in_array($solicitud->estado, ['cancelada', 'cerrada', 'rechazada'], true))

                                    <button
                                        type="button"
                                        wire:click="abrirTurno"
                                        class="mt-5 inline-flex w-full items-center justify-center rounded-lg bg-blue-600 px-4 py-3 text-sm font-bold text-white transition hover:bg-blue-500"
                                    >
                                        Asignar turno
                                    </button>

                                @endif

                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- MODAL ASIGNAR TURNO --}}
        @if ($mostrarTurno)

            <div
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 px-4 backdrop-blur-sm"
                wire:key="modal-asignar-turno"
            >

                <div
                    class="w-full max-w-lg overflow-hidden rounded-xl border border-gray-700 bg-gray-900 shadow-2xl"
                    wire:click.stop
                >

                    {{-- CABECERA --}}
                    <div class="flex items-center justify-between border-b border-gray-800 px-5 py-4">

                        <div>

                            <h2 class="text-lg font-bold text-white">
                                Asignar turno
                            </h2>

                            <p class="mt-1 text-xs text-gray-400">
                                Solicitud #{{ $solicitud->id }}
                            </p>

                        </div>

                        <button
                            type="button"
                            wire:click="cerrarTurno"
                            class="rounded-lg p-2 text-gray-400 transition hover:bg-gray-800 hover:text-white"
                        >
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>

                    </div>


                    {{-- FORMULARIO --}}
                    <div class="space-y-5 p-5">

                        {{-- FECHA --}}
                        <div>

                            <label
                                for="fecha"
                                class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-400"
                            >
                                Fecha
                            </label>

                            <input
                                id="fecha"
                                type="date"
                                wire:model="fecha"
                                min="{{ now()->format('Y-m-d') }}"
                                class="w-full rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                            >

                            @error('fecha')
                                <span class="mt-1 block text-xs text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- HORA --}}
                        <div>

                            <label
                                for="hora"
                                class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-400"
                            >
                                Hora
                            </label>

                            <input
                                id="hora"
                                type="time"
                                wire:model="hora"
                                class="w-full rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                            >

                            @error('hora')
                                <span class="mt-1 block text-xs text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- OBSERVACIONES --}}
                        <div>

                            <label
                                for="observaciones"
                                class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-400"
                            >
                                Observaciones
                            </label>

                            <textarea
                                id="observaciones"
                                wire:model="observaciones"
                                rows="4"
                                maxlength="1000"
                                placeholder="Observaciones relacionadas con el turno..."
                                class="w-full resize-none rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-sm text-white placeholder-gray-600 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                            ></textarea>

                            @error('observaciones')
                                <span class="mt-1 block text-xs text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>

                    </div>


                    {{-- ACCIONES --}}
                    <div class="flex flex-col-reverse gap-3 border-t border-gray-800 px-5 py-4 sm:flex-row sm:justify-end">

                        <button
                            type="button"
                            wire:click="cerrarTurno"
                            class="rounded-lg border border-gray-700 bg-gray-800 px-5 py-2.5 text-sm font-semibold text-gray-300 transition hover:bg-gray-700"
                        >
                            Cancelar
                        </button>

                        <button
                            type="button"
                            wire:click="asignarTurno"
                            wire:loading.attr="disabled"
                            wire:target="asignarTurno"
                            class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-bold text-white transition hover:bg-blue-500 disabled:cursor-not-allowed disabled:opacity-50"
                        >
                            <span wire:loading.remove wire:target="asignarTurno">
                                Confirmar turno
                            </span>

                            <span wire:loading wire:target="asignarTurno">
                                Guardando...
                            </span>
                        </button>

                    </div>

                </div>

            </div>

        @endif

    </div>

</div>