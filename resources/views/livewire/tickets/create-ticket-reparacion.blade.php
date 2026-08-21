<div class="py-5 bg-slate-800 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-red-500 leading-tight">
                {{ __('Tickets de reparacion') }}
            </h2>
        </x-slot>

        <div class="bg-white rounded-md shadow-lg overflow-hidden">
            <div class="bg-slate-800 text-white px-6 py-5">
                <p class="text-xs uppercase tracking-widest text-slate-300">Departamento de Informatica y
                    Telecomunicaciones</p>
                <h1 class="text-2xl font-bold mt-1">Planilla de recepcion y diagnostico de equipos</h1>
            </div>

            <form wire:submit.prevent="guardar" class="p-6 space-y-6">
                <section>
                    <div class="bg-blue-700 text-white px-4 py-2 rounded-sm font-bold text-sm uppercase">
                        1. Datos del ingreso y recepcion
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Fecha ingreso</label>
                            <input type="date" wire:model="fecha_ingreso" class="w-full rounded-md border-gray-300">
                            @error('fecha_ingreso')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Hora</label>
                            <input type="time" wire:model="hora_ingreso" class="w-full rounded-md border-gray-300">
                            @error('hora_ingreso')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Zona / dependencia</label>
                            <select wire:model="dependencia_tipo" class="w-full rounded-md border-gray-300">
                                <option value="ushuaia">Ushuaia / general</option>
                                <option value="riogrande">Rio Grande</option>
                                <option value="tolhuin">Tolhuin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Dependencia / comisaria</label>
                            <select wire:model="dependencia_id" class="w-full rounded-md border-gray-300">
                                <option value="">Seleccione dependencia</option>
                                @foreach ($dependencias as $dependencia)
                                    <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
                                @endforeach
                            </select>
                            @error('dependencia_id')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Entregado por</label>
                            <input type="text" wire:model="entregado_por" class="w-full rounded-md border-gray-300"
                                placeholder="Nombre y apellido">
                            @error('entregado_por')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Recibido por</label>
                            <input type="text" wire:model="recibido_por" class="w-full rounded-md border-gray-300"
                                placeholder="Personal que carga">
                            @error('recibido_por')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </section>

                <section>
                    <div class="bg-blue-700 text-white px-4 py-2 rounded-sm font-bold text-sm uppercase">
                        2. Identificacion del equipo
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Buscar equipo inventariado
                            opcional</label>
                        <input type="text" wire:model.debounce.400ms="searchEquipo"
                            class="w-full rounded-md border-gray-300 mb-2"
                            placeholder="Buscar por marca, modelo, QR o tipo">
                        <select wire:model="generalinformatica_id" class="w-full rounded-md border-gray-300">
                            <option value="">Cargar equipo manualmente</option>
                            @foreach ($equipos as $inventario)
                                <option value="{{ $inventario->id }}">
                                    #{{ $inventario->id }} - {{ $inventario->tipodispositivo->nombre ?? 'Equipo' }} -
                                    {{ $inventario->marca ?? 'Sin marca' }} {{ $inventario->modelo ?? '' }} -
                                    {{ $inventario->dependenciaushuaia->nombre ?? 'Sin dependencia' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Equipo</label>
                            <input type="text" wire:model="equipo" class="w-full rounded-md border-gray-300"
                                placeholder="PC, notebook, impresora">
                            @error('equipo')
                                <span class="text-xs text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Marca</label>
                            <input type="text" wire:model="marca" class="w-full rounded-md border-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Modelo</label>
                            <input type="text" wire:model="modelo" class="w-full rounded-md border-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nro serie / QR</label>
                            <input type="text" wire:model="numero_serie" class="w-full rounded-md border-gray-300">
                        </div>
                    </div>
                </section>

                <section>
                    <div class="bg-blue-700 text-white px-4 py-2 rounded-sm font-bold text-sm uppercase">
                        3. Problema indicado por el personal
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Descripcion del problema</label>
                        <textarea wire:model="problema_reportado" rows="5" class="w-full rounded-md border-gray-300"
                            placeholder="Detalle la falla, sintomas, ubicacion fisica del equipo y toda informacion util"></textarea>
                        @error('problema_reportado')
                            <span class="text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </section>

                <div class="flex flex-col sm:flex-row gap-3 justify-end">
                    <a href="{{ route('tickets.index') }}"
                        class="inline-flex justify-center px-4 py-2 rounded-md bg-slate-200 text-slate-800 font-bold">
                        Ver tickets
                    </a>
                    <button type="submit"
                        class="px-4 py-2 rounded-md bg-blue-800 hover:bg-blue-700 text-white font-bold">
                        Cargar ticket y avisar a Informatica
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
