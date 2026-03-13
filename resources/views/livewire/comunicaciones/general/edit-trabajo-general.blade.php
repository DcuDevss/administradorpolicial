<div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('TRABAJO GENERAL') }}
            </h2>
        </x-slot>
        <form wire:submit.prevent="edit">
            <div class="col-xs-12">
                <div class="flex flex-col p-4 rounded-md shadow-lg">
                    <div class="py-5 bg-slate-800 rounded-md dark:bg-gray-100">
                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">TRABAJOS GENERALES</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">
                                <div class="grid grid-cols-3 gap-3 mb-10">
                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="dependencia_ushuaia_id">Dependencias en Ushuaia
                                        </label>
                                        <select class="w-full form-control rounded-md "
                                            wire:model="dependencia_ushuaia_id">
                                            <option value="" selected disabled> Seleccione dependencias en
                                                Ushuaia.</option>

                                            @foreach ($Dependencia_Ushuaia as $ushuaia)
                                                <option value="{{ $ushuaia->id }}">{{ $ushuaia->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('dependencia_ushuaia_id')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="dependencia_riogrande_id">Dependencias en Rio grande
                                        </label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="dependencia_riogrande_id">
                                            <option value="" selected disabled>Seleccione la dependencia Rio
                                                grande.</option>

                                            @foreach ($Dependencia_Riogrande as $riogrande)
                                                <option value="{{ $riogrande->id }}">{{ $riogrande->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="dependencia_tolhuin_id">Dependencias Tolhuin
                                        </label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="dependencia_tolhuin_id">
                                            <option value="" selected disabled>Seleccione la dependencia en
                                                Tolhuin
                                            </option>
                                            @foreach ($Dependencia_Tolhuin as $tolhuin)
                                                <option value="{{ $tolhuin->id }}">{{ $tolhuin->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="otras_institucione_id">Otras instituciones
                                        </label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="otras_institucione_id">
                                            <option value="" selected disabled>Otras Instituciones
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
                                            wire:model="lugar_trabajo" value="{{ $trabajo->lugar_trabajo }}"
                                            placeholder="ingrese el lugar de trabajo" />
                                        @error('lugar_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_service">Fecha de Trabajo</label>
                                        <input type="date" lang="es"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="fecha_trabajo" value="{{ $trabajo->fecha_trabajo }}"/>
                                        @error('fecha_trabajo')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                        @if($trabajo->$fecha_trabajo)
                                            <p class="text-metric-primary font-bold mt-2">
                                                {{ \Carbon\Carbon::parse($trabajo->$fecha_trabajo)->format('Y-m-d') }}
                                            </p>
                                        @endif
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="dependencia_riogrande_id">Tecnico/s que efectuo el trabajo
                                        </label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="tecnicocomunicacione_id">
                                            <option value="" selected disabled>Seleccione el tecnico/s
                                            </option>
                                            @foreach ($Tecnico_Comunicacione as $tecnico)
                                                <option value="{{ $tecnico->id }}">{{ $tecnico->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalle_trabajo">Modificacion Realizada</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="detalle_trabajo" placeholder="Ingrese la Modificacion Realizada"></textarea>
                                    @error('detalle_trabajo')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- ... resto del código ... -->
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
            </div>
        </form>
    </div>
</div>
