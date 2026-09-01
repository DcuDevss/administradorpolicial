@if ($mostrarTurno)

    <div class="mb-6 overflow-hidden rounded-xl border border-gray-700 bg-gray-800 shadow-2xl">


        <div class="border-b border-gray-700 bg-gray-800 px-5 py-4">

            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

                <div>

                    <h2 class="text-xl font-bold text-white">
                        Agenda de Reparaciones
                    </h2>

                    <p class="mt-1 text-sm text-gray-400">
                        Seleccione la fecha y horario para recibir el equipo.
                    </p>

                </div>


                <button wire:click="cerrarTurno" type="button"
                    class="rounded-lg px-3 py-2 text-sm text-gray-400 transition hover:bg-gray-700 hover:text-white">

                    ✕ Cerrar

                </button>

            </div>

        </div>


        <div class="grid gap-6 p-5 lg:grid-cols-3">


            <div class="lg:col-span-2">

                {{-- FECHA DE AGENDA --}}
                <div class="mb-4">

                    <label for="fechaAgenda" class="mb-2 block text-sm font-semibold text-gray-300">

                        Fecha de agenda

                    </label>

                    <input id="fechaAgenda" type="date" wire:model.live="fechaAgenda"
                        wire:change="seleccionarFecha($event.target.value)" min="{{ now()->format('Y-m-d') }}"
                        class="w-full rounded-lg border border-gray-600 bg-gray-900 px-4 py-3 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 md:max-w-xs">

                </div>


                {{-- TURNOS DEL DÍA --}}
                <div>

                    <div class="mb-3 flex items-center justify-between">

                        <div>

                            <h3 class="text-sm font-bold uppercase tracking-wider text-gray-300">
                                Turnos del día
                            </h3>

                            <p class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($fechaAgenda)->format('d/m/Y') }}
                            </p>

                        </div>


                        <span class="rounded-full bg-gray-700 px-3 py-1 text-xs font-semibold text-gray-300">

                            {{ $turnosDelDia->count() }} turno(s)

                        </span>

                    </div>


                    @if ($turnosDelDia->count())

                        <div class="space-y-2">

                            @foreach ($turnosDelDia as $turno)
                                <div class="rounded-lg border border-gray-700 bg-gray-900 p-3">

                                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">


                                        {{-- INFORMACIÓN PRINCIPAL --}}
                                        <div class="flex items-center gap-3">

                                            {{-- HORA --}}
                                            <div
                                                class="flex min-w-[70px] items-center justify-center rounded-lg bg-blue-900/40 px-3 py-2 text-sm font-bold text-blue-300">

                                                {{ \Carbon\Carbon::parse($turno->hora)->format('H:i') }}

                                            </div>


                                            {{-- ACTIVO / DEPENDENCIA --}}
                                            <div>

                                                <div class="text-sm font-semibold text-white">

                                                    {{ $turno->solicitud->activo->categoria->nombre ?? 'Activo' }}

                                                </div>


                                                <div class="text-xs text-gray-400">

                                                    {{ $turno->solicitud->activo->dependencia->nombre ??
                                                        ($turno->solicitud->activo->dependencia->name ?? 'Sin dependencia') }}

                                                </div>

                                            </div>

                                        </div>


                                        {{-- ESTADO --}}
                                        <div class="text-right">

                                            <div class="text-xs text-gray-500">
                                                Solicitud #{{ $turno->solicitud_id }}
                                            </div>

                                            <span class="text-xs font-semibold text-blue-400">

                                                {{ ucfirst($turno->estado) }}

                                            </span>

                                        </div>

                                    </div>

                                </div>
                            @endforeach

                        </div>
                    @else
                        <div class="rounded-lg border border-dashed border-gray-700 bg-gray-900 px-5 py-8 text-center">

                            <div class="mb-2 text-3xl">
                                📅
                            </div>

                            <p class="text-sm font-semibold text-gray-300">
                                No hay turnos registrados para este día.
                            </p>

                            <p class="mt-1 text-xs text-gray-500">
                                Puede asignar este horario sin restricciones de cantidad.
                            </p>

                        </div>

                    @endif

                </div>

            </div>



            <div class="rounded-xl border border-gray-700 bg-gray-900 p-5">

                <div class="mb-5">

                    <h3 class="text-lg font-bold text-white">
                        Nuevo turno
                    </h3>

                    <p class="mt-1 text-xs text-gray-500">
                        Para la solicitud #{{ $solicitud->id }}
                    </p>

                </div>


                {{-- FECHA --}}
                <div class="mb-4">

                    <label for="fecha" class="mb-2 block text-sm font-medium text-gray-300">

                        Fecha

                    </label>

                    <input id="fecha" type="date" wire:model="fecha" min="{{ now()->format('Y-m-d') }}"
                        class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">

                    @error('fecha')
                        <p class="mt-1 text-xs text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- HORA --}}
                <div class="mb-4">

                    <label for="hora" class="mb-2 block text-sm font-medium text-gray-300">

                        Hora

                    </label>

                    <input id="hora" type="time" wire:model="hora"
                        class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">

                    @error('hora')
                        <p class="mt-1 text-xs text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- OBSERVACIONES --}}
                <div class="mb-5">

                    <label for="observaciones" class="mb-2 block text-sm font-medium text-gray-300">

                        Observaciones

                    </label>

                    <textarea id="observaciones" wire:model="observaciones" rows="4" maxlength="1000"
                        class="w-full rounded-lg border border-gray-600 bg-gray-800 px-3 py-2.5 text-sm text-white placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500"
                        placeholder="Observaciones relacionadas con el turno..."></textarea>

                    @error('observaciones')
                        <p class="mt-1 text-xs text-red-400">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- INFORMACIÓN --}}
                <div class="mb-5 rounded-lg border border-blue-800/40 bg-blue-900/20 p-3">

                    <div class="flex gap-2">

                        <span class="text-blue-400">
                            ℹ
                        </span>

                        <p class="text-xs leading-relaxed text-blue-300">
                            Los turnos organizan la recepción de los equipos.
                            La existencia de otros turnos en el mismo horario
                            no impide asignar uno nuevo.
                        </p>

                    </div>

                </div>


                {{-- BOTONES --}}
                <div class="flex flex-col gap-2">

                    <button wire:click="asignarTurno" wire:loading.attr="disabled" type="button"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-blue-500 disabled:cursor-not-allowed disabled:opacity-50">

                        <span wire:loading.remove wire:target="asignarTurno">
                            Confirmar turno
                        </span>

                        <span wire:loading wire:target="asignarTurno">
                            Asignando...
                        </span>

                    </button>


                    <button wire:click="cerrarTurno" type="button"
                        class="rounded-lg px-4 py-3 text-sm font-semibold text-gray-400 transition hover:bg-gray-700 hover:text-white">

                        Cancelar

                    </button>

                </div>

            </div>

        </div>

    </div>

@endif
