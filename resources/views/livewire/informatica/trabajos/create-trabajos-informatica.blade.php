<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('TRABAJOS') }}
            </h2>
        </x-slot>
        <div class="col-xs-12">
            <div class="flex flex-col p-4 rounded-md shadow-lg">

                <div class="py-5 rounded-md bg-white dark:bg-gray-100">

                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">Dependencias</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">

                            <form enctype="multipart/form-data">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">

                                        <div class="mt-2">
                                            <label for="tipodeoficina_id"
                                                class="block text-sm font-medium text-gray-700">Dependencias Ushuaia:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="totaldependencia_id">
                                                <option value="" selected disabled>Seleccione dependencia.</option>
                                                @foreach ($TOtaldependencia as $totalDepe)
                                                    <option value="{{ $totalDepe->id }}">{{ $totalDepe->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    <div class="mt-2">
                                        <label for="dependencia_ushuaia_id"
                                            class="block text-sm font-medium text-gray-700">Dependencia Tolhuin:</label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="dependencia_tolhuin_id">
                                            <option value="" selected disabled>Seleccione la dependencia.</option>
                                            @foreach ($Dependencia_Tolhuin as $depeTolhuin)
                                                <option value="{{ $depeTolhuin->id }}">{{ $depeTolhuin->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">


                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="lugar_trabajo">Lugar de trabajo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="lugar_trabajo" placeholder="Ingrese lugar de trabajo"/>
                                        @error('lugar_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_trabajo">Fecha
                                            del trabajo</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_trabajo" placeholder="Fecha del service" />
                                        @error('fecha_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalles_trabajo">Detalle del trabajo</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalles_trabajo" placeholder="Detalles del Inventario"></textarea>
                                    @error('detalles_trabajo')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex justify-end mt-4">
                                    <button
                                        class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        wire:click="guardar">
                                        Guardar!!
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">ESTADISTICA GENERAL</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>{{-- $sumaTotalPc --}}
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">

                            @livewire('trabajos-generales-chart')



                                <div x-data="{ showModal: @entangle('showModal') }">
                                    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                        x-show="showModal" x-cloak>

                                        <div class="bg-white p-4 rounded-md shadow-md w-96"
                                            @click.away="showModal = false">
                                            <h2 class="text-2xl font-semibold mb-2 underline">Detalles del Inventario
                                            </h2>

                                            <button
                                                class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-800 font-semibold"
                                                wire:click="closeModal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
 @livewire('informatica.trabajos.index-trabajos-informatica')
    </div>

</div>

