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
                    {{ ucfirst($activo->estado ?? 'Sin estado') }}
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


    {{-- SOLICITUDES DE REPARACIÓN --}}

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