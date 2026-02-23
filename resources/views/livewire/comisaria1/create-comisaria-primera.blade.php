<div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('COMISARIA PRIMERA') }}
                {{--   <div class="float-right ml-10"><h2 class="text-orange-500 text-center ">ULTIMO LEGAJO REGISTRADO:<span class="font-bold text-amber-400 ml-1">{{ $contador_pront }}</span></h2> </div>
                    <div class="float-right mr-10"><h2 class="text-green-500 ">ULTIMO PRONTUARIO REGISTRADO:<span class="font-bold text-amber-400 ml-1">{{ $contador_lega }}</span></h2> </div> --}}
            </h2>
        </x-slot>

        <div class="p-4">
            <h2 class="text-xl font-bold mb-4">Notificaciones</h2>
            <ul>
                @foreach(auth()->user()->unreadNotifications as $notification)
                    <li class="text-red-800">
                        {{ $notification->data['title'] }}
                        <button wire:click="marcarComoLeida({{ $notification->id }})">Marcar como leída</button>
                    </li>
                @endforeach
            </ul>
        </div>

        <form enctype="multipart/form-data">
            <div class="col-xs-12">

           {{-- @if (session()->has('messaage'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Éxitooo!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-blue-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a.5.5 0 010 .707L10.707 10l3.641 3.641a.5.5 0 11-.707.707L10 10.707l-3.641 3.641a.5.5 0 01-.707-.707L9.293 10 5.652 6.359a.5.5 0 01.707-.707L10 9.293l3.641-3.641a.5.5 0 01.707 0z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
           @endif --}}

                <div class="flex flex-col p-4 rounded-md shadow-lg">

                    <div class="py-5 rounded-md bg-white dark:bg-gray-100">

                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">COMISARIA PRIMERA</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">

                                <div class="grid grid-cols-3 gap-3 mb-10">
                                    <div class="mt-2">
                                        <label for="tipodeoficina_id"
                                            class="block text-sm font-medium text-gray-700">Tipo de Oficina:</label>
                                        <select class="w-full form-control" wire:model="tipodeoficina_id">
                                            <option value="" selected disabled>Seleccione la oficina.</option>

                                            @foreach ($TipodeOficina as $tipoOfi)
                                                <option value="{{ $tipoOfi->id }}">{{ $tipoOfi->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{--  public $codigo_qr, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id,$slotmemoria_id,
                                    $comisariaprimera, $marca,$modelo, $procesador, $monitor, $sistema_operativo, $tipo_impresora,
                                    $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento,$tipo_mouse,$tipo_teclado; --}}

                                    <div class="mt-2">
                                        <label for="tipodispositivo_id"
                                            class="block text-sm font-medium text-gray-700">Tipo de Dispositivo:</label>
                                        <select class="w-full form-control" wire:model="tipodispositivo_id">
                                            <option value="" selected disabled>Seleccione el dispositivo.</option>
                                            @foreach ($TipoDispositivo as $tipoDisp)
                                                <option value="{{ $tipoDisp->id }}">{{ $tipoDisp->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="marca">Marca</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="marca" placeholder="Marca" />
                                        @error('marca')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="modelo">Modelo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="modelo" placeholder="Modelo" />
                                        @error('modelo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="procesador">Procesador</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="procesador" placeholder="procesador" />
                                        @error('procesador')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="procesador">Tipo
                                            de Ram</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_ram" placeholder="tipo de ram" />
                                        @error('tipo_ram')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label for="slotmemoria_id" class="block text-sm font-medium text-gray-700">Slot
                                            de memoria:</label>
                                        <select class="w-full form-control" wire:model="slotmemoria_id">
                                            <option value="" selected disabled>Slot de memoria
                                                Ram.</option>
                                            @foreach ($SlotMemoria as $slot)
                                                <option value="{{ $slot->id }}">{{ $slot->cantidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label for="cantidadram_id"
                                            class="block text-sm font-medium text-gray-700">Cantidad de memoria
                                            ram:</label>
                                        <select class="w-full form-control" wire:model="cantidadram_id">
                                            <option value="" selected disabled>Cantidad de memoria
                                                Ram.</option>
                                            @foreach ($CantidadRam as $cantRam)
                                                <option value="{{ $cantRam->id }}">{{ $cantRam->cantidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_servicio">Tipo de disco
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_disco" placeholder="Tipo de disco" />
                                        @error('tipo_disco')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="cant_almacenamiento">Cantidad de Almacenamiento</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="cant_almacenamiento"
                                            placeholder="Cantidad de almacenamiento" />
                                        @error('cant_almacenamiento')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="sistema_operativo">Sistema Operativo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="sistema_operativo" placeholder="Sistema" />
                                        @error('sistema_operativo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_inventario">Fecha
                                            del Invenatrio</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_inventario" placeholder="Fecha de Inventario" />
                                        @error('fecha_inventario')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="monitor">Tipo
                                            de Monitor</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="monitor" placeholder="Monitor/pulgadas" />
                                        @error('monitor')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="tipo_tecaldo">Tipo de Teclado</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_teclado" placeholder="Tipo de teclado" />
                                        @error('tipo_teclado')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="tipo_mouse">Tipo de Mouse</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_mouse" placeholder="Tipo de Mouse" />
                                        @error('tipo_mouse')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="tipo_impresora">Tipo de Impresora</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_impresora" placeholder="Tipo de Impresora" />
                                        @error('tipo_impresora')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="activo">Disp.
                                            En servicio/Fuera de servicio</label>
                                        <input type="checkbox"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="activo" />
                                        <label class="text-gray-700 text-sm" for="activo">Activo</label>
                                        @error('activo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalles_inventario">Detalle del inventario</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalles_inventario" placeholder="Detalles del Inventario"></textarea>
                                    @error('detalles_inventario')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
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
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
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
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
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
                        <div class="flex justify-end mt-4">
                            <button class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                wire:click="guardar">
                                Guardar!!
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>

</div>
