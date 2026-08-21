<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('Trabajos Generales') }}

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
                                <p class="text-lg font-extrabold text-white">Trabajos Generales</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">


                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">

                                    <div class="mt-1">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="totaldependencia_id">Dependencias/departamentos/Oficinas en Ushuaia
                                        </label>
                                        <select class="w-full form-control rounded-md " wire:model="totaldependencia_id">
                                            <option value="" selected disabled> Seleccione lugar de trabajo en Ushuaia.</option>

                                            @foreach ($TOtaldependencia as $ushuaia)
                                                <option value="{{ $ushuaia->id }}">{{ $ushuaia->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('totaldependencia_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label for="dependencia_tolhuin_id"
                                            class="block text-sm font-medium text-white">Dependencias Tolhuin
                                            </label>
                                        <select class="w-full form-control rounded-md" wire:model="dependencia_tolhuin_id">
                                            <option value="" selected disabled>Seleccione la dependencia/oficina.
                                            </option>

                                            @foreach ($Dependencia_Tolhuin as $cien)
                                                <option value="{{ $cien->id }}">{{ $cien->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="lugar_trabajo">Lugar
                                            del Trabajo</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="lugar_trabajo" placeholder="ingrese el lugar de trabajo"
                                            value="{{ $informatico->lugar_trabajo }}" />
                                        @error('lugar_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-2">
                                        <label class="block text-white text-sm font-bold mb-1"
                                            for="fecha_trabajo">Fecha
                                            del Invenatrio</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_trabajo" placeholder="ingrese fecha del inventario"
                                            value="{{ $informatico->fecha_trabajo }}" />
                                        @error('fecha_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label class="block text-white text-sm font-bold mb-1"
                                        for="detalles_servicios">Detalle del Trabajo</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalles_trabajo" placeholder="Detalles del trabajo"value="{{ $informatico->detalles_trabajo }}"></textarea>
                                    @error('detalles_trabajo')
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
        </form>
    </div>
</div>
