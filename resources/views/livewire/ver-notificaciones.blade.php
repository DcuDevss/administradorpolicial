<div class="container mx-auto p-2">

    {{-- =========================================================
         ENCABEZADO
    ========================================================== --}}
    <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-white">
                Notificaciones
            </h1>

            <p class="mt-1 text-sm text-gray-400">
                Solicitudes de reparación y novedades del Área de Reparaciones.
            </p>
        </div>


        {{-- =====================================================
             INVENTARIOS
        ====================================================== --}}
        <div class="relative" x-data="{ open: false }">

            <button type="button" @click="open = !open"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-3 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-blue-500 focus:outline-none">
                Inventarios

                <svg x-bind:class="{ 'rotate-180': open }"
                    class="ml-1 h-4 w-4 transform transition-transform duration-200" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>


            <div x-show="open" @click.away="open = false" x-transition style="display: none;"
                class="absolute right-0 z-50 mt-2 w-52 overflow-hidden rounded-md border border-gray-600 bg-gray-800 py-1 shadow-xl">

                <a href="{{ route('createInventarioGeneral') }}"
                    class="block px-4 py-2 text-sm text-gray-200 transition hover:bg-blue-600 hover:text-white">
                    Dependencias Operativas
                </a>

                <a href="{{ route('createInvestigacionesGeneral') }}"
                    class="block px-4 py-2 text-sm text-gray-200 transition hover:bg-blue-600 hover:text-white">
                    Investigaciones
                </a>

                <a href="{{ route('createAdministracionGeneral') }}"
                    class="block px-4 py-2 text-sm text-gray-200 transition hover:bg-blue-600 hover:text-white">
                    Administración
                </a>

                <a href="{{ route('createAdministracionGeneral') }}"
                    class="block px-4 py-2 text-sm text-gray-200 transition hover:bg-blue-600 hover:text-white">
                    Recursos Humanos
                </a>

                <a href="{{ route('createJefaturaGeneral') }}"
                    class="block px-4 py-2 text-sm text-gray-200 transition hover:bg-blue-600 hover:text-white">
                    Jefatura
                </a>

            </div>
        </div>

    </div>


    {{-- =========================================================
         RESUMEN
    ========================================================== --}}
    <div class="mb-5 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

        {{-- TOTAL --}}
        <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Total
                    </p>

                    <p class="mt-1 text-2xl font-bold text-white">
                        {{ $notificaciones->total() }}
                    </p>
                </div>

                <div class="rounded-lg bg-blue-500/20 p-3 text-blue-400">
                    🔔
                </div>

            </div>

        </div>


        {{-- SIN LEER --}}
        <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Sin leer
                    </p>

                    <p class="mt-1 text-2xl font-bold text-pink-400">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </p>
                </div>

                <div class="rounded-lg bg-pink-500/20 p-3 text-pink-400">
                    ●
                </div>

            </div>

        </div>


        {{-- MOSTRANDO --}}
        <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                        Mostrando
                    </p>

                    <p class="mt-1 text-2xl font-bold text-white">
                        {{ $notificaciones->count() }}
                    </p>
                </div>

                <div class="rounded-lg bg-gray-700 p-3 text-gray-300">
                    📋
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         BÚSQUEDA
    ========================================================== --}}
    <div class="mb-6">

        <input wire:model.live.debounce.300ms="search" type="text"
            class="w-full rounded-lg border border-gray-600 bg-gray-800 px-4 py-3 text-sm text-white placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 md:w-96"
            placeholder="Buscar notificaciones...">

    </div>


    {{-- =========================================================
         LISTADO
    ========================================================== --}}
    <div class="space-y-4">

        @forelse ($notificaciones as $notificacion)

            @php
                $data = is_array($notificacion->data) ? $notificacion->data : json_decode($notificacion->data, true);

                $data = $data ?? [];

                $esNoLeida = is_null($notificacion->read_at);

                $titulo = $data['titulo'] ?? 'Nueva notificación';

                $mensaje = $data['mensaje'] ?? ($data['descripcion'] ?? 'Sin información disponible.');

                $descripcion = $data['descripcion'] ?? null;

                $prioridad = $data['prioridad'] ?? null;

                $solicitudId = $data['solicitud_id'] ?? null;

                $activoId = $data['activo_id'] ?? null;

                $usuarioId = $data['usuario_id'] ?? null;
            @endphp


            {{-- =================================================
                 NOTIFICACIÓN
            ================================================== --}}
            <div
                class="{{ $esNoLeida ? 'border-pink-500/60 bg-gray-800 ring-1 ring-pink-500/20' : 'border-gray-700 bg-gray-800/90' }} overflow-hidden rounded-xl border shadow-lg transition">

                {{-- =============================================
                     CABECERA
                ============================================== --}}
                <div
                    class="flex flex-col gap-3 border-b border-gray-700 px-4 py-4 md:flex-row md:items-center md:justify-between">

                    <div class="flex items-center gap-3">

                        {{-- INDICADOR --}}
                        <div
                            class="{{ $esNoLeida ? 'bg-pink-500 shadow-lg shadow-pink-500/50 animate-pulse' : 'bg-gray-500' }} h-3 w-3 shrink-0 rounded-full">
                        </div>


                        <div>

                            <div class="flex flex-wrap items-center gap-2">

                                <h2 class="text-sm font-bold text-white">
                                    {{ $titulo }}
                                </h2>

                                @if ($esNoLeida)
                                    <span
                                        class="rounded-full bg-pink-600 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-white">
                                        Nueva
                                    </span>
                                @else
                                    <span
                                        class="rounded-full bg-gray-700 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wider text-gray-400">
                                        Leída
                                    </span>
                                @endif

                            </div>


                            <p class="mt-1 text-xs text-gray-500">
                                Tipo:
                                {{ class_basename($notificacion->type) }}
                            </p>

                        </div>

                    </div>


                    {{-- FECHA --}}
                    <div class="text-xs text-gray-400">

                        {{ $notificacion->created_at->tz('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}

                    </div>

                </div>


                {{-- =============================================
                     CONTENIDO
                ============================================== --}}
                <div class="grid gap-5 p-5 lg:grid-cols-3">


                    {{-- =========================================
                         INFORMACIÓN
                    ========================================== --}}
                    <div class="lg:col-span-2">


                        {{-- MENSAJE --}}
                        <div class="mb-5">

                            <div class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Mensaje
                            </div>

                            <div
                                class="rounded-lg border border-gray-700 bg-gray-900 p-4 text-sm leading-relaxed text-gray-200">
                                {{ $mensaje }}
                            </div>

                        </div>


                        {{-- DESCRIPCIÓN --}}
                        @if ($descripcion && $descripcion !== $mensaje)
                            <div class="mb-5">

                                <div class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    Descripción
                                </div>

                                <div
                                    class="rounded-lg border border-gray-700 bg-gray-900/70 p-4 text-sm leading-relaxed text-gray-300">
                                    {{ $descripcion }}
                                </div>

                            </div>
                        @endif


                        {{-- =====================================
                             DATOS DE SOLICITUD
                        ====================================== --}}
                        @if ($solicitudId || $activoId || $prioridad)
                            <div class="grid gap-3 sm:grid-cols-3">


                                @if ($solicitudId)
                                    <div class="rounded-lg border border-gray-700 bg-gray-900 p-3">

                                        <p class="text-[10px] font-semibold uppercase tracking-wider text-gray-500">
                                            Solicitud
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-white">
                                            #{{ $solicitudId }}
                                        </p>

                                    </div>
                                @endif


                                @if ($activoId)
                                    <div class="rounded-lg border border-gray-700 bg-gray-900 p-3">

                                        <p class="text-[10px] font-semibold uppercase tracking-wider text-gray-500">
                                            Activo
                                        </p>

                                        <p class="mt-1 text-sm font-bold text-white">
                                            #{{ $activoId }}
                                        </p>

                                    </div>
                                @endif


                                @if ($prioridad)
                                    <div class="rounded-lg border border-gray-700 bg-gray-900 p-3">

                                        <p class="text-[10px] font-semibold uppercase tracking-wider text-gray-500">
                                            Prioridad
                                        </p>

                                        <p
                                            class="{{ strtolower($prioridad) === 'alta'
                                                ? 'text-red-400'
                                                : (strtolower($prioridad) === 'media'
                                                    ? 'text-yellow-400'
                                                    : 'text-green-400') }} mt-1 text-sm font-bold uppercase">
                                            {{ $prioridad }}
                                        </p>

                                    </div>
                                @endif

                            </div>
                        @endif


                    </div>


                    {{-- =========================================
                         ACCIONES
                    ========================================== --}}
                    <div class="flex flex-col gap-3 lg:border-l lg:border-gray-700 lg:pl-5">

                        <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Acciones
                        </div>


                        {{-- SOLICITUD --}}
                        @if ($solicitudId)
                            <a href="{{ route('solicitudes-reparacion.detalle', $solicitudId) }}"
                                class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-500">
                                Ver solicitud
                            </a>
                        @endif

                        {{-- ACTIVO --}}
                        @if ($activoId)
                            <div class="rounded-lg border border-gray-700 bg-gray-900 px-4 py-3">

                                <p class="text-xs text-gray-500">
                                    Activo relacionado
                                </p>

                                <p class="mt-1 text-sm font-semibold text-gray-200">
                                    Equipo #{{ $activoId }}
                                </p>

                            </div>
                        @endif


                        {{-- ESTADO --}}
                        <div class="rounded-lg border border-gray-700 bg-gray-900 px-4 py-3">

                            <p class="text-xs text-gray-500">
                                Estado
                            </p>

                            <p class="{{ $esNoLeida ? 'text-pink-400' : 'text-gray-400' }} mt-1 text-sm font-semibold">
                                {{ $esNoLeida ? 'Pendiente de lectura' : 'Leída' }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- =============================================
                     PIE
                ============================================== --}}
                <div class="border-t border-gray-700 bg-gray-900/50 px-4 py-3">

                    <div
                        class="flex flex-col gap-2 text-xs text-gray-500 sm:flex-row sm:items-center sm:justify-between">

                        <span>
                            ID de notificación:
                            <span class="font-mono text-gray-400">
                                {{ $notificacion->id }}
                            </span>
                        </span>


                        @if ($notificacion->read_at)
                            <span>
                                Leída:
                                {{ $notificacion->read_at->tz('America/Argentina/Buenos_Aires')->format('d/m/Y H:i:s') }}
                            </span>
                        @else
                            <span class="font-semibold text-pink-400">
                                ● Sin leer
                            </span>
                        @endif

                    </div>

                </div>

            </div>

        @empty

            {{-- =================================================
                 SIN NOTIFICACIONES
            ================================================== --}}
            <div class="rounded-xl border border-gray-700 bg-gray-800 px-6 py-12 text-center shadow-lg">

                <div class="mb-4 text-5xl">
                    🔔
                </div>

                <h3 class="text-lg font-semibold text-white">
                    No hay notificaciones
                </h3>

                <p class="mx-auto mt-2 max-w-md text-sm text-gray-400">
                    No se encontraron notificaciones para el usuario actual
                    con los criterios de búsqueda seleccionados.
                </p>

            </div>

        @endforelse

    </div>


    {{-- =========================================================
         PAGINACIÓN
    ========================================================== --}}
    @if ($notificaciones->hasPages())
        <div class="mt-6 rounded-lg border border-gray-700 bg-gray-800 p-3">
            {{ $notificaciones->links() }}
        </div>
    @endif

</div>
