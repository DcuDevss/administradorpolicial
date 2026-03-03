<div class="py-5  bg-slate-800 dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('DIVISION SERVICIOS ESPECIALES') }}
            </h2>
        </x-slot>
        <form wire:submit.prevent="edit">
            <div class="col-xs-12">

                <div class="flex flex-col p-4 rounded-md shadow-lg">
                    <div class="py-5 bg-slate-800 dark:bg-gray-100">
                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">DIVISION SERVICIOS ESPECIALES</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">
                                <div class="grid grid-cols-3 gap-3 mb-10">
                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="equipocomunicacion_id">Tipo de equipo
                                        </label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="equipocomunicacion_id">
                                            <option value="" selected disabled>Seleccione el tipo de equipo.
                                            </option>

                                            @foreach ($EquipoComunicacion as $EquipoComu)
                                                <option value="{{ $EquipoComu->id }}">{{ $EquipoComu->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('equipocomunicacion_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="marcaequipo_id">Marca del equipo
                                        </label>
                                        <select class="w-full form-control rounded-md" wire:model="marcaequipo_id">
                                            <option value="" selected disabled>Seleccione el Equipo.</option>

                                            @foreach ($MarcaEquipo as $MarcaEqui)
                                                <option value="{{ $MarcaEqui->id }}">{{ $MarcaEqui->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="vhfantena_id">Tipo
                                            de antena
                                        </label>
                                        <select class="w-full form-control rounded-md" wire:model="vhfantena_id">
                                            <option value="" selected disabled>seleccione el tipo de antena
                                            </option>
                                            @foreach ($VhfAntena as $Vhf)
                                                <option value="{{ $Vhf->id }}">{{ $Vhf->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="lugar_colocacion">Lugar de colocacion
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="lugar_colocacion"
                                            value="{{ $comunicaciones->lugar_colocacion }}"
                                            placeholder="ingrese donde se encuentra el dispositivo" />
                                        @error('lugar_colocacion')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="modelo">Modelo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="modelo"value="{{ $comunicaciones->modelo }}"
                                            placeholder="Modelo" />
                                        @error('modelo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="nro_serie">Nro de
                                            serie</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="nro_serie"value="{{ $comunicaciones->nro_serie }}"
                                            placeholder="N° de Serie" />
                                        @error('nro_serie')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="condicion_equipo_comunicacion">Condicion del equipo
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="condicion_equipo_comunicacion"
                                            value="{{ $comunicaciones->condicion_equipo_comunicacion }}"
                                            placeholder="Condicion del equipo de comunicacion" />
                                        @error('condicion_equipo_comunicacion')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_service">Fecha
                                            de Service</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_service"value="{{ $comunicaciones->fecha_service }}"
                                            placeholder="ingrese fecha del service" />
                                        @error('fecha_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="tipo_service">Tipo
                                            de service
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_service"value="{{ $comunicaciones->tipo_service }}"
                                            placeholder="Ingrese tipo de service" />
                                        @error('tipo_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_inventario">Fecha
                                            del Invenatrio</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_inventario"value="{{ $comunicaciones->fecha_inventario }}"
                                            placeholder="Fecha de Inventario" />
                                        @error('fecha_inventario')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalle_inventario">Detalle del inventario</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalle_inventario"value="{{ $comunicaciones->detalle_inventario }}"
                                        placeholder="Detalles del Inventario"></textarea>
                                    @error('detalle_inventario')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                        </div>
                            <div class="flex gap-3 mt-6">
                                <button
                                    class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    type="button"
                                    data-wire="edit"
                                    class="btn-confirm">
                                    Guardar!!
                                </button>
                                <button
                                    type="button"
                                    onclick="history.back()"
                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
