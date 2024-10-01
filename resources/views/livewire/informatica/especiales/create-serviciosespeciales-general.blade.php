<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('SERVICIOS ESPECIALES') }}

            </h2>
        </x-slot>

        <div class="col-xs-12">
            <div class="flex flex-col p-4 rounded-md shadow-lg">

                <div class="py-5 rounded-md bg-white dark:bg-gray-100">



                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">ESTADISTICA GENERAL</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">
                            <!-- Contenido del acordeón aquí -->

                            {{-- return view('livewire.informatica.general.create-inventario-general',compact('primeraPc',
                                'Pcjefe','Pcsubjefe','Pcofservicio','Pcsumariante','Pcguardia','Pcdedia','Pcadministrativa',
                                'Pcautomotores','impresoraChorro','impresoraLaser','switch','ruter','servidor','centralTelefonica')); --}}
                         {{--
                            <p class="text-slate-800 font-bold mb-2">Pc en Comisaria Primera: {{ $primeraPc }} </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del jefe: {{ $Pcjefe }} </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del Subjefe: {{ $Pcsubjefe }} </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del Of. servicio: {{ $Pcofservicio }}
                            </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del Of. sumariante:
                                {{ $Pcsumariante }} </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del Of. guardia: {{ $Pcguardia }}
                            </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del Of. de dia: {{ $Pcdedia }}
                            </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del Of. administrativa:
                                {{ $Pcadministrativa }} </p>
                            <p class="text-purple-800 font-bold mb-2">Pc Oficina del Of de automotores:
                                {{ $Pcautomotores }} </p>
                            <p class="text-green-800 font-bold mb-2">Impresoras a Chorro: {{ $impresoraChorro }} </p>
                            <p class="text-green-800 font-bold mb-2">Impresora laser: {{ $impresoraLaser }} </p>
                            <p class="text-blue-800 font-bold mb-2">Switch/es: {{ $switch }} </p>
                            <p class="text-red-800 font-bold mb-2">Ruter/s: {{ $ruter }} </p>
                            <p class="text-amber-800 font-bold mb-2">Sevidor/es: {{ $servidor }} </p>
                            <p class="text-yellow-500 font-bold mb-2">Central telefonica: {{ $centralTelefonica }}
                            </p>
                            <p class="text-slate-800 font-bold mb-2">Telefono fijo: </p>--}}

                        </div>
                    </div>
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">Servicios especiales</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">


                            <form enctype="multipart/form-data">
                                <div class="grid grid-cols-3 gap-3 mb-10">
                                    <div class="mt-2">
                                        <label for="serviciosespeciale_id"
                                            class="block text-sm font-medium text-gray-700">Servicios
                                            especiales:</label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="serviciosespeciale_id">
                                            <option value="" selected disabled>Seleccione la seccion.</option>

                                            @foreach ($SErviciosespeciale as $especiales)
                                                <option value="{{ $especiales->id }}">{{ $especiales->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="grid grid-cols-3 gap-3 mb-10">

                                    <div class="mt-2">
                                        <label for="tipodispositivo_id"
                                            class="block text-sm font-medium text-gray-700">Tipo de
                                            Dispositivo:</label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="tipodispositivo_id">
                                            <option value="" selected disabled>Seleccione el dispositivo.
                                            </option>
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
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="procesador">Tipo
                                            de Ram</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_ram" placeholder="tipo de ram" />
                                        @error('tipo_ram')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label for="slotmemoria_id"
                                            class="block text-sm font-medium text-gray-700">Slot
                                            de memoria:</label>
                                        <select class="w-full form-control rounded-md" wire:model="slotmemoria_id">
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
                                        <select class="w-full form-control rounded-md" wire:model="cantidadram_id">
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
                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_service">Ultima fecha
                                            del service</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_service" placeholder="Fecha del service" />
                                        @error('fecha_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="tipo_service">Tipo de service
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_service" placeholder="tipo de service" />
                                        @error('tipo_service')
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

                                <div class="flex justify-end mt-4">
                                    <button
                                        class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        wire:click="guardarserviciosespeciales">
                                        Guardar!!
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@livewire('informatica.especiales.index-serviciosespeciales-general')

    </div>
</div>

