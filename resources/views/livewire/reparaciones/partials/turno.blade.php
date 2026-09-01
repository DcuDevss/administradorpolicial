{{-- ============================================================
TURNO / ASIGNACIÓN DE TURNO
============================================================ --}}

@if ($solicitud->turno)


    {{-- ========================================================
     TURNO YA ASIGNADO
========================================================= --}}
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


        {{-- ====================================================
         DATOS DEL TURNO
    ===================================================== --}}
        <div class="grid gap-5 p-5 md:grid-cols-4">

            {{-- FECHA --}}
            <div>

                <div class="text-xs uppercase tracking-wider text-gray-500">
                    Fecha
                </div>

                <div class="mt-1 text-sm font-bold text-white">

                    {{ $solicitud->turno->fecha ? $solicitud->turno->fecha->format('d/m/Y') : '-' }}

                </div>

            </div>


            {{-- HORA --}}
            <div>

                <div class="text-xs uppercase tracking-wider text-gray-500">
                    Hora
                </div>

                <div class="mt-1 text-sm font-bold text-white">

                    {{ $solicitud->turno->hora ? \Carbon\Carbon::parse($solicitud->turno->hora)->format('H:i') : '-' }}

                </div>

            </div>


            {{-- ESTADO --}}
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


            {{-- OBSERVACIONES --}}
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
@else
    {{-- ========================================================
     SIN TURNO
========================================================= --}}
    @if (!$mostrarTurno && !in_array($solicitud->estado, ['cancelada', 'cerrada', 'rechazada'], true))
        <div class="mb-6 rounded-xl border border-yellow-700/50 bg-yellow-900/20 shadow-lg">

            <div class="flex flex-col gap-4 px-5 py-5 md:flex-row md:items-center md:justify-between">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-yellow-600/30 text-xl">
                        📅
                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-white">
                            Turno pendiente
                        </h2>

                        <p class="text-xs text-yellow-300">
                            Esta solicitud todavía no tiene un turno asignado.
                        </p>

                    </div>

                </div>


                {{-- =================================================
                 ACCIÓN
            ================================================== --}}
                <button type="button" wire:click="abrirTurno" wire:loading.attr="disabled"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 disabled:cursor-not-allowed disabled:opacity-50">

                    <span wire:loading.remove wire:target="abrirTurno">
                        📅 Asignar turno
                    </span>

                    <span wire:loading wire:target="abrirTurno">
                        Abriendo agenda...
                    </span>

                </button>

            </div>

        </div>
    @endif


@endif
