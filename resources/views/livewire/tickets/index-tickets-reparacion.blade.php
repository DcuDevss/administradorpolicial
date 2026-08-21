<div class="tickets-page py-5 bg-slate-800 min-h-screen text-gray-900">
    <style>
        @media print {
            body * {
                visibility: hidden !important;
            }

            .ticket-printable,
            .ticket-printable * {
                visibility: visible !important;
            }

            .ticket-printable {
                position: absolute;
                inset: 0;
                width: 100%;
                padding: 24px;
                color: #111827;
                background: white;
            }

            .ticket-no-print {
                display: none !important;
            }

            .ticket-print-only {
                display: block !important;
            }
        }

        .ticket-print-only {
            display: none;
        }
    </style>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-red-500 leading-tight">
                {{ __('Bandeja de tickets') }}
            </h2>
        </x-slot>

        <div class="flex flex-col lg:flex-row gap-4">
            <section class="ticket-no-print bg-white rounded-md shadow-lg p-4 lg:w-2/3">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">Tickets de reparacion</h1>
                        <p class="text-sm text-gray-500">
                            {{ $isTecnico ? 'Bandeja tecnica general' : 'Mis solicitudes cargadas' }}</p>
                    </div>
                    <a href="{{ route('tickets.create') }}"
                        class="px-4 py-2 rounded-md bg-blue-800 text-white font-bold text-center">
                        Nuevo ticket
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
                    <input type="text" wire:model.debounce.500ms="search"
                        class="rounded-md border-gray-300 md:col-span-2"
                        placeholder="Buscar por numero, dependencia, equipo o falla">
                    <select wire:model="estado" class="rounded-md border-gray-300">
                        <option value="">Todos los estados</option>
                        @foreach ($estados as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead class="text-xs uppercase bg-slate-300 text-slate-900">
                            <tr>
                                <th class="p-2 text-left">Ticket</th>
                                <th class="p-2 text-left">Dependencia</th>
                                <th class="p-2 text-left">Equipo</th>
                                <th class="p-2 text-left">Estado</th>
                                <th class="p-2 text-left">Tecnico</th>
                                <th class="p-2 text-right">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm">
                            @forelse ($tickets as $ticket)
                                <tr class="{{ $ticketId === $ticket->id ? 'bg-blue-50' : '' }}">
                                    <td class="p-2 font-bold">
                                        {{ $ticket->numero_ticket }}
                                        <div class="text-xs text-gray-500">
                                            {{ optional($ticket->created_at)->format('d/m/Y H:i') }}</div>
                                    </td>
                                    <td class="p-2">
                                        {{ $ticket->dependencia_nombre ?? 'Sin dependencia' }}
                                        <div class="text-xs text-gray-500">
                                            {{ $ticket->solicitante->name ?? 'Sin usuario' }}</div>
                                    </td>
                                    <td class="p-2">
                                        {{ $ticket->equipo ?? 'Equipo' }}
                                        <div class="text-xs text-gray-500">
                                            {{ trim(($ticket->marca ?? '') . ' ' . ($ticket->modelo ?? '')) ?: 'Sin marca/modelo' }}
                                        </div>
                                    </td>
                                    <td class="p-2">
                                        <span
                                            class="inline-flex px-2 py-1 rounded-full text-xs font-bold bg-slate-800 text-white">
                                            {{ $ticket->estado_nombre }}
                                        </span>
                                    </td>
                                    <td class="p-2">{{ $ticket->tecnico->name ?? 'Sin asignar' }}</td>
                                    <td class="p-2 text-right">
                                        <a href="{{ route('tickets.index', ['ticket' => $ticket->id]) }}"
                                            class="inline-block px-3 py-2 rounded-md bg-indigo-600 text-white font-bold">
                                            Ver / imprimir
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-500">No hay tickets cargados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $tickets->links() }}
                </div>
            </section>

            <aside class="ticket-printable bg-white rounded-md shadow-lg p-4 lg:w-1/3">
                @if ($ticketSeleccionado)
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">{{ $ticketSeleccionado->numero_ticket }}</h2>
                            <p class="text-sm text-gray-500">{{ $ticketSeleccionado->dependencia_nombre }}</p>
                        </div>
                        <div class="ticket-no-print flex gap-2">
                            <button type="button" onclick="window.print()"
                                class="px-3 py-2 rounded-md bg-slate-200 text-slate-800 font-bold">
                                Imprimir
                            </button>
                            @if (auth()->id() === $ticketSeleccionado->user_id || $isTecnico)
                                <button type="button" wire:click="eliminarTicket"
                                    onclick="return confirm('¿Eliminar este ticket y su historial?')"
                                    class="px-3 py-2 rounded-md bg-red-700 text-white font-bold">
                                    Eliminar
                                </button>
                            @endif
                        </div>
                    </div>

                    <div class="ticket-print-only mb-4 border-b pb-3">
                        <h3 class="font-bold text-slate-800 mb-2">Datos de solicitud</h3>
                        <div class="grid grid-cols-2 gap-x-4 gap-y-1 text-sm">
                            <p><strong>Solicitante:</strong> {{ $ticketSeleccionado->solicitante->name ?? '----' }}</p>
                            <p><strong>Dependencia:</strong> {{ $ticketSeleccionado->dependencia_nombre ?? '----' }}
                            </p>
                            <p><strong>Fecha ingreso:</strong>
                                {{ optional($ticketSeleccionado->fecha_ingreso)->format('d/m/Y') ?? '----' }}</p>
                            <p><strong>Hora ingreso:</strong> {{ $ticketSeleccionado->hora_ingreso ?? '----' }}</p>
                            <p><strong>Entregado por:</strong> {{ $ticketSeleccionado->entregado_por ?? '----' }}</p>
                            <p><strong>Recibido por:</strong> {{ $ticketSeleccionado->recibido_por ?? '----' }}</p>
                        </div>
                    </div>

                    <div class="space-y-2 text-sm mb-4 border rounded-md p-3 bg-gray-50">
                        <h3 class="ticket-no-print font-bold text-slate-800">Datos del equipo y falla</h3>
                        <p><strong>Equipo:</strong> {{ $ticketSeleccionado->equipo }} {{ $ticketSeleccionado->marca }}
                            {{ $ticketSeleccionado->modelo }}</p>
                        <p><strong>Nro serie / QR:</strong> {{ $ticketSeleccionado->numero_serie ?? '----' }}</p>
                        <p><strong>Entregado por:</strong> {{ $ticketSeleccionado->entregado_por ?? '----' }}</p>
                        <p><strong>Problema:</strong> {{ $ticketSeleccionado->problema_reportado ?? '----' }}</p>
                    </div>

                    <div class="ticket-no-print">
                        @if ($isTecnico)
                            <form wire:submit.prevent="guardarTecnico" class="space-y-3">
                                <h3 class="font-bold text-slate-800">Editar datos de la solicitud</h3>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Equipo</label>
                                    <input type="text" wire:model.defer="equipo"
                                        class="w-full rounded-md border-gray-300">
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1">Marca</label>
                                        <input type="text" wire:model.defer="marca"
                                            class="w-full rounded-md border-gray-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1">Modelo</label>
                                        <input type="text" wire:model.defer="modelo"
                                            class="w-full rounded-md border-gray-300">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Nro serie / QR</label>
                                    <input type="text" wire:model.defer="numero_serie"
                                        class="w-full rounded-md border-gray-300">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Problema reportado</label>
                                    <textarea wire:model.defer="problema_reportado" rows="3" class="w-full rounded-md border-gray-300"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Tecnico asignado</label>
                                    <select wire:model="tecnico_id" wire:change="asignarTecnico"
                                        class="w-full rounded-md border-gray-300">
                                        <option value="">Sin asignar</option>
                                        @foreach ($tecnicos as $tecnico)
                                            <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Estado</label>
                                    <select wire:model.defer="estadoActual" class="w-full rounded-md border-gray-300">
                                        @foreach ($estados as $key => $label)
                                            <option value="{{ $key }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Falla encontrada</label>
                                    <textarea wire:model.defer="diagnostico" rows="3" class="w-full rounded-md border-gray-300"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Pieza / componente
                                        danado</label>
                                    <textarea wire:model.defer="pieza_danada" rows="2" class="w-full rounded-md border-gray-300"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Trabajo realizado</label>
                                    <textarea wire:model.defer="trabajo_realizado" rows="3" class="w-full rounded-md border-gray-300"></textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Observaciones</label>
                                    <textarea wire:model.defer="observaciones" rows="2" class="w-full rounded-md border-gray-300"></textarea>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1">Fecha entrega</label>
                                        <input type="date" wire:model.defer="fecha_entrega"
                                            class="w-full rounded-md border-gray-300">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-1">Hora entrega</label>
                                        <input type="time" wire:model.defer="hora_entrega"
                                            class="w-full rounded-md border-gray-300">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Entregado por tecnico /
                                        servicio</label>
                                    <input type="text" wire:model.defer="entregado_por_tecnico"
                                        class="w-full rounded-md border-gray-300">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Recibido por
                                        dependencia</label>
                                    <input type="text" wire:model.defer="recibido_por_dependencia"
                                        class="w-full rounded-md border-gray-300">
                                </div>
                                <button type="submit"
                                    class="w-full px-4 py-2 rounded-md bg-blue-800 text-white font-bold">
                                    Guardar diagnostico / salida
                                </button>
                            </form>
                        @else
                            <div class="space-y-2 text-sm border rounded-md p-3">
                                <p><strong>Estado:</strong> {{ $ticketSeleccionado->estado_nombre }}</p>
                                <p><strong>Tecnico:</strong> {{ $ticketSeleccionado->tecnico->name ?? 'Sin asignar' }}
                                </p>
                                <p><strong>Diagnostico:</strong> {{ $ticketSeleccionado->diagnostico ?? 'Pendiente' }}
                                </p>
                                <p><strong>Trabajo realizado:</strong>
                                    {{ $ticketSeleccionado->trabajo_realizado ?? 'Pendiente' }}</p>
                                <p><strong>Observaciones:</strong> {{ $ticketSeleccionado->observaciones ?? '----' }}
                                </p>
                            </div>
                        @endif
                    </div>

                    <div class="ticket-print-only border rounded-md p-3 text-sm space-y-2">
                        <p><strong>Estado:</strong> {{ $ticketSeleccionado->estado_nombre }}</p>
                        <p><strong>Tecnico:</strong> {{ $ticketSeleccionado->tecnico->name ?? 'Sin asignar' }}</p>
                        <p><strong>Diagnostico:</strong> {{ $ticketSeleccionado->diagnostico ?? 'Pendiente' }}</p>
                        <p><strong>Pieza / componente danado:</strong>
                            {{ $ticketSeleccionado->pieza_danada ?? '----' }}</p>
                        <p><strong>Trabajo realizado:</strong>
                            {{ $ticketSeleccionado->trabajo_realizado ?? 'Pendiente' }}</p>
                        <p><strong>Observaciones:</strong> {{ $ticketSeleccionado->observaciones ?? '----' }}</p>
                        <p><strong>Fecha de entrega:</strong>
                            {{ optional($ticketSeleccionado->fecha_entrega)->format('d/m/Y') ?? '----' }}
                            {{ $ticketSeleccionado->hora_entrega ?? '' }}</p>
                        <p><strong>Entregado por tecnico:</strong>
                            {{ $ticketSeleccionado->entregado_por_tecnico ?? '----' }}</p>
                        <p><strong>Recibido por dependencia:</strong>
                            {{ $ticketSeleccionado->recibido_por_dependencia ?? '----' }}</p>
                    </div>

                    <div class="ticket-no-print mt-4 border-t pt-3">
                        <h3 class="font-bold text-slate-800 mb-2">Historial del ticket</h3>
                        <div class="space-y-2 text-xs">
                            @forelse ($ticketSeleccionado->historial as $evento)
                                <div class="border-b pb-2">
                                    <p class="font-bold">{{ ucfirst($evento->accion) }} por
                                        {{ $evento->usuario->name ?? 'Usuario eliminado' }}</p>
                                    <p class="text-gray-500">
                                        {{ optional($evento->created_at)->format('d/m/Y H:i:s') }}</p>
                                    @if ($evento->descripcion)
                                        <p>{{ $evento->descripcion }}</p>
                                    @endif
                                </div>
                            @empty
                                <p class="text-gray-500">Sin movimientos registrados.</p>
                            @endforelse
                        </div>
                    </div>
                @else
                    <div class="text-center py-10 text-gray-500">
                        Seleccione un ticket para ver la planilla.
                    </div>
                @endif
            </aside>
        </div>
    </div>
</div>
