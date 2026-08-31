<div class="min-h-screen bg-gray-900 px-4 py-6 text-gray-100">

    <div class="mx-auto max-w-7xl">

        {{-- ============================================================
             ENCABEZADO
        ============================================================ --}}
        <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            <div>
                <div class="mb-1 flex items-center gap-2">
                    <a href="{{ url()->previous() }}" class="text-sm text-gray-400 transition hover:text-white">
                        ← Volver
                    </a>
                </div>

                <h1 class="text-2xl font-bold text-white">
                    Detalle de solicitud
                </h1>

                <p class="mt-1 text-sm text-gray-400">
                    Gestión de la solicitud de reparación y asignación de turno.
                </p>
            </div>

            <div class="flex items-center gap-2">

                <span
                    class="@switch($solicitud->estado)
                        @case('pendiente')
                            bg-yellow-900/40 text-yellow-300
                            @break

                        @case('turnada')
                            bg-blue-900/40 text-blue-300
                            @break

                        @case('recepcionada')
                            bg-indigo-900/40 text-indigo-300
                            @break

                        @case('en_diagnostico')
                            bg-purple-900/40 text-purple-300
                            @break

                        @case('en_reparacion')
                            bg-orange-900/40 text-orange-300
                            @break

                        @case('esperando_repuesto')
                            bg-red-900/40 text-red-300
                            @break

                        @case('reparada')
                            bg-green-900/40 text-green-300
                            @break

                        @case('lista_para_retirar')
                            bg-emerald-900/40 text-emerald-300
                            @break

                        @case('entregada')
                            bg-gray-700 text-gray-300
                            @break

                        @case('cancelada')
                            bg-red-900/40 text-red-300
                            @break

                        @default
                            bg-gray-700 text-gray-300
                    @endswitch inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold">
                    Estado:
                    {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                </span>

            </div>

        </div>


        {{-- ============================================================
             MENSAJE DE ÉXITO
        ============================================================ --}}
        @if (session()->has('success'))
            <div class="mb-6 rounded-lg border border-green-700/50 bg-green-900/30 px-4 py-3 text-sm text-green-300">
                <div class="flex items-center gap-2">
                    <span class="text-lg">✓</span>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        @endif


        {{-- ============================================================
             ERROR GENERAL
        ============================================================ --}}
        @error('general')
            <div class="mb-6 rounded-lg border border-red-700/50 bg-red-900/30 px-4 py-3 text-sm text-red-300">
                {{ $message }}
            </div>
        @enderror


        {{-- ============================================================
             INFORMACIÓN PRINCIPAL
        ============================================================ --}}
        <div class="mb-6 grid gap-6 lg:grid-cols-3">

            {{-- --------------------------------------------------------
                 SOLICITUD
            --------------------------------------------------------- --}}
            <div class="rounded-xl border border-gray-700 bg-gray-800 shadow-lg lg:col-span-2">

                <div class="border-b border-gray-700 px-5 py-4">

                    <div class="flex items-center justify-between">

                        <div>
                            <h2 class="text-lg font-bold text-white">
                                Solicitud #{{ $solicitud->id }}
                            </h2>

                            <p class="text-xs text-gray-400">
                                Información de la solicitud de reparación
                            </p>
                        </div>

                        <div class="rounded-lg bg-gray-900 px-3 py-2 text-xs text-gray-400">
                            {{ $solicitud->created_at
                                ? $solicitud->created_at->tz('America/Argentina/Buenos_Aires')->format('d/m/Y H:i')
                                : '-' }}
                        </div>

                    </div>

                </div>


                <div class="grid gap-5 p-5 md:grid-cols-2">

                    {{-- TÍTULO --}}
                    <div class="md:col-span-2">

                        <div class="mb-1 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Motivo / título
                        </div>

                        <div class="text-base font-semibold text-white">
                            {{ $solicitud->titulo }}
                        </div>

                    </div>


                    {{-- PRIORIDAD --}}
                    <div>

                        <div class="mb-1 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Prioridad
                        </div>

                        <span
                            class="@switch($solicitud->prioridad)
                                @case('urgente')
                                    bg-red-900/50 text-red-300
                                    @break

                                @case('alta')
                                    bg-orange-900/50 text-orange-300
                                    @break

                                @case('media')
                                    bg-yellow-900/50 text-yellow-300
                                    @break

                                @default
                                    bg-green-900/50 text-green-300
                            @endswitch inline-flex rounded-full px-3 py-1 text-xs font-bold uppercase">
                            {{ $solicitud->prioridad }}
                        </span>

                    </div>


                    {{-- SOLICITANTE --}}
                    <div>

                        <div class="mb-1 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Solicitante
                        </div>

                        <div class="text-sm font-semibold text-white">
                            {{ $solicitud->usuario->name ?? 'Sin información' }}
                        </div>

                    </div>


                    {{-- DESCRIPCIÓN --}}
                    <div class="md:col-span-2">

                        <div class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Descripción de la falla
                        </div>

                        <div
                            class="rounded-lg border border-gray-700 bg-gray-900 p-4 text-sm leading-relaxed text-gray-300">
                            {{ $solicitud->descripcion }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- --------------------------------------------------------
                 ACTIVO
            --------------------------------------------------------- --}}
            <div class="rounded-xl border border-gray-700 bg-gray-800 shadow-lg">

                <div class="border-b border-gray-700 px-5 py-4">

                    <h2 class="text-lg font-bold text-white">
                        Activo
                    </h2>

                    <p class="text-xs text-gray-400">
                        Equipo asociado a la solicitud
                    </p>

                </div>


                <div class="space-y-4 p-5">

                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Tipo
                        </div>

                        <div class="mt-1 text-sm font-semibold text-white">
                            {{ $solicitud->activo->categoria->nombre ?? 'Sin categoría' }}
                        </div>
                    </div>


                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Marca / modelo
                        </div>

                        <div class="mt-1 text-sm text-gray-200">
                            {{ $solicitud->activo->marca ?? 'Sin marca' }}

                            @if (!empty($solicitud->activo->modelo))
                                / {{ $solicitud->activo->modelo }}
                            @endif
                        </div>
                    </div>


                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Número de serie
                        </div>

                        <div class="mt-1 font-mono text-sm text-gray-300">
                            {{ $solicitud->activo->numero_serie ?? 'Sin número de serie' }}
                        </div>
                    </div>


                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Dependencia
                        </div>

                        <div class="mt-1 text-sm font-semibold text-white">
                            {{ $solicitud->activo->dependencia->nombre ?? ($solicitud->activo->dependencia->name ?? 'Sin dependencia') }}
                        </div>
                    </div>


                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Ubicación
                        </div>

                        <div class="mt-1 text-sm text-gray-300">
                            {{ $solicitud->activo->ubicacion->nombre ?? 'Sin ubicación' }}
                        </div>
                    </div>

                </div>

            </div>

        </div>


        {{-- ============================================================
             TURNO ACTUAL
        ============================================================ --}}
        @if ($solicitud->turno)
            <div class="mb-6 rounded-xl border border-blue-700/50 bg-blue-900/20 shadow-lg">

                <div class="border-b border-blue-700/40 px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600/30 text-xl">
                            📅
                        </div>

                        <div>
                            <h2 class="text-lg font-bold text-white">
                                Turno asignado
                            </h2>

                            <p class="text-xs text-blue-300">
                                La solicitud ya posee un turno de reparación.
                            </p>
                        </div>

                    </div>

                </div>


                <div class="grid gap-5 p-5 md:grid-cols-4">

                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Fecha
                        </div>

                        <div class="mt-1 text-sm font-bold text-white">
                            {{ $solicitud->turno->fecha ? $solicitud->turno->fecha->format('d/m/Y') : '-' }}
                        </div>
                    </div>


                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Hora
                        </div>

                        <div class="mt-1 text-sm font-bold text-white">
                            {{ \Carbon\Carbon::parse($solicitud->turno->hora)->format('H:i') }}
                        </div>
                    </div>


                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Estado
                        </div>

                        <div class="mt-1">

                            <span class="rounded-full bg-blue-900/50 px-3 py-1 text-xs font-semibold text-blue-300">
                                {{ ucfirst($solicitud->turno->estado) }}
                            </span>

                        </div>
                    </div>


                    <div>
                        <div class="text-xs uppercase tracking-wider text-gray-500">
                            Observaciones
                        </div>

                        <div class="mt-1 text-sm text-gray-300">
                            {{ $solicitud->turno->observaciones ?? 'Sin observaciones' }}
                        </div>
                    </div>

                </div>

            </div>
        @endif


        {{-- ============================================================
             ESTADO OPERATIVO DEL ÁREA
        ============================================================ --}}
        <div class="mb-6">

            <div class="mb-3">

                <h2 class="text-lg font-bold text-white">
                    Situación del Área de Reparaciones
                </h2>

                <p class="text-sm text-gray-400">
                    Estado actual de las solicitudes y equipos.
                </p>

            </div>


            <div class="grid grid-cols-2 gap-3 md:grid-cols-3 xl:grid-cols-6">

                {{-- TURNADAS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-blue-400">
                        {{ $resumenOcupacion['turnadas'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Turnadas
                    </div>

                </div>


                {{-- RECEPCIONADAS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-indigo-400">
                        {{ $resumenOcupacion['recepcionadas'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Recepcionadas
                    </div>

                </div>


                {{-- DIAGNÓSTICO --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-purple-400">
                        {{ $resumenOcupacion['diagnostico'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Diagnóstico
                    </div>

                </div>


                {{-- REPARACIÓN --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-orange-400">
                        {{ $resumenOcupacion['reparacion'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        En reparación
                    </div>

                </div>


                {{-- REPUESTOS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-red-400">
                        {{ $resumenOcupacion['esperando_repuesto'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Esperando repuesto
                    </div>

                </div>


                {{-- LISTOS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-emerald-400">
                        {{ $resumenOcupacion['listas_retirar'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Listos para retirar
                    </div>

                </div>

            </div>

        </div>
        {{-- ============================================================
                TURNO / RECEPCIÓN
            ============================================================ --}}

        @if ($solicitud->turno)

            {{-- ========================================================
                TURNO ASIGNADO
            ========================================================= --}}

            <div class="mb-6 rounded-xl border border-blue-700/50 bg-blue-900/20 p-5">

                <div class="mb-4 flex items-center justify-between">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-600 text-xl">
                            📅
                        </div>

                        <div>
                            <h2 class="text-lg font-bold text-white">
                                Turno asignado
                            </h2>

                            <p class="text-sm text-gray-400">
                                La solicitud tiene un turno confirmado.
                            </p>
                        </div>

                    </div>

                    <span class="rounded-full bg-blue-600/20 px-3 py-1 text-xs font-semibold text-blue-400">
                        {{ ucfirst($solicitud->turno->estado) }}
                    </span>

                </div>


                {{-- DATOS DEL TURNO --}}

                <div class="grid gap-4 md:grid-cols-3">

                    <div class="rounded-lg border border-gray-700 bg-gray-900/60 p-4">

                        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Fecha
                        </div>

                        <div class="mt-1 text-sm font-semibold text-white">
                            {{ $solicitud->turno->fecha->format('d/m/Y') }}
                        </div>

                    </div>


                    <div class="rounded-lg border border-gray-700 bg-gray-900/60 p-4">

                        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Hora
                        </div>

                        <div class="mt-1 text-sm font-semibold text-white">
                            {{ \Carbon\Carbon::parse($solicitud->turno->hora)->format('H:i') }}
                        </div>

                    </div>


                    <div class="rounded-lg border border-gray-700 bg-gray-900/60 p-4">

                        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Estado de solicitud
                        </div>

                        <div class="mt-1 text-sm font-semibold text-blue-400">
                            {{ ucfirst($solicitud->estado) }}
                        </div>

                    </div>

                </div>


                {{-- OBSERVACIONES DEL TURNO --}}

                @if ($solicitud->turno->observaciones)
                    <div class="mt-4 rounded-lg border border-gray-700 bg-gray-900/60 p-4">

                        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Observaciones
                        </div>

                        <div class="mt-1 text-sm text-gray-300">
                            {{ $solicitud->turno->observaciones }}
                        </div>

                    </div>
                @endif

            </div>


            {{-- ========================================================
                RECEPCIÓN DEL EQUIPO
            ========================================================= --}}

            @livewire('reparaciones.registrar-recepcion', ['solicitud' => $solicitud], key('recepcion-' . $solicitud->id))
        @else
            {{-- ========================================================
                SIN TURNO
            ========================================================= --}}

            @if (!in_array($solicitud->estado, ['cancelada', 'cerrada', 'rechazada'], true))
                <div class="mb-6 flex justify-end">

                    <button wire:click="abrirTurno" type="button"
                        class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900">

                        <span class="text-lg">
                            📅
                        </span>

                        Asignar turno

                    </button>

                </div>
            @endif

        @endif


        {{-- ============================================================
             AGENDA
        ============================================================ --}}
        @if ($mostrarTurno)

            <div class="mb-6 overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-2xl">

                {{-- CABECERA --}}
                <div class="border-b border-gray-700 bg-gray-800 px-5 py-4">

                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

                        <div>

                            <h2 class="text-xl font-bold text-white">
                                Agenda de Reparaciones
                            </h2>

                            <p class="mt-1 text-sm text-gray-400">
                                Seleccione la fecha y horario para recibir el equipo.
                            </p>

                        </div>

                        <button wire:click="cerrarTurno" type="button"
                            class="rounded-lg px-3 py-2 text-sm text-gray-400 transition hover:bg-gray-700 hover:text-white">
                            ✕ Cerrar
                        </button>

                    </div>

                </div>


                <div class="grid gap-6 p-5 lg:grid-cols-3">

                    {{-- =================================================
                         CALENDARIO / FECHA
                    ================================================== --}}
                    <div class="lg:col-span-2">

                        <div class="mb-4">

                            <label for="fechaAgenda" class="mb-2 block text-sm font-semibold text-gray-300">
                                Fecha de agenda
                            </label>

                            <input id="fechaAgenda" type="date" wire:model.live="fechaAgenda"
                                wire:change="seleccionarFecha($event.target.value)"
                                min="{{ now()->format('Y-m-d') }}"
                                class="w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 md:max-w-xs">

                        </div>


                        {{-- TURNOS DEL DÍA --}}
                        <div>

                            <div class="mb-3 flex items-center justify-between">

                                <div>
                                    <h3 class="text-sm font-bold uppercase tracking-wider text-gray-300">
                                        Turnos del día
                                    </h3>

                                    <p class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($fechaAgenda)->format('d/m/Y') }}
                                    </p>
                                </div>

                                <span class="rounded-full bg-gray-700 px-3 py-1 text-xs font-semibold text-gray-300">
                                    {{ $turnosDelDia->count() }} turno(s)
                                </span>

                            </div>


                            @if ($turnosDelDia->count())

                                <div class="space-y-2">

                                    @foreach ($turnosDelDia as $turno)
                                        <div class="rounded-lg border border-gray-700 bg-gray-900 p-3">

                                            <div
                                                class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                                                <div class="flex items-center gap-3">

                                                    <div
                                                        class="flex min-w-[70px] items-center justify-center rounded-lg bg-blue-900/40 px-3 py-2 text-sm font-bold text-blue-300">
                                                        {{ \Carbon\Carbon::parse($turno->hora)->format('H:i') }}
                                                    </div>

                                                    <div>

                                                        <div class="text-sm font-semibold text-white">
                                                            {{ $turno->solicitud->activo->categoria->nombre ?? 'Activo' }}
                                                        </div>

                                                        <div class="text-xs text-gray-400">

                                                            {{ $turno->solicitud->activo->dependencia->nombre ??
                                                                ($turno->solicitud->activo->dependencia->name ?? 'Sin dependencia') }}

                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="text-right">

                                                    <div class="text-xs text-gray-500">
                                                        Solicitud #{{ $turno->solicitud_id }}
                                                    </div>

                                                    <span class="text-xs font-semibold text-blue-400">
                                                        {{ ucfirst($turno->estado) }}
                                                    </span>

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>
                            @else
                                <div
                                    class="rounded-lg border border-dashed border-gray-700 bg-gray-900 px-5 py-8 text-center">

                                    <div class="mb-2 text-3xl">
                                        📅
                                    </div>

                                    <p class="text-sm font-semibold text-gray-300">
                                        No hay turnos registrados para este día.
                                    </p>

                                    <p class="mt-1 text-xs text-gray-500">
                                        Puede asignar este horario sin restricciones de cantidad.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- =================================================
                         FORMULARIO
                    ================================================== --}}
                    <div class="rounded-xl border border-gray-700 bg-gray-900 p-5">

                        <div class="mb-5">

                            <h3 class="text-lg font-bold text-white">
                                Nuevo turno
                            </h3>

                            <p class="mt-1 text-xs text-gray-500">
                                Para la solicitud #{{ $solicitud->id }}
                            </p>

                        </div>


                        {{-- FECHA --}}
                        <div class="mb-4">

                            <label for="fecha" class="mb-2 block text-sm font-medium text-gray-300">
                                Fecha
                            </label>

                            <input id="fecha" type="date" wire:model="fecha"
                                min="{{ now()->format('Y-m-d') }}"
                                class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">

                            @error('fecha')
                                <p class="mt-1 text-xs text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- HORA --}}
                        <div class="mb-4">

                            <label for="hora" class="mb-2 block text-sm font-medium text-gray-300">
                                Hora
                            </label>

                            <input id="hora" type="time" wire:model="hora"
                                class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">

                            @error('hora')
                                <p class="mt-1 text-xs text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- OBSERVACIONES --}}
                        <div class="mb-5">

                            <label for="observaciones" class="mb-2 block text-sm font-medium text-gray-300">
                                Observaciones
                            </label>

                            <textarea id="observaciones" wire:model="observaciones" rows="4" maxlength="1000"
                                class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                                placeholder="Observaciones relacionadas con la recepción..."></textarea>

                            @error('observaciones')
                                <p class="mt-1 text-xs text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- INFORMACIÓN --}}
                        <div class="mb-5 rounded-lg border border-blue-800/40 bg-blue-900/20 p-3">

                            <div class="flex gap-2">

                                <span class="text-blue-400">
                                    ℹ
                                </span>

                                <p class="text-xs leading-relaxed text-blue-300">
                                    Los turnos organizan la recepción de los equipos.
                                    La existencia de otros turnos en el mismo horario
                                    no impide asignar uno nuevo.
                                </p>

                            </div>

                        </div>


                        {{-- BOTONES --}}
                        <div class="flex flex-col gap-2">

                            <button wire:click="asignarTurno" wire:loading.attr="disabled" type="button"
                                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-500 disabled:cursor-not-allowed disabled:opacity-50">

                                <span wire:loading.remove wire:target="asignarTurno">
                                    Confirmar turno
                                </span>

                                <span wire:loading wire:target="asignarTurno">
                                    Asignando...
                                </span>

                            </button>


                            <button wire:click="cerrarTurno" type="button"
                                class="rounded-lg px-4 py-3 text-sm font-semibold text-gray-400 transition hover:bg-gray-700 hover:text-white">
                                Cancelar
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        @endif
        @php
            $recepcion = $solicitud->recepciones->first();
            $ticket = $recepcion?->ticket;
        @endphp
        @if ($recepcion && !$ticket)
            <div class="mt-4 flex flex-wrap gap-3">

                <button type="button" wire:click="generarTicket" wire:loading.attr="disabled"
                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-500 disabled:opacity-50">

                    <span wire:loading.remove wire:target="generarTicket">
                        🎫 Generar ticket
                    </span>

                    <span wire:loading wire:target="generarTicket">
                        Generando...
                    </span>

                </button>

            </div>
        @endif

        @if (!$ticket)
            <div class="mt-4 flex flex-wrap gap-3">

                <a href="{{ route('reparaciones.ticket.imprimir', $ticket) }}" target="_blank"
                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-500">

                    🖨️ Imprimir ticket

                </a>

            </div>
        @endif

        {{-- ============================================================
             INFORMACIÓN DEL FLUJO
        ============================================================ --}}
        <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

            <div class="mb-4">

                <h2 class="text-lg font-bold text-white">
                    Flujo de la solicitud
                </h2>

                <p class="text-sm text-gray-400">
                    Seguimiento general del proceso de reparación.
                </p>

            </div>


            <div class="overflow-x-auto">

                <div class="flex min-w-[800px] items-center justify-between gap-2">

                    {{-- SOLICITUD --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, [
                                'pendiente',
                                'turnada',
                                'recepcionada',
                                'en_diagnostico',
                                'en_reparacion',
                                'esperando_repuesto',
                                'reparada',
                                'lista_para_retirar',
                                'entregada',
                            ])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            1
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Solicitud
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- TURNO --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ $solicitud->turno ||
                            in_array($solicitud->estado, [
                                'turnada',
                                'recepcionada',
                                'en_diagnostico',
                                'en_reparacion',
                                'esperando_repuesto',
                                'reparada',
                                'lista_para_retirar',
                                'entregada',
                            ])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            2
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Turno
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- RECEPCIÓN --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, [
                                'recepcionada',
                                'en_diagnostico',
                                'en_reparacion',
                                'esperando_repuesto',
                                'reparada',
                                'lista_para_retirar',
                                'entregada',
                            ])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            3
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Recepción
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- REPARACIÓN --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, ['en_diagnostico', 'en_reparacion', 'esperando_repuesto', 'reparada'])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            4
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Reparación
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- ENTREGA --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, ['lista_para_retirar', 'entregada'])
                                ? 'bg-green-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            5
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Entrega
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
