<div class="py-5 bg-slate-800 dark:bg-slate-800">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-red-500 leading-tight">
                {{ __('INFORMATICA RIO GRANDE') }}
            </h2>
        </x-slot>

        <form wire:submit.prevent="edit">
            <div class="col-xs-12">
                <div class="flex flex-col p-4 rounded-md shadow-lg">

                    <div class="py-5 bg-slate-800 dark:bg-gray-100">
                        <div x-data="{ open: false }" class="shadow-lg">
                            <div type="button"
                                 @click="open = !open"
                                 class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition cursor-pointer">
                                <p class="text-lg font-extrabold text-white">RIO GRANDE</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>

                            <div x-show.transition.in.duration.800ms="open" class="border p-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">

                                    {{-- Dependencia Rio Grande --}}
                                    <div class="mt-1">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1"
                                               for="dependencia_riogrande_id">Rio Grande</label>
                                        <select class="w-full form-control rounded-md"
                                                wire:model="dependencia_riogrande_id"
                                                id="dependencia_riogrande_id">
                                            <option value="" selected disabled>Seleccione la Dependencia</option>
                                            @foreach ($Dependencia_Riogrande as $riogrande)
                                                <option value="{{ $riogrande->id }}">{{ $riogrande->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('dependencia_riogrande_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Tipo oficina --}}
                                    <div class="mt-2">
                                        <label for="tipodeoficina_id"
                                               class="block text-text-gray-700 text-sm font-bold mb-1">Tipo de oficina</label>
                                        <select class="w-full form-control rounded-md"
                                                wire:model="tipodeoficina_id"
                                                id="tipodeoficina_id">
                                            <option value="" selected disabled>Seleccione la oficina</option>
                                            @foreach ($TipodeOficina as $rg)
                                                <option value="{{ $rg->id }}">{{ $rg->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('tipodeoficina_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Tipo dispositivo --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1"
                                               for="tipodispositivo_id">Tipo dispositivo</label>
                                        <select class="w-full form-control rounded-md"
                                                wire:model="tipodispositivo_id"
                                                id="tipodispositivo_id">
                                            <option value="" selected disabled>Seleccione el dispositivo</option>
                                            @foreach ($TipoDispositivo as $tipoDisp)
                                                <option value="{{ $tipoDisp->id }}">{{ $tipoDisp->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('tipodispositivo_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Cantidad RAM --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1"
                                               for="cantidadram_id">Cantidad de memoria ram</label>
                                        <select class="w-full form-control rounded-md"
                                                wire:model="cantidadram_id"
                                                id="cantidadram_id">
                                            <option value="" selected disabled>Seleccione la cantidad</option>
                                            @foreach ($CantidadRam as $cantRam)
                                                <option value="{{ $cantRam->id }}">{{ $cantRam->cantidad }}</option>
                                            @endforeach
                                        </select>
                                        @error('cantidadram_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Slot memoria --}}
                                    <div class="mt-2">
                                        <label for="slotmemoria_id"
                                               class="block text-text-gray-700 text-sm font-bold mb-1">Slot de memoria</label>
                                        <select class="w-full form-control rounded-md"
                                                wire:model="slotmemoria_id"
                                                id="slotmemoria_id">
                                            <option value="" selected disabled>Seleccione slot</option>
                                            @foreach ($SlotMemoria as $slot)
                                                <option value="{{ $slot->id }}">{{ $slot->cantidad }}</option>
                                            @endforeach
                                        </select>
                                        @error('slotmemoria_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Marca --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="marca">Marca</label>
                                        <input id="marca" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="marca" placeholder="Marca" />
                                        @error('marca')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Modelo --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="modelo">Modelo</label>
                                        <input id="modelo" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="modelo" placeholder="Modelo" />
                                        @error('modelo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Procesador --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="procesador">Procesador</label>
                                        <input id="procesador" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="procesador" placeholder="Procesador" />
                                        @error('procesador')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Tipo disco --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="tipo_disco">Tipo de disco</label>
                                        <input id="tipo_disco" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="tipo_disco" placeholder="Tipo de disco" />
                                        @error('tipo_disco')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Almacenamiento --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="cant_almacenamiento">Almacenamiento</label>
                                        <input id="cant_almacenamiento" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="cant_almacenamiento" placeholder="Almacenamiento" />
                                        @error('cant_almacenamiento')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Teclado --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="tipo_teclado">Tipo de teclado</label>
                                        <input id="tipo_teclado" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="tipo_teclado" placeholder="Tipo de teclado" />
                                        @error('tipo_teclado')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Mouse --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="tipo_mouse">Tipo de mouse</label>
                                        <input id="tipo_mouse" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="tipo_mouse" placeholder="Tipo de mouse" />
                                        @error('tipo_mouse')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Fecha service --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="fecha_service">Fecha del service</label>
                                        <input id="fecha_service" type="date"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="fecha_service" />
                                        @error('fecha_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Tipo service --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="tipo_service">Tipo de service</label>
                                        <input id="tipo_service" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="tipo_service" placeholder="Tipo de service" />
                                        @error('tipo_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Sistema operativo --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="sistema_operativo">Sistema Operativo</label>
                                        <input id="sistema_operativo" type="text"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="sistema_operativo" placeholder="Sistema Operativo" />
                                        @error('sistema_operativo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Activo --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1">Activo</label>
                                        <select wire:model="activo" class="form-control w-full rounded-md">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                        @error('activo')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Fecha inventario --}}
                                    <div class="mt-2">
                                        <label class="block text-text-gray-700 text-sm font-bold mb-1" for="fecha_inventario">Fecha del Inventario</label>
                                        <input id="fecha_inventario" type="date"
                                               class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                               wire:model="fecha_inventario" />
                                        @error('fecha_inventario')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Softwares --}}
                                <div class="mt-2">
                                    <label class="block text-text-gray-700 text-sm font-bold mb-1" for="softwares_instalados">Softwares instalados</label>
                                    <textarea id="softwares_instalados"
                                              class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                              wire:model="softwares_instalados"
                                              placeholder="Ingrese Software"></textarea>
                                    @error('softwares_instalados')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Modificación --}}
                                <div class="mt-2">
                                    <label class="block text-text-gray-700 text-sm font-bold mb-1" for="detalles_inventario">Modificacion Realizada</label>
                                    <textarea id="detalles_inventario"
                                              class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                              wire:model="detalles_inventario"
                                              placeholder="Ingrese la Modificacion Realizada"></textarea>
                                    @error('detalles_inventario')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- QR --}}
                                <div class="mt-2 ml-80">
                                    <label class="block mb-2 font-semibold">Código QR Actual</label>
                                    @if (!empty($riogrande) && $riogrande->codigo_qr)
                                        <img src="{{ asset('public/codigoQR/Riogrande/' . $riogrande->codigo_qr) }}"
                                             alt="Código QR" class="max-w-full max-h-full">
                                    @else
                                        <p>No hay código QR disponible</p>
                                    @endif
                                </div>
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
        </form>
    </div>
</div>
