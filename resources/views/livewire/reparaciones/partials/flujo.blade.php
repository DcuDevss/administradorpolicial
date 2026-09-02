{{-- ============================================================
     FLUJO DE LA SOLICITUD
============================================================ --}}

<div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

    <div class="mb-4">

        <h2 class="text-lg font-bold text-white">
            Flujo de la solicitud
        </h2>

        <p class="text-sm text-gray-400">
            Seguimiento general del proceso de reparación del activo.
        </p>

    </div>


    @php
        /*
        |--------------------------------------------------------------------------
        | La etapa actual es determinada por SolicitudReparacion.
        |
        | La lógica se encuentra centralizada en:
        | $solicitud->etapa_actual
        |--------------------------------------------------------------------------
        */

        $etapaActual = $solicitud->etapa_actual;
    @endphp


    <div class="overflow-x-auto">

        <div class="flex min-w-[800px] items-center justify-between gap-2">


            {{-- ====================================================
                 1. SOLICITUD
            ===================================================== --}}

            <div class="flex flex-col items-center text-center">

                <div
                    class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_SOLICITUD
                        ? 'bg-blue-600 text-white'
                        : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">

                    1

                </div>

                <span class="mt-2 text-xs font-medium text-gray-400">
                    Solicitud
                </span>

                @if ($solicitud->estado === 'pendiente')
                    <span class="mt-1 text-[10px] text-blue-400">
                        Pendiente
                    </span>
                @endif

            </div>


            <div
                class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_TURNO ? 'bg-blue-600' : 'bg-gray-700' }} h-px flex-1">
            </div>


            {{-- ====================================================
                 2. TURNO
            ===================================================== --}}

            <div class="flex flex-col items-center text-center">

                <div
                    class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_TURNO
                        ? 'bg-blue-600 text-white'
                        : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">

                    2

                </div>

                <span class="mt-2 text-xs font-medium text-gray-400">
                    Turno
                </span>

                @if ($solicitud->turno)
                    <span class="mt-1 text-[10px] text-blue-400">
                        Asignado
                    </span>
                @endif

            </div>


            <div
                class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_RECEPCION ? 'bg-blue-600' : 'bg-gray-700' }} h-px flex-1">
            </div>


            {{-- ====================================================
                 3. RECEPCIÓN
            ===================================================== --}}

            <div class="flex flex-col items-center text-center">

                <div
                    class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_RECEPCION
                        ? 'bg-blue-600 text-white'
                        : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">

                    3

                </div>

                <span class="mt-2 text-xs font-medium text-gray-400">
                    Recepción
                </span>

                @if ($solicitud->estado === 'recepcionada')
                    <span class="mt-1 text-[10px] text-blue-400">
                        Recibido
                    </span>
                @endif

            </div>


            <div
                class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_REPARACION ? 'bg-blue-600' : 'bg-gray-700' }} h-px flex-1">
            </div>


            {{-- ====================================================
                 4. DIAGNÓSTICO / REPARACIÓN
            ===================================================== --}}

            <div class="flex flex-col items-center text-center">

                <div
                    class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_REPARACION
                        ? 'bg-blue-600 text-white'
                        : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">

                    4

                </div>

                <span class="mt-2 text-xs font-medium text-gray-400">
                    Reparación
                </span>


                @if ($solicitud->estado === 'en_diagnostico')
                    <span class="mt-1 text-[10px] text-purple-400">
                        Diagnóstico
                    </span>
                @elseif ($solicitud->estado === 'en_reparacion')
                    <span class="mt-1 text-[10px] text-orange-400">
                        En reparación
                    </span>
                @elseif ($solicitud->estado === 'esperando_repuesto')
                    <span class="mt-1 text-[10px] text-red-400">
                        Esperando repuesto
                    </span>
                @elseif ($solicitud->estado === 'reparada')
                    <span class="mt-1 text-[10px] text-emerald-400">
                        Reparada
                    </span>
                @endif

            </div>


            <div
                class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_ENTREGA ? 'bg-green-600' : 'bg-gray-700' }} h-px flex-1">
            </div>


            {{-- ====================================================
                 5. ENTREGA
            ===================================================== --}}

            <div class="flex flex-col items-center text-center">

                <div
                    class="{{ $etapaActual >= \App\Models\SolicitudReparacion::ETAPA_ENTREGA
                        ? 'bg-green-600 text-white'
                        : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">

                    5

                </div>

                <span class="mt-2 text-xs font-medium text-gray-400">
                    Entrega
                </span>

                @if ($solicitud->estado === 'lista_para_retirar')
                    <span class="mt-1 text-[10px] text-emerald-400">
                        Lista para retirar
                    </span>
                @elseif ($solicitud->estado === 'entregada')
                    <span class="mt-1 text-[10px] text-emerald-400">
                        Entregada
                    </span>
                @endif

            </div>

        </div>

    </div>

</div>
