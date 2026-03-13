<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        {{-- CABECERA --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-white">
                    Centro de Situación Operativa
                </h1>
                <p class="mt-1 text-sm text-slate-300 max-w-2xl">
                    Visión general del estado tecnológico y operativo de las dependencias:
                    trabajos, comunicaciones e inventarios.
                </p>
            </div>

            {{-- Filtros --}}
            <div class="flex flex-wrap gap-2">
                <select wire:model="ciudad"
                    class="bg-slate-800 border border-slate-600 text-slate-200 text-xs rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Todas las ciudades</option>
                    <option value="ushuaia">Ushuaia</option>
                    <option value="riogrande">Río Grande</option>
                    <option value="tolhuin">Tolhuin</option>
                </select>

                <select wire:model="periodoDias"
                    class="bg-slate-800 border border-slate-600 text-slate-200 text-xs rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="7">Últimos 7 días</option>
                    <option value="30">Últimos 30 días</option>
                    <option value="90">Últimos 90 días</option>
                </select>
            </div>
        </div>

        {{-- TARJETAS RESUMEN --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4">
            <div class="bg-slate-800/70 border border-slate-700 rounded-xl p-4 shadow-md">
                <div class="text-xs uppercase tracking-widest text-slate-400 mb-1">
                    Trabajos abiertos (Informática)
                </div>
                <div class="text-3xl font-bold text-emerald-400">
                    {{ number_format($totalTrabajosInformatica) }}
                </div>
                <div class="mt-1 text-xs text-slate-400">
                    Incidentes de informática registrados en el período seleccionado.
                </div>
            </div>

            <div class="bg-slate-800/70 border border-slate-700 rounded-xl p-4 shadow-md">
                <div class="text-xs uppercase tracking-widest text-slate-400 mb-1">
                    Trabajos abiertos (Comunicaciones)
                </div>
                <div class="text-3xl font-bold text-yellow-400">
                    {{ number_format($totalTrabajosComunicaciones) }}
                </div>
                <div class="mt-1 text-xs text-slate-400">
                    Incidentes de comunicaciones registrados en el período seleccionado.
                </div>
            </div>

            <div class="bg-slate-800/70 border border-slate-700 rounded-xl p-4 shadow-md">
                <div class="text-xs uppercase tracking-widest text-slate-400 mb-1">
                    Dependencias con alertas
                </div>
                <div class="text-3xl font-bold text-red-400">
                    {{ number_format($dependenciasConAlertas) }}
                </div>
                <div class="mt-1 text-xs text-slate-400">
                    Dependencias que registraron al menos un incidente en el período seleccionado.
                </div>
            </div>

            <div class="bg-slate-800/70 border border-slate-700 rounded-xl p-4 shadow-md">
                <div class="text-xs uppercase tracking-widest text-slate-400 mb-1">
                    Técnicos en servicio hoy
                </div>
                <div class="text-3xl font-bold text-sky-400">
                    {{ number_format($tecnicosEnServicioHoy) }}
                </div>
                <div class="mt-1 text-xs text-slate-400">
                    Técnicos con turno asignado para la fecha de hoy.
                </div>
            </div>

            <div class="bg-slate-800/70 border border-slate-700 rounded-xl p-4 shadow-md">
                <div class="flex items-center justify-between mb-1">
                    <div>
                        <div class="text-xs uppercase tracking-widest text-slate-400">
                            Salud tecnológica
                        </div>
                        <div
                            class="text-3xl font-bold
                            @if ($saludTecnologicaNivel === 'Alta') text-emerald-400
                            @elseif ($saludTecnologicaNivel === 'Media') text-yellow-400
                            @else text-red-400 @endif">
                            {{ $saludTecnologicaScore }}<span class="text-base align-top">/100</span>
                        </div>
                    </div>

                    <span
                        class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold
                        @if ($saludTecnologicaNivel === 'Alta') bg-emerald-500/20 text-emerald-300 border border-emerald-500/40
                        @elseif ($saludTecnologicaNivel === 'Media') bg-yellow-500/20 text-yellow-300 border border-yellow-500/40
                        @else bg-red-500/20 text-red-300 border border-red-500/40 @endif">
                        {{ $saludTecnologicaNivel }}
                    </span>
                </div>

                <div class="mt-2 text-xs text-slate-400">
                    Calculado según porcentaje de equipos con service reciente y carga de trabajos en el período.
                </div>
            </div>
        </div>

        {{-- GRÁFICOS: reutilizamos tu componente existente --}}
        <div class="bg-slate-800/70 border border-slate-700 rounded-2xl p-4 md:p-6 shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-white">
                        Actividad general de trabajos
                    </h2>
                    <p class="text-xs text-slate-400">
                        Evolución de trabajos informáticos por mes, día y dependencia.
                    </p>
                </div>
            </div>

            {{-- Usa tu componente actual de estadísticas --}}
            <livewire:trabajos-generales-chart />
        </div>

        {{-- TIMELINE DE INCIDENTES RECIENTES --}}
        <div class="bg-slate-800/70 border border-slate-700 rounded-2xl p-4 md:p-6 shadow-md">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-lg font-semibold text-white">
                        Incidentes recientes destacados
                    </h2>
                    <p class="text-xs text-slate-400">
                        Incidentes registrados recientemente en el período seleccionado.
                    </p>
                </div>
            </div>

            <div class="space-y-4">
                @forelse ($incidentesCriticos as $incidente)
                    <div class="flex items-start gap-3">
                        <div class="mt-1 w-2 h-2 rounded-full bg-red-500"></div>
                        <div>
                            <div class="text-sm text-white font-semibold">
                                {{ $incidente->lugar_trabajo ?? 'Dependencia no especificada' }}
                                – {{ $incidente->detalle_trabajo ?? 'Sin detalle' }}
                            </div>
                            <div class="text-xs text-slate-400">
                                {{ optional($incidente->fecha_trabajo)->diffForHumans() ?? '' }}
                                · Comunicaciones
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-slate-500">
                        No hay incidentes recientes registrados en el período seleccionado.
                    </p>
                @endforelse
            </div>
        </div>

    </div>
</div>
