<div class="py-5  bg-white  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('COMISARIA PRIMERA') }}

            </h2>
        </x-slot>
        <form wire:submit.prevent="edit">
            <div class="col-xs-12">

                <div class="flex flex-col p-4 rounded-md shadow-lg">

                    <div class="py-5 bg-white dark:bg-gray-100">
                        <!-- ... código anterior ... -->
                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">COMISARIA PRIMERA</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">
                                <!-- Contenido del acordeón aquí -->

                                <div class="grid grid-cols-3 gap-3 mb-10">
                                    <div class="mt-4">
                                        <select class="w-full form-control" wire:model="tipodeoficina_id">
                                            <option value="" selected disabled>Seleccione la oficina.</option>

                                            @foreach ($TipodeOficina as $tipoOfi)
                                                <option value="{{ $tipoOfi->id }}">{{ $tipoOfi->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('tipodeoficina_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-4">
                                        <select class="w-full form-control" wire:model="tipodispositivo_id">
                                            <option value="" selected disabled>Seleccione el dispositivo.</option>

                                            @foreach ($TipoDispositivo as $tipoDisp)
                                                <option value="{{ $tipoDisp->id }}">{{ $tipoDisp->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <select class="w-full form-control" wire:model="cantidadram_id">
                                            <option value="" selected disabled>Seleccione la cantidad de memoria
                                                Ram.</option>

                                            @foreach ($CantidadRam as $cantRam)
                                                <option value="{{ $cantRam->id }}">{{ $cantRam->cantidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="marca">Marca</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="marca" placeholder="Marca" value="{{ $comisaria->marca }}" />
                                        @error('marca')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="modelo">Modelo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="modelo" placeholder="Modelo"
                                            value="{{ $comisaria->modelo }}" />
                                        @error('modelo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="procesador">Procesador</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="procesador"
                                            placeholder="procesador"value="{{ $comisaria->procesador }}" />
                                        @error('procesador')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_servicio">Fecha
                                            del servicio</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_servicio" placeholder="Fecha de servicio"
                                            value="{{ $comisaria->fecha_servicio }}" />
                                        @error('fecha_servicio')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="almacenamiento">Almacenamiento</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="almacenamiento" placeholder="Almacenamiento"
                                            value="{{ $comisaria->almacenamiento }}" />
                                        @error('almacenamiento')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="monitor">Monitor</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="monitor" placeholder="Monitor/pulgadas"
                                            value="{{ $comisaria->monitor }}" />
                                        @error('monitor')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="tipo_servicio">Tipo de servicio</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_servicio"
                                            placeholder="Tipo de servicio"value="{{ $comisaria->tipo_servicio }}" />
                                        @error('tipo_servicio')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="sistema_operativo">Sistema Operativo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="sistema_operativo" placeholder="Sistema"
                                            value="{{ $comisaria->sistema_operativo }}" />
                                        @error('sistema_operativo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block mb-2 font-semibold">Activo</label>
                                        <select wire:model="activo" class="form-control w-full">
                                            <option value="1" @if ($comisaria->activo) selected @endif>
                                                Activo</option>
                                            <option value="0" @if (!$comisaria->activo) selected @endif>
                                                Inactivo</option>
                                        </select>
                                        @error('activo')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>


                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalles_servicios">Detalle del servicio</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalles_servicios" placeholder="Detalles del servicio"value="{{ $comisaria->detalles_servicios }}"></textarea>
                                    @error('detalles_servicios')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-2 ml-80">
                                    <label class="block mb-2 font-semibold">Código QR Actual</label>
                                    @if ($comisaria->codigo_qr)
                                        <img src="{{ asset('storage/codigoQR/' . $comisaria->codigo_qr) }}"
                                            alt="Código QR" class="max-w-full max-h-full">
                                    @else
                                        <p>No hay código QR disponible</p>
                                    @endif
                                </div>

                            </div>

                        </div>

                        {{--  @if ($comisariaprimera && $comisariaprimera->codigo_qr)
                            <div class="my-4">
                                <img src="{{ asset('storage/codigoQR/' . $comisariaprimera->codigo_qr) }}" alt="Código QR">
                            </div>
                           @endif --}}

                    </div>
                    <!-- ... resto del código ... -->
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-600 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">COMISARIA PRIMERA</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">
                            <!-- Contenido del acordeón aquí -->

                            <div class="p-2 mt-1">
                                <div class="grid grid-cols-3 gap-1 mb-10">
                                    <div class="flex flex-col mb-4" x-data="{ show: false }">
                                        <button href="#" x-on:click.prevent="show = !show"
                                            class="relative z-10 border border-gray-400 rounded px-4 py-2 bg-white flex justify-between items-center"
                                            :class="{ 'active': show }">
                                            <span class="inline-block">Comisaria Primera</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor"
                                                class="stroke-current inline-block w-4 h-4 transform transition-transform duration-150"
                                                :class="{ 'rotate-180': show }">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                        <div x-show.transition.fade="show"
                                            class="relative z-20 -mt-1 flex flex-col w-full px-4 py-4 whitespace-nowrap border border-gray-400 rounded bg-white">
                                            <!-- Contenido del input aquí -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-400 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">COMISARIA PRIMERA</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">
                            <!-- Contenido del acordeón aquí -->

                            <div class="p-2 mt-1">
                                <div class="grid grid-cols-3 gap-1 mb-10">
                                    <div class="flex flex-col mb-4" x-data="{ show: false }">
                                        <button href="#" x-on:click.prevent="show = !show"
                                            class="relative z-10 border border-gray-400 rounded px-4 py-2 bg-white flex justify-between items-center"
                                            :class="{ 'active': show }">
                                            <span class="inline-block">Comisaria Primera</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor"
                                                class="stroke-current inline-block w-4 h-4 transform transition-transform duration-150"
                                                :class="{ 'rotate-180': show }">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </button>
                                        <div x-show.transition.fade="show"
                                            class="relative z-20 -mt-1 flex flex-col w-full px-4 py-4 whitespace-nowrap border border-gray-400 rounded bg-white">
                                            <!-- Contenido del input aquí -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar
                            cambios</button>
                        <button type="button" wire:click="closeModal"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>





















{{--
<div>
    <div class="py-5  bg-gray-100  dark:bg-gray-100 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <x-slot name="header">
                <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                    {{ __('OFICINA DE PRONTUARIO') }}

                </h2>
            </x-slot>
            <h2 class="text-lg font-semibold mb-4">Editar Comisaría</h2>


<div class="grid grid-cols-3 gap-6 mt-4">
                                    <div class="mt-1">
            <form wire:submit.prevent="edit">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Tipo de Oficina</label>
                        <select wire:model="tipodeoficina_id" class="form-control w-full">
                            <option value="" disabled>Seleccione la oficina</option>
                            @foreach ($TipodeOficina as $tipoOfi)
                                <option value="{{ $tipoOfi->id }}">{{ $tipoOfi->nombre }}</option>
                            @endforeach
                        </select>
                        @error('tipodeoficina_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Tipo de Dispositivo</label>
                        <select wire:model="tipodispositivo_id" class="form-control w-full">
                            <option value="" disabled>Seleccione el dispositivo</option>
                            @foreach ($TipoDispositivo as $tipoDisp)
                                <option value="{{ $tipoDisp->id }}">{{ $tipoDisp->nombre }}</option>
                            @endforeach
                        </select>
                        @error('tipodispositivo_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Cantidad de RAM</label>
                        <select wire:model="cantidadram_id" class="form-control w-full">
                            <option value="" disabled>Seleccione la cantidad de RAM</option>
                            @foreach ($CantidadRam as $cantidadRam)
                                <option value="{{ $cantidadRam->id }}">{{ $cantidadRam->cantidad }}</option>
                            @endforeach
                        </select>
                        @error('cantidadram_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Marca</label>
                        <input wire:model="marca" type="text" class="form-control w-full"
                            value="{{ $comisaria->marca }}">
                        @error('marca')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Modelo</label>
                        <input wire:model="modelo" type="text" class="form-control w-full"
                            value="{{ $comisaria->modelo }}">
                        @error('modelo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Procesador</label>
                        <input wire:model="procesador" type="text" class="form-control w-full"
                            value="{{ $comisaria->procesador }}">
                        @error('procesador')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Almacenamiento</label>
                        <input wire:model="almacenamiento" type="text" class="form-control w-full"
                            value="{{ $comisaria->almacenamiento }}">
                        @error('almacenamiento')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Monitor</label>
                        <input wire:model="monitor" type="text" class="form-control w-full"
                            value="{{ $comisaria->monitor }}">
                        @error('monitor')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Sistema Operativo</label>
                        <input wire:model="sistema_operativo" type="text" class="form-control w-full"
                            value="{{ $comisaria->sistema_operativo }}">
                        @error('sistema_operativo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Tipo de Servicio</label>
                        <input wire:model="tipo_servicio" type="text" class="form-control w-full"
                            value="{{ $comisaria->tipo_servicio }}">
                        @error('tipo_servicio')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Fecha de Servicio</label>
                        <input wire:model="fecha_servicio" type="date" class="form-control w-full"
                            value="{{ $comisaria->fecha_servicio }}">
                        @error('fecha_servicio')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Activo</label>
                        <select wire:model="activo" class="form-control w-full">
                            <option value="1" @if ($comisaria->activo) selected @endif>Activo</option>
                            <option value="0" @if (!$comisaria->activo) selected @endif>Inactivo</option>
                        </select>
                        @error('activo')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Detalles del Servicio</label>
                        <textarea wire:model="detalles_servicios" class="form-control w-full" rows="4">{{ $comisaria->detalles_servicios }}</textarea>
                        @error('detalles_servicios')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>




                    <div class="col-span-2">
                        <label class="block mb-2 font-semibold">Código QR Actual</label>
                        @if ($comisaria->codigo_qr)
                            <img src="{{ asset('storage/codigoQR/' . $comisaria->codigo_qr) }}" alt="Código QR"
                                class="max-w-full max-h-full">
                        @else
                            <p>No hay código QR disponible</p>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar
                        cambios</button>
                    <button type="button" wire:click="closeModal"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Cancelar</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>
--}}
