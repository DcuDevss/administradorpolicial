<div>

    {{-- ============================================================
         ENCABEZADO
    ============================================================ --}}

    <div class="mb-6">

        <h1 class="text-2xl font-bold tracking-wide text-white">
            Equipos recibidos
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            Equipos ingresados físicamente al Área de Reparaciones.
        </p>

    </div>


    {{-- ============================================================
         LISTADO
    ============================================================ --}}

    <div class="overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-lg">

        <div class="border-b border-gray-700 px-5 py-4">

            <h2 class="text-base font-bold text-white">
                Equipos actualmente en el Área
            </h2>

        </div>


        @forelse ($recepciones as $recepcion)
            @php
                $activo = $recepcion->activo;
                $solicitud = $recepcion->solicitud;
            @endphp


            <div class="border-b border-gray-700 p-5 last:border-b-0">

                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">


                    {{-- ====================================================
                         ACTIVO
                    ===================================================== --}}

                    <div class="min-w-0">

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-lg bg-indigo-600/20 text-indigo-400">

                                💻

                            </div>

                            <div>

                                <h3 class="font-bold text-white">

                                    {{ $activo?->categoria?->nombre ?? 'Activo' }}

                                    @if ($activo?->marca)
                                        · {{ $activo->marca }}
                                    @endif

                                </h3>

                                <p class="text-sm text-gray-400">

                                    {{ $activo?->modelo ?? 'Modelo no informado' }}

                                </p>

                            </div>

                        </div>


                        {{-- DATOS --}}

                        <div class="mt-4 grid gap-3 text-sm sm:grid-cols-2 lg:grid-cols-4">

                            <div>

                                <span class="block text-xs uppercase tracking-wide text-gray-500">
                                    Identificador
                                </span>

                                <span class="font-semibold text-gray-200">
                                    #{{ $activo?->id ?? '—' }}
                                </span>

                            </div>


                            <div>

                                <span class="block text-xs uppercase tracking-wide text-gray-500">
                                    N.º de serie
                                </span>

                                <span class="font-semibold text-gray-200">
                                    {{ $activo?->numero_serie ?? '—' }}
                                </span>

                            </div>


                            <div>

                                <span class="block text-xs uppercase tracking-wide text-gray-500">
                                    Dependencia
                                </span>

                                <span class="font-semibold text-gray-200">
                                    {{ $activo?->dependencia?->nombre ?? '—' }}
                                </span>

                            </div>


                            <div>

                                <span class="block text-xs uppercase tracking-wide text-gray-500">
                                    Recepción
                                </span>

                                <span class="font-semibold text-gray-200">
                                    {{ $recepcion->fecha_recepcion?->format('d/m/Y H:i') ?? '—' }}
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- ====================================================
                         ESTADO
                    ===================================================== --}}

                    <div class="flex flex-col items-start gap-3 lg:items-end">

                        <span class="rounded-full bg-indigo-500/20 px-3 py-1 text-xs font-semibold text-indigo-400">

                            Recibido

                        </span>


                        @if ($recepcion->ticket)
                            <div class="text-xs text-gray-400">

                                Ticket:

                                <span class="font-bold text-blue-400">
                                    {{ $recepcion->ticket->numero }}
                                </span>

                            </div>
                        @endif


                        {{-- ACCIÓN --}}

                        <a href="#"
                            class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500">

                            Ver equipo

                            <span>→</span>

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="px-5 py-12 text-center">

                <div class="text-4xl">
                    📦
                </div>

                <h3 class="mt-3 text-base font-bold text-white">
                    No hay equipos recibidos
                </h3>

                <p class="mt-1 text-sm text-gray-400">
                    Actualmente no existen equipos ingresados al Área de Reparaciones.
                </p>

            </div>
        @endforelse

    </div>

</div>
