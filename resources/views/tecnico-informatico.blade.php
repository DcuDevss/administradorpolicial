<x-app-layout>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        {{-- ============================================================
        ENCABEZADO
    ============================================================ --}}

        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h1 class="text-2xl font-bold tracking-tight text-white">
                    Técnico Informática
                </h1>

                <p class="mt-1 text-sm text-gray-400">
                    Gestión de activos, reparaciones y seguimiento técnico.
                </p>

            </div>

            <div class="shrink-0">

                <img src="{{ asset('foto/ComunicacioneNuevoSinFondo.webp') }}" alt="División Comunicaciones"
                    class="h-20 w-auto object-contain" loading="lazy">

            </div>

        </div>

        {{-- ============================================================
     RESUMEN OPERATIVO
============================================================ --}}

        <div class="mb-8">

            <div class="mb-4">

                <h2 class="text-lg font-bold text-white">
                    Estado del Área de Reparaciones
                </h2>

                <p class="text-sm text-gray-400">
                    Resumen actual de los equipos y solicitudes en proceso.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">


                {{-- RECEPCIONADOS --}}

                <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                                Recepcionados
                            </p>

                            <p class="mt-2 text-3xl font-bold text-indigo-400">
                                {{ $recepcionadas ?? 0 }}
                            </p>

                        </div>

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-600/20 text-indigo-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>

                        </div>

                    </div>

                </div>


                {{-- DIAGNÓSTICO --}}

                <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                                Diagnóstico
                            </p>

                            <p class="mt-2 text-3xl font-bold text-purple-400">
                                {{ $diagnostico ?? 0 }}
                            </p>

                        </div>

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-600/20 text-purple-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6" />
                            </svg>

                        </div>

                    </div>

                </div>


                {{-- EN REPARACIÓN --}}

                <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                                En reparación
                            </p>

                            <p class="mt-2 text-3xl font-bold text-orange-400">
                                {{ $reparacion ?? 0 }}
                            </p>

                        </div>

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-600/20 text-orange-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.7 6.3a1 1 0 00-1.4 0l-7 7a1 1 0 001.4 1.4l7-7a1 1 0 000-1.4zM16 4l4 4" />
                            </svg>

                        </div>

                    </div>

                </div>


                {{-- ESPERANDO REPUESTO --}}

                <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                                Esperando repuesto
                            </p>

                            <p class="mt-2 text-3xl font-bold text-red-400">
                                {{ $esperandoRepuesto ?? 0 }}
                            </p>

                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-600/20 text-red-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0l-6.93 12a2 2 0 001.73 3z" />
                            </svg>

                        </div>

                    </div>

                </div>


                {{-- LISTOS PARA RETIRAR --}}

                <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-medium uppercase tracking-wider text-gray-500">
                                Listos para retirar
                            </p>

                            <p class="mt-2 text-3xl font-bold text-emerald-400">
                                {{ $listasRetirar ?? 0 }}
                            </p>

                        </div>

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600/20 text-emerald-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- ============================================================
             ÁREA DE REPARACIONES
        ============================================================= --}}

        <div class="mb-8">

            <div class="mb-4">

                <h2 class="text-lg font-bold text-white">
                    Área de Reparaciones
                </h2>

                <p class="text-sm text-gray-400">
                    Gestión de equipos recibidos y solicitudes de reparación.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                {{-- ACTIVOS RECIBIDOS --}}

                <a href="{{ route('reparaciones.equipos-recibidos') }}"
                    class="hover:bg-gray-750 group rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg transition hover:border-blue-500">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-blue-600/20 text-blue-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2a4 4 0 014-4h4m0 0V7m0 4l-3-3m3 3l3-3M5 5h5a2 2 0 012 2v1" />

                            </svg>

                        </div>


                        <div>

                            <h3 class="font-semibold text-white group-hover:text-blue-400">
                                Activos recibidos
                            </h3>

                            <p class="mt-1 text-xs text-gray-400">
                                Equipos actualmente en el Área de Reparaciones.
                            </p>

                        </div>

                    </div>

                </a>


                {{-- SOLICITUDES --}}

                <a href="#"
                    class="group rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg transition hover:border-indigo-500">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-600/20 text-indigo-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h6l5 5v11a2 2 0 01-2 2z" />

                            </svg>

                        </div>


                        <div>

                            <h3 class="font-semibold text-white group-hover:text-indigo-400">
                                Solicitudes
                            </h3>

                            <p class="mt-1 text-xs text-gray-400">
                                Consultar y gestionar solicitudes de reparación.
                            </p>

                        </div>

                    </div>

                </a>


                {{-- TURNOS --}}

                <a href="#"
                    class="group rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg transition hover:border-purple-500">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-600/20 text-purple-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

                            </svg>

                        </div>


                        <div>

                            <h3 class="font-semibold text-white group-hover:text-purple-400">
                                Agenda de turnos
                            </h3>

                            <p class="mt-1 text-xs text-gray-400">
                                Consultar y organizar la recepción de equipos.
                            </p>

                        </div>

                    </div>

                </a>

            </div>

        </div>


        {{-- ============================================================
             INVENTARIO
        ============================================================= --}}

        <div>

            <div class="mb-4">

                <h2 class="text-lg font-bold text-white">
                    Inventario
                </h2>

                <p class="text-sm text-gray-400">
                    Consulta y administración de activos tecnológicos.
                </p>

            </div>


            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                <a href="#"
                    class="group rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg transition hover:border-emerald-500">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-600/20 text-emerald-400">

                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7h18M5 7v10a2 2 0 002 2h10a2 2 0 002-2V7M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2" />

                            </svg>

                        </div>


                        <div>

                            <h3 class="font-semibold text-white group-hover:text-emerald-400">
                                Activos
                            </h3>

                            <p class="mt-1 text-xs text-gray-400">
                                Consultar inventario de activos tecnológicos.
                            </p>

                        </div>

                    </div>

                </a>

            </div>

        </div>

    </div>

</x-app-layout>
