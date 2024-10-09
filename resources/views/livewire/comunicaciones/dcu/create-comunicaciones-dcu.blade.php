<div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('D.C.U') }}
        </x-slot>



        <div class="col-xs-12">
            <div class="py-5 bg-white dark:bg-gray-100 rounded-md">
                <div x-data="{ open: false }" class="shadow-lg">
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-medium text-white">D.C.U</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <form enctype="multipart/form-data">
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">

                                <div class="grid grid-cols-3 gap-3 mb-10">


                                    <div class="mt-2">
                                        <label for="categoriacomunicacion_id"
                                            class="block text-sm font-medium text-gray-700">categoria de herramientas
                                        </label>
                                        <select class="w-full form-control" wire:model="categoriacomunicacion_id">
                                            <option value="">Seleccione la categoría</option>
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
                                            wire:model="modelo" placeholder="ingrese el modelo del elemento" />
                                        @error('modelo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="numero_serie">N°
                                            de Serie:</label>
                                        <input type="text" id="numero_serie" name="numero_serie"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="numero_serie" placeholder="ingrese N° de serie del elemento" />
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
                                            wire:model="fecha_service" placeholder="ingrese fecha del service" />
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
                                            wire:model="tipo_service" placeholder="Ingrese tipo de service" />
                                        @error('tipo_service')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="estado">Estado
                                        </label>
                                        <input type="text" id="estado" name="estado"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="estado" placeholder="Estado del equipo de comunicacion" />
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
                                        for="detalle_inventario">Detalle del inventario</label>
                                    <textarea id="detalle_inventario" name="detalle_inventario"
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalle_inventario" placeholder="Detalles del Inventario"></textarea>
                                    @error('detalle_inventario')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex justify-end mr-3 mt-4">
                                    <button
                                        class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        wire:click="guardar">
                                        Guardar!!
                                    </button>
                                </div>

                            </div>



                        </form>


                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">INVENTARIO D.C.U</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">


                                <div class="grid grid-cols-4 gap-2 mb-10">
                                    <div>
                                        <p class="text-slate-800 text-lg font-bold mb-2">Total del Heramientas comunes:
                                            {{ $HerramientacomunCount }}</p>
                                        <p class="text-slate-800 text-lg font-bold mb-2">Total del Heramientas de
                                            medición:
                                            {{ $HerramientamedicionCount }}</p>
                                        <p class="text-slate-800 text-lg font-bold mb-2">Total de Equipos informaticos:
                                            {{ $EquipoinformaticoCount }}</p>
                                        <p class="text-slate-800 text-lg font-bold mb-2">Total de Equipos de radio:
                                            {{ $EquiporadioCount }}</p>
                                        <p class="text-slate-800 text-lg font-bold mb-2">Total de Equippos de Radio en
                                            la guardia:
                                            {{ $EquipoguardiaradioCount }}</p>
                                        <p class="text-slate-800 text-lg font-bold mb-2">Total de Otros Equipos:
                                            {{ $OtrosCount }}</p>
                                    </div>

                                </div>

                            </div>


                            @livewire('comunicaciones.dcu.index-comunicaciones-dcu')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
