<x-dependencia-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Panel de dependencia
            </h2>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Gestión de activos y solicitudes de reparación
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
                                Gestión de activos tecnológicos
                            </p>

                            <h1 class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">
                                Bienvenido, {{ Auth::user()->name }}
                            </h1>

                            <p class="mt-2 max-w-2xl text-sm text-gray-600 dark:text-gray-400">
                                Desde este panel podrás consultar los equipos de tu dependencia,
                                solicitar revisiones y realizar el seguimiento de tus reparaciones.
                            </p>

                        </div>

                      

                    </div>
                </div>
            </div>

            {{-- Acciones principales --}}
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                {{-- Mis activos --}}
                <a href="{{ route('mis-activos') }}"
                    class="group block rounded-2xl bg-blue-100 p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:bg-white hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-900/40 dark:hover:bg-gray-800 dark:focus:ring-offset-gray-900">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-200 transition duration-200 group-hover:bg-blue-100 dark:bg-blue-800 dark:group-hover:bg-blue-900/40">

                        <svg class="h-6 w-6 text-blue-700 dark:text-blue-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2a4 4 0 014-4h4m0 0V7m0 4h-4m4 0l3-3m-3 3l3 3M5 5h6a2 2 0 012 2v2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />

                        </svg>
                    </div>

                    <h3 class="mt-4 text-lg font-semibold text-blue-900 dark:text-white">
                        Mis activos
                    </h3>

                    <p class="mt-2 text-sm text-blue-800 dark:text-blue-200">
                        Consulta los equipos tecnológicos asociados a tu dependencia.
                    </p>

                    <div class="mt-4 inline-flex items-center text-sm font-semibold text-blue-700 dark:text-blue-300">

                        Ver mis activos

                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />

                        </svg>

                    </div>

                </a>

                {{-- Solicitudes --}}
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 dark:bg-green-900/40">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 dark:bg-purple-900/40">
                        <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
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
</x-dependencia-layout>
