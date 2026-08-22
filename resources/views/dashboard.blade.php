<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Panel de usuario
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Sistema de gestión de activos y reparaciones
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Bienvenida --}}
            <div class="mb-8 overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                <div class="p-6 sm:p-8">
                    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">

                        <div>
                            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                Área de Reparaciones
                            </p>

                            <h1 class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">
                                Bienvenido, {{ Auth::user()->name }}
                            </h1>

                            <p class="mt-2 max-w-2xl text-sm text-gray-600 dark:text-gray-400">
                                Desde este panel podrás gestionar tus activos tecnológicos,
                                solicitar revisiones y consultar el estado de tus reparaciones.
                            </p>
                        </div>

                        <div class="shrink-0">
                            <img
                                src="{{ asset('foto/ComunicacioneNuevoSinFondo.webp') }}"
                                alt="Policía de Tierra del Fuego"
                                class="h-24 w-auto object-contain"
                                loading="lazy"
                            >
                        </div>

                    </div>
                </div>
            </div>

            {{-- Acciones principales --}}
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">

                {{-- Activos --}}
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 dark:bg-blue-900/40">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 17v-2a4 4 0 014-4h4m0 0V7m0 4h-4m4 0l3-3m-3 3l3 3M5 5h6a2 2 0 012 2v2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                        </svg>
                    </div>

                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">
                        Mis activos
                    </h3>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Consulta los equipos tecnológicos asociados a tu dependencia.
                    </p>

                    <span class="mt-4 inline-block text-sm font-medium text-gray-400">
                        Próximamente
                    </span>
                </div>

                {{-- Solicitud --}}
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 dark:bg-amber-900/40">
                        <svg class="h-6 w-6 text-amber-600 dark:text-amber-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 9v2m0 4h.01M5.07 19h13.86a2 2 0 001.73-3L13.73 4a2 2 0 00-3.46 0L3.34 16a2 2 0 001.73 3z"/>
                        </svg>
                    </div>

                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">
                        Solicitar revisión
                    </h3>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Informa una falla o solicita la revisión de un equipo.
                    </p>

                    <span class="mt-4 inline-block text-sm font-medium text-gray-400">
                        Próximamente
                    </span>
                </div>

                {{-- Solicitudes --}}
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 dark:bg-green-900/40">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">
                        Mis solicitudes
                    </h3>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Consulta solicitudes, turnos y estados de reparación.
                    </p>

                    <span class="mt-4 inline-block text-sm font-medium text-gray-400">
                        Próximamente
                    </span>
                </div>

                {{-- Turnos --}}
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 dark:bg-purple-900/40">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>

                    <h3 class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">
                        Mis turnos
                    </h3>

                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Consulta tus próximos turnos y fechas de atención.
                    </p>

                    <span class="mt-4 inline-block text-sm font-medium text-gray-400">
                        Próximamente
                    </span>
                </div>

            </div>

            {{-- Información institucional --}}
            <div class="mt-8 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-700 dark:bg-gray-800">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Sistema de Reparaciones
                </h3>

                <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-400">
                    Plataforma interna para la gestión de activos tecnológicos,
                    solicitudes de revisión, turnos, recepción, reparaciones,
                    entregas e historial técnico.
                </p>
            </div>

        </div>
    </div>
</x-app-layout>