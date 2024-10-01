<div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('JEFATURA') }}
                {{--   <div class="float-right ml-10"><h2 class="text-orange-500 text-center ">ULTIMO LEGAJO REGISTRADO:<span class="font-bold text-amber-400 ml-1">{{ $contador_pront }}</span></h2> </div>
                    <div class="float-right mr-10"><h2 class="text-green-500 ">ULTIMO PRONTUARIO REGISTRADO:<span class="font-bold text-amber-400 ml-1">{{ $contador_lega }}</span></h2> </div> --}}
            </h2>
            <button class="bg-blue-800 rounded-md p-3 text-white">
                <a href="{{ route('ver-notificaciones') }}">Ordenes de Trabajo</a>
            </button>
        </x-slot>



        <div class="col-xs-12">
            <div class="flex flex-col p-4 shadow-lg">
                <div class="py-5 bg-white dark:bg-gray-100 rounded-md">
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">JEFATURA</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <form enctype="multipart/form-data">
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">


                                <div class="grid grid-cols-3 gap-3 mb-10">

                                      <div class="mt-2">
                                        <label for="equipocomunicacion_id"
                                            class="block text-sm font-medium text-gray-700">Tipo de
                                            Equipo:</label>
                                        <select class="w-full form-control" wire:model="equipocomunicacion_id">
                                            <option value="" selected disabled>Seleccione el equipo.
                                            </option>

                                            @foreach ($EquipoComunicacion as $equipoCom)
                                                <option value="{{ $equipoCom->id }}">{{ $equipoCom->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label for="marcaequipo_id"
                                            class="block text-sm font-medium text-gray-700">Marca del
                                            equipo:</label>
                                        <select class="w-full form-control" wire:model="marcaequipo_id">
                                            <option value="" selected disabled>Seleccione la marca.
                                            </option>
                                            @foreach ($MarcaEquipo as $marcaEqui)
                                                <option value="{{ $marcaEqui->id }}">{{ $marcaEqui->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-2">
                                        <label for="vhfantena_id" class="block text-sm font-medium text-gray-700">Tipo
                                            de Antena:
                                        </label>
                                        <select class="w-full form-control" wire:model="vhfantena_id">
                                            <option value="" selected disabled>Seleccione tipo de antena.
                                            </option>
                                            @foreach ($VhfAntena as $vhf)
                                                <option value="{{ $vhf->id }}">{{ $vhf->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="lugar_colocacion">Lugar de colocacion
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="lugar_colocacion"
                                            placeholder="ingrese donde se encuentra el dispositivo" />
                                        @error('lugar_colocacion')
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
                                        <label class="block text-gray-700 text-sm font-bold mb-1" for="nro_serie">Nro
                                            de
                                            serie</label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="nro_serie" placeholder="nro_serie" />
                                        @error('nro_serie')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="condicion_equipo_comunicacion">Condicion del equipo
                                        </label>
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="condicion_equipo_comunicacion"
                                            placeholder="Condeicion del equipo de comunicacion" />
                                        @error('condicion_equipo_comunicacion')
                                            <p class="text-red-500 text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>



                                    <div class="mt-1">
                                        <label class="block text-gray-700 text-sm font-bold mb-1"
                                            for="fecha_service">Fecha
                                            de Service</label>
                                        <input type="date"
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
                                        <input type="text"
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="tipo_service" placeholder="Ingrese tipo de service" />
                                        @error('tipo_service')
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


                                </div>

                                <div class="mt-1">
                                    <label class="block text-gray-700 text-sm font-bold mb-1"
                                        for="detalle_inventario">Detalle del inventario</label>
                                    <textarea
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
                        @if (session()->has('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                        @endif


                    </div>



                    <!-- ... resto del código ... -->
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">INVENTARIO JEFATURA</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">


                            <div class="grid grid-cols-4 gap-2 mb-10">
                                <div>
                                    <h1 class="text-red-800 text-lg font-bold mb-2">Total de equipos "Ht":
                                        {{ $HtCount }}</h1>
                                        <p class="text-purple-800 font-bold mb-2">Ht Sin datos: {{ $marcaSindatos }} </p>
                                        <p class="text-purple-800 font-bold mb-2">Ht Otros: {{ $marcaotros }} </p>
                                        <p class="text-purple-800 font-bold mb-2">Ht Motorola: {{ $marcaMotorola }} </p>
                                        <p class="text-purple-800 font-bold mb-2">Ht Kenwood: {{ $marcaKenwood }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Ht Yaesu: {{ $marcaYaesu }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Ht Hytera: {{ $marcaHytera }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Ht Alcom: {{ $marcaAlcom }} </p>
                                    </div>
                                <div>
                                    <h1 class="text-red-800 font-extrabold mb-2">Total de "Equipos Base":
                                        {{ $BaseCount }}</h1>
                                        <p class="text-purple-800 font-bold mb-2">Equipo Base Sin datos:{{ $baseSindatos }}</p>{{--
                                        <p class="text-purple-800 font-bold mb-2">Equipo Base Otros:{{ $baseotros }}</p> --}}
                                        <p class="text-purple-800 font-bold mb-2">Equipo Base Motorola:{{ $baseMotorola }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Equipo Base Kenwood:{{ $baseKenwood }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Equipo Base Yaesu:{{ $baseYaesu }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Equipo Base Hytera:{{ $baseHytera }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Equipo Base Alcom:{{ $baseAlcom }}</p>
                                     </div>
                                <div>
                                    <h1 class="text-red-800 font-extrabold mb-2">Total de "Antenas":
                                        {{ $AntenaCount }}</h1>
                                        <p class="text-purple-800 font-bold mb-2">Antena Otros:{{ $Otros }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Antena Sin datos:{{ $Sindatos }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Antena Dipolo 2:{{ $dipolo2 }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Antena Dipolo 4:{{ $dipolo4 }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Antena Dipolo 8:{{ $dipolo8 }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Antena Dipolo Yagi:{{ $yagi }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Antena Dipolo Latigo:{{ $latigo }}</p>
                                        <p class="text-purple-800 font-bold mb-2">Antena Ringo:{{ $ringo }}</p>
                                    </div>


                                <div>
                                    <p class="text-slate-800 font-extrabold mb-2">Total de "Repetidoras":
                                        {{ $RepetidoraCount }}</p>
                                    <p class="text-slate-800 font-extrabold mb-2">Total de "Fuentes de Poder":
                                        {{ $FuenteCount }}</p>
                                    <p class="text-slate-800 font-extrabold mb-2">Total de "Balizas":
                                        {{ $BalizaCount }}</p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">TABLA DE INVENTARIO JEFATURA</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    @livewire('comunicaciones.jefatura.index-comunicaciones-jefatura')
</div>
