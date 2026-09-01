<div>

    {{-- ============================================================
         BOTÓN: REGISTRAR RECEPCIÓN
    ============================================================ --}}

    @if ($solicitud->estado === 'turnada' && !$this->tieneRecepcion())
        <div class="mb-6 flex justify-end">

            <button type="button" wire:click="abrir"
                class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-gray-900">

                {{-- Icono --}}
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                Registrar recepción

            </button>

        </div>
    @endif


    {{-- ============================================================
         RECEPCIÓN YA REGISTRADA
    ============================================================ --}}

    @if ($this->tieneRecepcion())

        @php
            $recepcion = $solicitud->recepciones->first();
            $ticket = $recepcion?->ticket;
        @endphp

        <div class="mb-6 rounded-xl border border-emerald-700/50 bg-emerald-900/20 p-5">

            {{-- ENCABEZADO --}}

            <div class="flex items-start gap-4">

                <div
                    class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-lg bg-emerald-600 text-white shadow">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <div class="flex-1">

                    <h3 class="text-base font-bold text-white">
                        Equipo recibido
                    </h3>

                    <p class="mt-1 text-sm text-gray-400">
                        El activo ingresó físicamente al Área de Reparaciones.
                    </p>

                </div>

                <span class="rounded-full bg-emerald-500/20 px-3 py-1 text-xs font-semibold text-emerald-400">
                    Recepcionado
                </span>

            </div>


            {{-- INFORMACIÓN DE RECEPCIÓN --}}

            @if ($recepcion)
                <div class="mt-5 grid gap-4 rounded-lg border border-gray-700 bg-gray-900/60 p-4 md:grid-cols-3">

                    <div>

                        <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Fecha de recepción
                        </div>

                        <div class="mt-1 text-sm font-semibold text-white">
                            {{ $recepcion->created_at?->format('d/m/Y H:i') ?? '—' }}
                        </div>

                    </div>


                    <div>

                        <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Persona que entrega
                        </div>

                        <div class="mt-1 text-sm font-semibold text-white">
                            {{ $recepcion->persona_entrega_nombre ?? '—' }}
                        </div>

                    </div>


                    <div>

                        <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Estado físico
                        </div>

                        <div class="mt-1 text-sm text-gray-300">
                            {{ $recepcion->estado_fisico ?? '—' }}
                        </div>

                    </div>

                </div>
            @endif



            {{-- ====================================================
                TICKET DE REPARACIÓN
            ==================================================== --}}

            <div class="mt-4 rounded-xl border border-blue-700/50 bg-blue-900/10 p-5">

                @if ($ticket)
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Ticket de reparación
                            </div>

                            <div class="mt-1 text-2xl font-bold tracking-wide text-blue-400">
                                {{ $ticket->numero }}
                            </div>

                            <div class="mt-2 text-sm text-gray-400">
                                Estado:

                                <span class="font-semibold text-emerald-400">
                                    {{ str_replace('_', ' ', ucfirst($ticket->estado)) }}
                                </span>
                            </div>

                        </div>

                        <div class="flex flex-wrap gap-2">

                            <a href="{{ route('reparaciones.ticket.imprimir', $ticket) }}" target="_blank"
                                class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-blue-500">
                                🖨️ Imprimir ticket
                            </a>

                        </div>

                    </div>

                    <div class="mt-4 rounded-lg border border-gray-700 bg-gray-900 px-4 py-3">

                        <p class="text-xs leading-5 text-gray-400">
                            El ticket identifica el ingreso del equipo al Área de Reparaciones
                            y permite realizar el seguimiento de la reparación.
                        </p>

                    </div>
                @else
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <div class="text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Ticket de reparación
                            </div>

                            <div class="mt-1 text-sm font-semibold text-gray-300">
                                La recepción fue registrada, pero todavía no se generó el ticket.
                            </div>

                        </div>

                        <button type="button" wire:click="generarTicket" wire:loading.attr="disabled"
                            wire:target="generarTicket"
                            class="inline-flex items-center justify-center gap-2 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-500 disabled:cursor-not-allowed disabled:opacity-50">

                            <span wire:loading.remove wire:target="generarTicket">
                                🎫 Generar ticket
                            </span>

                            <span wire:loading wire:target="generarTicket">
                                Generando...
                            </span>

                        </button>

                    </div>
                @endif

            </div>
        </div>

    @endif


    {{-- ============================================================
         MODAL DE RECEPCIÓN
    ============================================================ --}}

    @if ($mostrar)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 px-4 py-6">

            <div
                class="max-h-[92vh] w-full max-w-3xl overflow-y-auto rounded-2xl border border-gray-700 bg-gray-900 shadow-2xl">

                {{-- =================================================
                     ENCABEZADO
                ================================================== --}}

                <div class="flex items-center justify-between border-b border-gray-700 px-6 py-5">

                    <div>

                        <div class="flex items-center gap-3">

                            <div
                                class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-600/20 text-emerald-400">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                            </div>

                            <div>

                                <h2 class="text-lg font-bold text-white">
                                    Registrar recepción
                                </h2>

                                <p class="text-sm text-gray-400">
                                    Registrar el ingreso físico del equipo.
                                </p>

                            </div>

                        </div>

                    </div>


                    <button type="button" wire:click="cerrar"
                        class="rounded-lg p-2 text-2xl leading-none text-gray-400 transition hover:bg-gray-800 hover:text-white"
                        aria-label="Cerrar">
                        ×
                    </button>

                </div>


                {{-- =================================================
                     RESUMEN DE LA SOLICITUD
                ================================================== --}}

                <div class="border-b border-gray-700 bg-gray-800/50 px-6 py-5">

                    <div class="mb-4">

                        <h3 class="text-sm font-bold text-gray-200">
                            Información del ingreso
                        </h3>

                        <p class="mt-1 text-xs text-gray-500">
                            Verifique que el equipo corresponda con la solicitud y el turno asignado.
                        </p>

                    </div>


                    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">

                        {{-- SOLICITUD --}}

                        <div>

                            <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Solicitud
                            </div>

                            <div class="mt-1 font-semibold text-white">
                                #{{ $solicitud->id }}
                            </div>

                        </div>


                        {{-- ACTIVO --}}

                        <div>

                            <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Activo
                            </div>

                            <div class="mt-1 font-semibold text-white">
                                {{ $solicitud->activo->categoria->nombre ?? 'Activo' }}
                            </div>

                        </div>


                        {{-- DEPENDENCIA --}}

                        <div>

                            <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Dependencia
                            </div>

                            <div class="mt-1 font-semibold text-white">
                                {{ $solicitud->activo->dependencia->nombre ?? 'Sin dependencia' }}
                            </div>

                        </div>


                        {{-- PRIORIDAD --}}

                        <div>

                            <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                                Prioridad
                            </div>

                            <div class="mt-1 font-semibold text-white">
                                {{ ucfirst($solicitud->prioridad ?? 'media') }}
                            </div>

                        </div>

                    </div>


                    {{-- FALLA DE LA SOLICITUD --}}

                    <div class="mt-4 rounded-lg border border-gray-700 bg-gray-900/60 p-4">

                        <div class="text-xs font-semibold uppercase tracking-wide text-gray-500">
                            Falla informada en la solicitud
                        </div>

                        <div class="mt-2 text-sm leading-6 text-gray-300">
                            {{ $solicitud->descripcion ?? 'Sin descripción registrada.' }}
                        </div>

                    </div>

                </div>


                {{-- =================================================
                     FORMULARIO
                ================================================== --}}

                <form>

                    <div class="space-y-6 px-6 py-6">

                        {{-- ERROR GENERAL --}}

                        @error('general')
                            <div class="rounded-lg border border-red-700 bg-red-900/30 px-4 py-3 text-sm text-red-300">

                                <div class="font-semibold">
                                    No se pudo registrar la recepción.
                                </div>

                                <div class="mt-1">
                                    {{ $message }}
                                </div>

                            </div>
                        @enderror


                        {{-- PERSONA QUE ENTREGA --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-gray-300">
                                Persona que entrega <span class="text-red-400">*</span>
                            </label>

                            <input type="text" wire:model="personaEntregaNombre" autocomplete="off"
                                class="w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-sm text-white placeholder-gray-500 transition focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                placeholder="Nombre y apellido">

                            <p class="mt-1 text-xs text-gray-500">
                                Persona que realiza la entrega física del equipo.
                            </p>

                            @error('personaEntregaNombre')
                                <span class="mt-1 block text-sm text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- ESTADO FÍSICO --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-gray-300">
                                Estado físico al recibir <span class="text-red-400">*</span>
                            </label>

                            <textarea wire:model="estadoFisico" rows="4"
                                class="w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-sm text-white placeholder-gray-500 transition focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                placeholder="Describa el estado físico del equipo al momento de recibirlo. Ej.: Equipo con desgaste normal, sin daños visibles, carcasa en buen estado..."></textarea>

                            <p class="mt-1 text-xs text-gray-500">
                                Registrar daños visibles, golpes, roturas, faltantes u otras condiciones relevantes.
                            </p>

                            @error('estadoFisico')
                                <span class="mt-1 block text-sm text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- ACCESORIOS --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-gray-300">
                                Accesorios recibidos
                            </label>

                            <textarea wire:model="accesorios" rows="4"
                                class="w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-sm text-white placeholder-gray-500 transition focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                placeholder="Ej.: Fuente de alimentación, cable HDMI, teclado, mouse..."></textarea>

                            <p class="mt-1 text-xs text-gray-500">
                                Detalle los accesorios que ingresan junto con el equipo.
                            </p>

                            @error('accesorios')
                                <span class="mt-1 block text-sm text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- OBSERVACIONES --}}

                        <div>

                            <label class="mb-2 block text-sm font-semibold text-gray-300">
                                Observaciones
                            </label>

                            <textarea wire:model="observaciones" rows="4"
                                class="w-full rounded-lg border border-gray-700 bg-gray-800 px-4 py-3 text-sm text-white placeholder-gray-500 transition focus:border-emerald-500 focus:outline-none focus:ring-1 focus:ring-emerald-500"
                                placeholder="Observaciones adicionales relacionadas con la recepción..."></textarea>

                            @error('observaciones')
                                <span class="mt-1 block text-sm text-red-400">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- =================================================
                             AVISO SOBRE TICKET
                        ================================================== --}}

                        <div class="rounded-xl border border-blue-700/40 bg-blue-900/10 p-4">

                            <div class="flex gap-3">

                                <div
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg bg-blue-600/20 text-blue-400">

                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                                    </svg>

                                </div>

                                <div>

                                    <h4 class="text-sm font-semibold text-blue-300">
                                        Generación del ticket
                                    </h4>

                                    <p class="mt-1 text-xs leading-5 text-gray-400">
                                        Al confirmar la recepción se registrará el ingreso físico del equipo.
                                        Luego podrá generar el ticket correspondiente para dejar constancia
                                        del ingreso y realizar su seguimiento.
                                    </p>

                                    <p class="mt-2 text-xs leading-5 text-gray-500">
                                        El comprobante podrá imprimirse una vez generado el ticket e incluirá
                                        la información de la recepción y los espacios correspondientes para
                                        las firmas.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         ACCIONES
                    ================================================== --}}

                    <div
                        class="flex flex-col-reverse gap-3 border-t border-gray-700 px-6 py-5 sm:flex-row sm:justify-end">

                        <button type="button" wire:click="cerrar"
                            class="rounded-lg bg-gray-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Cancelar
                        </button>


                        <button type="button" wire:click="registrar" wire:loading.attr="disabled"
                            wire:target="registrar"
                            class="rounded-lg bg-emerald-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-500 disabled:opacity-50">
                            <span wire:loading.remove wire:target="registrar">
                                Confirmar recepción
                            </span>

                            <span wire:loading wire:target="registrar">
                                Registrando...
                            </span>
                        </button>
                    </div>

                </form>

            </div>

        </div>
    @endif

</div>
