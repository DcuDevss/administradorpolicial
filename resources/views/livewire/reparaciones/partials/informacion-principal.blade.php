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