<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('TOLHUIN') }}

            </h2>
        </x-slot>
        <form wire:submit.prevent="edit">
            <div class="col-xs-12">

                <div class="flex flex-col p-4 rounded-md shadow-lg">

                    <div class="py-5 bg-slate-800 dark:bg-slate-800">
                        <!-- ... código anterior ... -->
                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">TOLHUIN</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">
                                <!-- Contenido del acordeón aquí -->

                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">


                                    <div class="mt-1">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="tolhuin_id">Tolhuin
                                        </label>
                                        <select class="w-full form-control rounded-md " wire:model="dependencia_tolhuin_id">
                                            <option value="" selected disabled> Seleccione la Dependencia</option>

                                            @foreach ($Dependencia_Tolhuin as $tolhuin)
                                            <option value="{{ $tolhuin->id }}">{{ $tolhuin->nombre }}
                                            </option>
                                        @endforeach
                                        </select>
                                        @error('tolhuin_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mt-2">
                                        <label for="administracion_id"
                                            class="block text-sm font-medium text-gray-700">Tolhuin:</label>
                                        <select class="w-full form-control rounded-md" wire:model="tipodeoficina_id">
                                            <option value="" selected disabled>Seleccione la oficina
                                            </option>

                                            @foreach ($TipodeOficina as $tol)
                                                <option value="{{ $tol->id }}">{{ $tol->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                     <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="tipodispositivo_id">Tipo dispositivo
                                        </label>
                                        <select class="w-full form-control rounded-md" wire:model="tipodispositivo_id">
                                            <option value="" selected disabled>Seleccione el dispositivo.</option>

                                            @foreach ($TipoDispositivo as $tipoDisp)
                                                <option value="{{ $tipoDisp->id }}">{{ $tipoDisp->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="cantidadram_id">Cantidad de memoria ram
                                        </label>
                                        <select class="w-full form-control rounded-md" wire:model="cantidadram_id">
                                            <option value="" selected disabled>Seleccione la cantidad de memoria
                                                Ram.</option>

                                            @foreach ($CantidadRam as $cantRam)
                                                <option value="{{ $cantRam->id }}">{{ $cantRam->cantidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label for="slotmemoria_id"
                                            class="block text-sm font-medium text-white">Slot
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
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="marca">Marca</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="marca" placeholder="Marca" value="{{ $tolhuin->marca }}" />
                                        @error('marca')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="modelo">Modelo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="modelo" placeholder="Modelo"
                                            value="{{ $tolhuin->modelo }}" />
                                        @error('modelo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="procesador">Procesador</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="procesador"
                                            placeholder="procesador"value="{{ $tolhuin->procesador }}" />
                                        @error('procesador')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="cant_almacenamiento">Tipo de disco</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_disco" placeholder="Ingrese tipo de disco"
                                            value="{{ $tolhuin->tipo_disco }}" />
                                        @error('tipo_disco')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="cant_almacenamiento">Almacenamiento</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="cant_almacenamiento" placeholder="Almacenamiento"
                                            value="{{ $tolhuin->cant_almacenamiento }}" />
                                        @error('cant_almacenamiento')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="tipo_teclado">Tipo de teclado</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_teclado" placeholder="Ingrese tipo de teclado"
                                            value="{{ $tolhuin->tipo_teclado }}" />
                                        @error('tipo_teclado')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="tipo_mouse">Tipo de mouse</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_mouse" placeholder="Ingrese tipo mouse"
                                            value="{{ $tolhuin->tipo_mouse }}" />
                                        @error('tipo_mouse')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="fecha_servicio">Fecha
                                            del service</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_service" placeholder="Fecha de servicio"
                                            value="{{ $tolhuin->fecha_service }}" />
                                        @error('fecha_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="tipo_servicio">Tipo de service</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_service"
                                            placeholder="Tipo de servicio"value="{{ $tolhuin->tipo_service }}" />
                                        @error('tipo_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="sistema_operativo">Sistema Operativo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="sistema_operativo" placeholder="Sistema"
                                            value="{{ $tolhuin->sistema_operativo }}" />
                                        @error('sistema_operativo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block mb-2 text-white text-sm  font-bold">Activo</label>
                                        <select wire:model="activo" class="form-control w-full rounded-md">
                                            <option value="1" @if ($tolhuin->activo) selected @endif>
                                                Activo</option>
                                            <option value="0" @if (!$tolhuin->activo) selected @endif>
                                                Inactivo</option>
                                        </select>
                                        @error('activo')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="fecha_inevenatrio">Fecha
                                            del Invenatrio</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_inventario" placeholder="ingrese fecha del inventario"
                                            value="{{ $tolhuin->fecha_inventario }}" />
                                        @error('fecha_servicio')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>
                                <div class="mt-2">
                                    <label class="block text-white text-sm font-bold mb-1"
                                        for="softwares_instalados">Softwares instalados</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="softwares_instalados" placeholder="Ingrese Software"value="{{ $tolhuin->softwares_instalados }}"></textarea>
                                    @error('softwares_instalados')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <label class="block text-white text-sm font-bold mb-1"
                                        for="detalles_servicios">Detalle de Modificacion</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalles_inventario" placeholder="Ingrese la Modificacion Realizada"value="{{ $tolhuin->detalles_inventario }}"></textarea>
                                    @error('detalles_inventario')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-2 ml-80">
                                    <label class="block mb-2 font-semibold">Código QR Actual</label>
                                    @if ($tolhuin->codigo_qr)
                                        <img src="{{ asset('public/codigoQR/Tolhuin/' . $tolhuin->codigo_qr) }}"
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
                            class="flex items-center justify-between bg-slate-400 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">ESTADISTICA</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">
                            <!-- Contenido del acordeón aquí -->

                        </div>
                    </div>
                    <div x-data="{ mensaje: '' }">
                        <div class="mt-6">
                            <button @click="mensaje = '¡Cambios guardados correctamente!'"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Guardar cambios
                            </button>
                        </div>
                        <p x-show.transition.duration.500ms="mensaje" class="mt-2 px-4 py-2  text-green-800 bg-green-100 border border-green-300 rounded max-w-xs mx-auto" x-text="mensaje"></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
