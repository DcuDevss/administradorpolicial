<div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('D.C.U') }}
            </h2>
        </x-slot>
        <form wire:submit.prevent="edit">
            <div class="col-xs-12">

                <div class="flex flex-col p-4 rounded-md shadow-lg">

                    <div class="py-5 bg-slate-800 rounded-md dark:bg-gray-100">

                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">D.C.U</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">

                                <div class="grid grid-cols-3 gap-3 mb-10">


                                    <div class="mt-2">
                                        <label for="categoriacomunicacion_id"
                                            class="block text-sm font-medium text-gray-700">Categoria de Herramientas
                                        </label>
                                        <select class="w-full form-control" wire:model="categoriacomunicacion_id">
                                            <option value="" selected disabled>Seleccione la Categoria.
                                            </option>

                                            @foreach ($Categoriacomunicaciones as $catecomu)
                                                <option value="{{ $catecomu->id }}">{{ $catecomu->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mt-2">
                                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del
                                            Elemento:</label>
                                        <input type="text" id="nombre" name="nombre"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="nombre" placeholder="ingrese el nombre del elemento" />
                                        @error('nombre')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>





                                    <div class="mt-2">
                                        <label for="marca"
                                            class="block text-sm font-medium text-gray-700">Marca:</label>
                                        <input type="text" id="marca" name="marca"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="marca" placeholder="ingrese la marca del elemento" />
                                        @error('marca')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label for="modelo"
                                            class="block text-sm font-medium text-gray-700">Modelo:</label>
                                        <input type="text" id="modelo" name="modelo"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="modelo" placeholder="Ingrese el Modelo del Elemento" />
                                        @error('modelo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="numero_serie">N°
                                            de Serie:</label>
                                        <input type="text" id="numero_serie" name="numero_serie"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="numero_serie" placeholder="Ingrese N° de Serie del Elemento" />
                                        @error('numero_serie')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_service">Fecha
                                            de Service</label>
                                        <input type="date" id="fecha_service" name="fecha_service"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_service" placeholder="Ingrese la Fecha del Service" />
                                        @error('fecha_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="tipo_service">Tipo de service
                                        </label>
                                        <input type="text" id="tipo_service" name="tipo_service"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_service" placeholder="Ingrese Tipo de Service" />
                                        @error('tipo_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-white text-sm font-bold mb-1" for="estado">Estado
                                        </label>
                                        <input type="text" id="estado" name="estado"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="estado" placeholder="Condición del Equipo de Comunicación" />
                                        @error('estado')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_inventario">Fecha
                                            del Invenatrio</label>
                                        <input type="date" id="fecha_inventario" name="fecha_inventario"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_inventario" placeholder="Fecha de Inventario" />
                                        @error('fecha_inventario')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalle_inventario">Modificaciones Realizadas</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalle_inventario"value="{{ $comunicaciones->detalle_inventario }}"
                                        placeholder="Cargar Modificacion Realizada"></textarea>
                                    @error('detalle_inventario')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-data="{ mensaje: '' }">
                        <div class="mt-6">
                            <button @click="mensaje = '¡Cambios guardados correctamente!'"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Guardar cambios
                            </button>
                        </div>
                        <p x-show.transition.duration.500ms="mensaje"
                            class="mt-2 px-4 py-2  text-green-800 bg-green-100 border border-green-300 rounded max-w-xs mx-auto"
                            x-text="mensaje"></p>
                    </div>
                </div>
            </div>
    </div>
    </form>



</div>
</div>
