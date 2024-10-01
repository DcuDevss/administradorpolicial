<div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('TRBAJOS GENERALES') }}
                {{--   <div class="float-right ml-10"><h2 class="text-orange-500 text-center ">ULTIMO LEGAJO REGISTRADO:<span class="font-bold text-amber-400 ml-1">{{ $contador_pront }}</span></h2> </div>
                    <div class="float-right mr-10"><h2 class="text-green-500 ">ULTIMO PRONTUARIO REGISTRADO:<span class="font-bold text-amber-400 ml-1">{{ $contador_lega }}</span></h2> </div> --}}
            </h2>
        </x-slot>
        <div class="col-xs-12">
            <div class="flex flex-col p-4 shadow-lg">
                <div class="py-5 bg-white dark:bg-gray-100 rounded-md">
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">TRABAJOS GENERALES</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <form enctype="multipart/form-data">
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">
                                <div class="grid grid-cols-3 gap-3 mb-10">
                                    <div class="mt-2">
                                        <label for="dependencia_ushuaia_id"
                                            class="block text-sm font-medium text-gray-700">Dependencias Ushuaia
                                            Equipo:</label>
                                        <select class="w-full form-control" wire:model="dependencia_ushuaia_id">
                                            <option value="" selected disabled>Seleccione dependencias.
                                            </option>

                                            @foreach ($Dependencia_Ushuaia as $ushuaia)
                                                <option value="{{ $ushuaia->id }}">{{ $ushuaia->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="mt-2">
                                        <label for="dependencia_riogrande_id"
                                            class="block text-sm font-medium text-gray-700">Dependencias Rio grande
                                        </label>
                                        <select class="w-full form-control" wire:model="dependencia_riogrande_id">
                                            <option value="" selected disabled>Seleccione la dependencia.
                                            </option>
                                            @foreach ($Dependencia_Riogrande as $riogrande)
                                                <option value="{{ $riogrande->id }}">{{ $riogrande->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label for="dependencia_tolhuin_id"
                                            class="block text-sm font-medium text-gray-700">Dependencias Tolhuin
                                        </label>
                                        <select class="w-full form-control" wire:model="dependencia_tolhuin_id">
                                            <option value="" selected disabled>Seleccione la dependencia.
                                            </option>
                                            @foreach ($Dependencia_Tolhuin as $tolhuin)
                                                <option value="{{ $tolhuin->id }}">{{ $tolhuin->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label for="otras_institucione_id"
                                            class="block text-sm font-medium text-gray-700">Instituciones varias
                                        </label>
                                        <select class="w-full form-control" wire:model="otras_institucione_id">
                                            <option value="" selected disabled>Seleccione la institucion.
                                            </option>
                                            @foreach ($Otras_Institucione as $instituciones)
                                                <option value="{{ $instituciones->id }}">{{ $instituciones->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="lugar_trabajo">Lugar de trabajo
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="lugar_trabajo" placeholder="ingrese donde lugar de trabajo" />
                                        @error('lugar_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_service">Fecha
                                            de Trabajo</label>
                                        <input type="date"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_trabajo" placeholder="ingrese fecha de trabajo " />
                                        @error('fecha_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-2">
                                        <label for="tecnicocomunicacione_id"
                                            class="block text-sm font-medium text-gray-700">Tecnico designado/s
                                        </label>
                                        <select class="w-full form-control" wire:model="tecnicocomunicacione_id">
                                            <option value="" selected disabled>Seleccione el tecnico.
                                            </option>
                                            @foreach ($Tecnico_Comunicacione as $tecnico)
                                                <option value="{{ $tecnico->id }}">{{ $tecnico->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalle_inventario">Detalle del Trabajo</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalle_trabajo" placeholder="Ingese el detalle del trabajo"></textarea>
                                    @error('detalle_trabajo')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex justify-end mr-3 mt-4">
                                    <button class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        wire:click="guardar">
                                        Guardar!!
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>



                </div>

            </div>
        </div>
    </div>
    @livewire('comunicaciones.general.index-trabajo-general')
</div>
