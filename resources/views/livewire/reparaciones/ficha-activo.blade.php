<div class="mx-auto max-w-6xl px-4 py-6">

    {{-- ENCABEZADO --}}
    <div class="mb-6">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

            <div>
                <p class="text-sm font-medium text-blue-400">
                    Ficha del activo
                </p>

                <h1 class="text-2xl font-bold text-white">
                    {{ $activo->categoria?->nombre ?? 'Activo' }}

                    @if ($activo->marca)
                        · {{ $activo->marca }}
                    @endif
                </h1>

                <p class="mt-1 text-sm text-gray-400">
                    {{ $activo->modelo ?? 'Modelo no informado' }}
                </p>
            </div>

            <div>
                <span class="inline-flex items-center rounded-full bg-blue-900/40 px-3 py-1 text-xs font-semibold text-blue-300">
                    {{ ucfirst(str_replace('_', ' ', $activo->estado ?? 'Sin estado')) }}
                </span>
            </div>

        </div>
    </div>


    {{-- DATOS DEL ACTIVO --}}
    <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

        <div class="mb-4">
            <h2 class="text-lg font-bold text-white">
                Datos del activo
            </h2>

            <p class="text-sm text-gray-400">
                Información general y patrimonial del equipo.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

            {{-- IDENTIFICADOR --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Identificador
                </p>

                <p class="mt-1 font-semibold text-white">
                    #{{ $activo->id }}
                </p>
            </div>


            {{-- CATEGORÍA --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Categoría
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->categoria?->nombre ?? '—' }}
                </p>
            </div>


            {{-- MARCA --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Marca
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->marca ?? '—' }}
                </p>
            </div>


            {{-- MODELO --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Modelo
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->modelo ?? '—' }}
                </p>
            </div>


            {{-- NÚMERO DE SERIE --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Número de serie
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->numero_serie ?? '—' }}
                </p>
            </div>


            {{-- CÓDIGO PATRIMONIAL --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Código patrimonial
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->codigo_patrimonial ?? '—' }}
                </p>
            </div>


            {{-- CÓDIGO INTERNO --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Código interno
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->codigo_interno ?? '—' }}
                </p>
            </div>


            {{-- DEPENDENCIA --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Dependencia
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->dependencia?->nombre ?? '—' }}
                </p>
            </div>


            {{-- UBICACIÓN --}}
            <div>
                <p class="text-xs uppercase tracking-wider text-gray-500">
                    Ubicación
                </p>

                <p class="mt-1 font-semibold text-white">
                    {{ $activo->ubicacion?->nombre ?? '—' }}
                </p>
            </div>

        </div>

    </div>


    {{-- OBSERVACIONES --}}
    @if ($activo->observaciones)

        <div class="mt-6 rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

            <h2 class="mb-3 text-lg font-bold text-white">
                Observaciones
            </h2>

            <p class="text-sm leading-relaxed text-gray-300">
                {{ $activo->observaciones }}
            </p>

        </div>

    @endif


    {{-- REPARACIÓN ACTUAL --}}
    @php
        $solicitudActiva = $activo->solicitudesReparacion
            ->filter(function ($solicitud) {
                return in_array($solicitud->estado, [
                    'pendiente',
                    'turnada',
                    'recepcionada',
                    'en_diagnostico',
                    'en_reparacion',
                    'esperando_repuesto',
                    'reparada',
                    'lista_para_retirar',
                ], true);
            })
            ->sortByDesc('created_at')
            ->first();
    @endphp


    @if ($solicitudActiva)

        <div class="mt-6 rounded-xl border border-blue-900/50 bg-gray-800 p-5 shadow-lg">

            {{-- CABECERA --}}
            <div class="mb-5 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

                <div>
                    <h2 class="text-lg font-bold text-white">
                        Reparación actual
                    </h2>

                    <p class="text-sm text-gray-400">
                        Información de la solicitud y del ingreso del equipo.
                    </p>
                </div>

                <span class="inline-flex w-fit items-center rounded-full bg-blue-900/40 px-3 py-1 text-xs font-semibold text-blue-300">
                    {{ ucfirst(str_replace('_', ' ', $solicitudActiva->estado)) }}
                </span>

            </div>


            {{-- DATOS DE LA SOLICITUD --}}
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

                {{-- SOLICITUD --}}
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Solicitud
                    </p>

                    <p class="mt-1 font-semibold text-white">
                        #{{ $solicitudActiva->id }}
                    </p>
                </div>


                {{-- TÍTULO --}}
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Motivo
                    </p>

                    <p class="mt-1 font-semibold text-white">
                        {{ $solicitudActiva->titulo ?? '—' }}
                    </p>
                </div>


                {{-- PRIORIDAD --}}
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Prioridad
                    </p>

                    <p class="mt-1 font-semibold text-white">
                        {{ ucfirst($solicitudActiva->prioridad ?? '—') }}
                    </p>
                </div>


                {{-- SOLICITANTE --}}
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Solicitante
                    </p>

                    <p class="mt-1 font-semibold text-white">
                        {{ $solicitudActiva->usuario?->name ?? '—' }}
                    </p>
                </div>


                {{-- FECHA SOLICITUD --}}
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Solicitud registrada
                    </p>

                    <p class="mt-1 font-semibold text-white">
                        {{ $solicitudActiva->created_at?->format('d/m/Y H:i') ?? '—' }}
                    </p>
                </div>


                {{-- TURNO --}}
                <div>
                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Turno
                    </p>

                    @if ($solicitudActiva->turno)

                        <p class="mt-1 font-semibold text-white">
                            {{ \Carbon\Carbon::parse($solicitudActiva->turno->fecha)->format('d/m/Y') }}
                            ·
                            {{ substr($solicitudActiva->turno->hora, 0, 5) }}
                        </p>

                    @else

                        <p class="mt-1 text-sm text-gray-500">
                            Sin turno registrado.
                        </p>

                    @endif
                </div>

            </div>


            {{-- DESCRIPCIÓN --}}
            @if ($solicitudActiva->descripcion)

                <div class="mt-5 rounded-lg border border-gray-700 bg-gray-900/50 p-4">

                    <p class="text-xs uppercase tracking-wider text-gray-500">
                        Descripción de la falla
                    </p>

                    <p class="mt-2 text-sm leading-relaxed text-gray-300">
                        {{ $solicitudActiva->descripcion }}
                    </p>

                </div>

            @endif


            {{-- RECEPCIÓN --}}
            @if ($solicitudActiva->recepciones->isNotEmpty())

                @php
                    $recepcion = $solicitudActiva->recepciones->sortByDesc('fecha_recepcion')->first();
                    $ticket = $recepcion?->ticket;
                @endphp

                <div class="mt-5 rounded-lg border border-gray-700 bg-gray-900/50 p-4">

                    <div class="mb-4 flex flex-col gap-2 md:flex-row md:items-center md:justify-between">

                        <div>
                            <h3 class="font-semibold text-white">
                                Recepción del equipo
                            </h3>

                            <p class="text-xs text-gray-500">
                                Registro del ingreso físico al Área de Reparaciones.
                            </p>
                        </div>

                        <span class="inline-flex w-fit rounded-full bg-green-900/40 px-3 py-1 text-xs font-semibold text-green-300">
                            Recibido
                        </span>

                    </div>


                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">

                        {{-- FECHA --}}
                        <div>
                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Fecha de recepción
                            </p>

                            <p class="mt-1 font-semibold text-white">
                                {{ $recepcion->fecha_recepcion?->format('d/m/Y H:i') ?? '—' }}
                            </p>
                        </div>


                        {{-- PERSONA QUE ENTREGA --}}
                        <div>
                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Entregado por
                            </p>

                            <p class="mt-1 font-semibold text-white">
                                {{ $recepcion->persona_entrega_nombre ?? '—' }}
                            </p>
                        </div>


                        {{-- TÉCNICO --}}
                        <div>
                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Recibido por
                            </p>

                            <p class="mt-1 font-semibold text-white">
                                {{ $recepcion->recibidoPor?->name ?? '—' }}
                            </p>
                        </div>


                        {{-- ESTADO FÍSICO --}}
                        <div class="md:col-span-2 lg:col-span-3">

                            <p class="text-xs uppercase tracking-wider text-gray-500">
                                Estado físico
                            </p>

                            <p class="mt-1 text-sm text-gray-300">
                                {{ $recepcion->estado_fisico ?? 'No informado.' }}
                            </p>

                        </div>


                        {{-- ACCESORIOS --}}
                        @if ($recepcion->accesorios)

                            <div class="md:col-span-2 lg:col-span-3">

                                <p class="text-xs uppercase tracking-wider text-gray-500">
                                    Accesorios recibidos
                                </p>

                                <p class="mt-1 text-sm text-gray-300">
                                    {{ $recepcion->accesorios }}
                                </p>

                            </div>

                        @endif


                        {{-- OBSERVACIONES RECEPCIÓN --}}
                        @if ($recepcion->observaciones)

                            <div class="md:col-span-2 lg:col-span-3">

                                <p class="text-xs uppercase tracking-wider text-gray-500">
                                    Observaciones de recepción
                                </p>

                                <p class="mt-1 text-sm text-gray-300">
                                    {{ $recepcion->observaciones }}
                                </p>

                            </div>

                        @endif

                    </div>


                    {{-- TICKET --}}
                    <div class="mt-5 border-t border-gray-700 pt-4">

                        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

                            <div>
                                <p class="text-xs uppercase tracking-wider text-gray-500">
                                    Ticket de reparación
                                </p>

                                @if ($ticket)

                                    <p class="mt-1 font-semibold text-white">
                                        {{ $ticket->numero }}
                                    </p>

                                    @if ($ticket->codigo_verificacion)
                                        <p class="mt-1 text-xs text-gray-500">
                                            Código: {{ $ticket->codigo_verificacion }}
                                        </p>
                                    @endif

                                @else

                                    <p class="mt-1 text-sm text-gray-500">
                                        No se ha generado ticket.
                                    </p>

                                @endif
                            </div>


                            @if ($ticket)

                                <div class="flex gap-2">

                                    <a
                                        href="{{ route('reparaciones.ticket.pdf', $ticket) }}"
                                        target="_blank"
                                        class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-blue-500"
                                    >
                                        Ver ticket
                                    </a>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            @endif


            {{-- ACCIONES TÉCNICAS --}}
            <div class="mt-5 rounded-lg border border-blue-900/40 bg-blue-950/20 p-4">

                <div class="mb-3">

                    <h3 class="font-semibold text-white">
                        Acciones técnicas
                    </h3>

                    <p class="text-xs text-gray-500">
                        Acciones disponibles según el estado actual de la reparación.
                    </p>

                </div>


                {{-- RECEPCIONADA --}}
                @if ($solicitudActiva->estado === 'recepcionada')

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <p class="text-sm font-semibold text-white">
                                Equipo recibido
                            </p>

                            <p class="text-xs text-gray-400">
                                El siguiente paso es realizar el diagnóstico técnico.
                            </p>
                        </div>

                        <button
                            type="button"
                            class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500"
                        >
                            Iniciar diagnóstico
                        </button>

                    </div>

                @elseif ($solicitudActiva->estado === 'en_diagnostico')

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <p class="text-sm font-semibold text-white">
                                Diagnóstico en curso
                            </p>

                            <p class="text-xs text-gray-400">
                                El equipo se encuentra en etapa de diagnóstico.
                            </p>
                        </div>

                        <span class="inline-flex w-fit rounded-full bg-purple-900/40 px-3 py-1 text-xs font-semibold text-purple-300">
                            En diagnóstico
                        </span>

                    </div>

                @elseif ($solicitudActiva->estado === 'en_reparacion')

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <p class="text-sm font-semibold text-white">
                                Reparación en curso
                            </p>

                            <p class="text-xs text-gray-400">
                                El equipo se encuentra actualmente en reparación.
                            </p>
                        </div>

                        <span class="inline-flex w-fit rounded-full bg-orange-900/40 px-3 py-1 text-xs font-semibold text-orange-300">
                            En reparación
                        </span>

                    </div>

                @elseif ($solicitudActiva->estado === 'esperando_repuesto')

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <p class="text-sm font-semibold text-white">
                                Esperando repuesto
                            </p>

                            <p class="text-xs text-gray-400">
                                La reparación se encuentra pendiente de un componente o repuesto.
                            </p>
                        </div>

                        <span class="inline-flex w-fit rounded-full bg-red-900/40 px-3 py-1 text-xs font-semibold text-red-300">
                            Esperando repuesto
                        </span>

                    </div>

                @elseif ($solicitudActiva->estado === 'reparada')

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <p class="text-sm font-semibold text-white">
                                Reparación finalizada
                            </p>

                            <p class="text-xs text-gray-400">
                                El equipo fue reparado y está pendiente de pasar a retiro.
                            </p>
                        </div>

                        <span class="inline-flex w-fit rounded-full bg-green-900/40 px-3 py-1 text-xs font-semibold text-green-300">
                            Reparada
                        </span>

                    </div>

                @elseif ($solicitudActiva->estado === 'lista_para_retirar')

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <p class="text-sm font-semibold text-white">
                                Equipo listo para retirar
                            </p>

                            <p class="text-xs text-gray-400">
                                La reparación finalizó y el equipo puede ser entregado.
                            </p>
                        </div>

                        <span class="inline-flex w-fit rounded-full bg-green-900/40 px-3 py-1 text-xs font-semibold text-green-300">
                            Listo para retirar
                        </span>

                    </div>

                @else

                    <p class="text-sm text-gray-400">
                        La solicitud se encuentra en proceso de gestión.
                    </p>

                @endif

            </div>

        </div>

    @endif


    {{-- HISTORIAL DE SOLICITUDES --}}
    <div class="mt-6 rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

        <div class="mb-4">

            <h2 class="text-lg font-bold text-white">
                Historial de solicitudes
            </h2>

            <p class="text-sm text-gray-400">
                Solicitudes de reparación asociadas a este activo.
            </p>

        </div>


        @forelse ($activo->solicitudesReparacion->sortByDesc('created_at') as $solicitud)

            <div class="mb-3 rounded-lg border border-gray-700 bg-gray-900/50 p-4">

                <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">

                    <div>

                        <p class="font-semibold text-white">
                            #{{ $solicitud->id }}
                            · {{ $solicitud->titulo }}
                        </p>

                        <p class="mt-1 text-xs text-gray-400">
                            {{ $solicitud->created_at?->format('d/m/Y H:i') }}
                        </p>

                    </div>


                    <span class="inline-flex w-fit rounded-full bg-gray-700 px-3 py-1 text-xs font-medium text-gray-300">
                        {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                    </span>

                </div>

            </div>

        @empty

            <p class="text-sm text-gray-500">
                Este activo todavía no posee solicitudes de reparación.
            </p>

        @endforelse

    </div>

</div>