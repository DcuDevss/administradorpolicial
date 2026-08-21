<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('INFORMATICA USHUAIA') }}
            </h2>
        </x-slot>
        <div class="col-xs-12">
            <div class="flex flex-col p-4 rounded-md shadow-lg">

                <div class="py-5 rounded-md bg-white dark:bg-gray-100">

                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between uppercase bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">Dependencias Operativas</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>

                        <div x-show.transition.in.duration.800ms="open" class="border p-4">
                            <form enctype="multipart/form-data">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">

                                    <div class="mt-2">
                                        <label for="dependencia_ushuaia_id"
                                            class="block text-sm font-medium text-gray-700">Tipo de dependencia:</label>
                                        <select class="w-full form-control rounded-md"
                                            wire:model="dependencia_ushuaia_id">
                                            <option value="" selected disabled>Seleccione la dependencia.</option>
                                            @foreach ($Dependencia_Ushuaia as $depeUshuaia)
                                                <option value="{{ $depeUshuaia->id }}">{{ $depeUshuaia->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if (
                                        $dependencia_ushuaia_id == 3 ||
                                            $dependencia_ushuaia_id == 4 ||
                                            $dependencia_ushuaia_id == 5 ||
                                            $dependencia_ushuaia_id == 6 ||
                                            $dependencia_ushuaia_id == 7 ||
                                            $dependencia_ushuaia_id == 8 ||
                                            $dependencia_ushuaia_id == 9)

                                        <div class="mt-2">
                                            <label for="tipodeoficina_id"
                                                class="block text-sm font-medium text-gray-700">Tipo de Oficina:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="tipodeoficina_id">
                                                <option value="" selected disabled>Seleccione la oficina.</option>
                                                @foreach ($TipodeOficina as $tipoOfi)
                                                    <option value="{{ $tipoOfi->id }}">{{ $tipoOfi->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($dependencia_ushuaia_id == 11)
                                        <div class="mt-2">
                                            <label for="custodiagubernamentale_id"
                                                class="block text-sm font-medium text-gray-700">Custodia Gubernamental:
                                            </label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="custodiagubernamentale_id">
                                                <option value="" selected disabled>Seleccione la oficina.
                                                </option>

                                                @foreach ($CUstodiagubernamentale as $cust)
                                                    <option value="{{ $cust->id }}">{{ $cust->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if ($dependencia_ushuaia_id == 10)
                                        <div class="mt-2">
                                            <label for="serviciosespeciale_id"
                                                class="block text-sm font-medium text-gray-700">Servicios Especiales:
                                            </label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="serviciosespeciale_id">
                                                <option value="" selected disabled>Seleccione la oficina.
                                                </option>
                                                @foreach ($SErviciosespeciale as $serv)
                                                    <option value="{{ $serv->id }}">{{ $serv->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif


                                    @if ($tipodeoficina_id == 11)
                                        <div class="mt-2">
                                            <label for="destacamento_id"
                                                class="block text-sm font-medium text-gray-700">Destacamentos:</label>
                                            <select class="w-full form-control rounded-md" wire:model="destacamento_id">
                                                <option value="" selected disabled>Seleccione el departamento.
                                                </option>
                                                @foreach ($DEstacamento as $desta)
                                                    <option value="{{ $desta->id }}">{{ $desta->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 mb-10">
                                    <div class="mt-2">
                                        <label for="tipodispositivo_id"
                                            class="block text-sm font-medium text-gray-700">Tipo de Dispositivo:</label>
                                        <select class="w-full form-control rounded-md" wire:model="tipodispositivo_id">
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
                                            del Inventario</label>
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
                                        for="softwares_instalados">Software instalados</label>
                                    <textarea
                                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                        wire:model="softwares_instalados" placeholder="Ingrese softwares"></textarea>
                                    @error('softwares_instalados')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
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
                                        type="button"
                                        data-wire="guardar"
                                        class="btn-confirm">
                                        Guardar!!
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">INVENTARIO GENERAL</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">
                            <h1 class="text-xl font-bold text-blue-800 mb-4">Total de computadoras en areas operativas:
                                <strong class="text-red-800 font-semibold"> {{ $sumaTotalPc }}</strong>
                            </h1>
                            <div class="text-center flex flex-wrap justify-center">
                                <button wire:click="showModal('Comisaria Primera')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Primera</button>
                                <button wire:click="showModal('Comisaria Segunda')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Segunda</button>
                                <button wire:click="showModal('Comisaria Tercera')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Tercera</button>
                                <button wire:click="showModal('Comisaria Cuarta')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Cuarta</button>
                                <button wire:click="showModal('Comisaria Quinta')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Quinta</button>
                                <button wire:click="showModal('Comisaria G.F y M.U-1')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria G.F y
                                    M.U-1</button>
                                <button wire:click="showModal('Comisaria G.F y M.U-2')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria G.F y
                                    M.U-2</button>
                                <button wire:click="showModal('Servicios Especiales')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Servicios
                                    Especiales</button>
                                <button wire:click="showModal('Custodia Gubernamental')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Custodia
                                    Gubernamental</button>
                                <button wire:click="showModal('Otras Dependencias')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Pc en
                                    Otras Dependencias</button>
                            </div>

                            <div class="grid grid-cols-4 gap-2 mb-10">
                                <div x-data="{ showModal: @entangle('showModal') }">
                                    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                        x-show="showModal" x-cloak>

                                        <div class="bg-white p-4 rounded-md shadow-md w-96"
                                            @click.away="showModal = false">
                                            <h2 class="text-2xl font-semibold mb-2 underline">Detalles del Inventario
                                            </h2>

                                            {{-- <p>Valor de showModal: {{ $showModal ? 'true' : 'false' }}</p> --}}

                                            <div class="mb-4">
                                                @switch($button)
                                                    @case('Comisaria Primera')
                                                        <div>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Total de Pc.
                                                                en
                                                                Comisaria
                                                                Primera: <strong
                                                                    class="text-red-800">{{ $primeraPc }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                del
                                                                jefe:
                                                                <strong class="text-red-800">{{ $Pcjefe }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                del
                                                                Subjefe: <strong
                                                                    class="text-red-800">{{ $Pcsubjefe }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Of. del
                                                                Oficial
                                                                servicio: <strong
                                                                    class="text-red-800">{{ $Pcofservicio }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Of.del
                                                                Oficial
                                                                sumariante: <strong
                                                                    class="text-red-800">{{ $Pcsumariante }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina de
                                                                SubOficiales
                                                                <strong class="text-red-800">{{ $SuboficialesPc }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina de
                                                                Jefe
                                                                de Turno
                                                                <strong class="text-red-800">{{ $JefeTurnoPc }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina de
                                                                Sevicios Externos: <strong
                                                                    class="text-red-800">{{ $ServiciosExternosPc }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina de
                                                                Servico de Guardia: <strong
                                                                    class="text-red-800">{{ $Pcguardia }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                de dia: <strong
                                                                    class="text-red-800">{{ $Pcdedia }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                administrativa: <strong
                                                                    class="text-red-800">{{ $Pcadministrativa }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                de
                                                                automotores: <strong
                                                                    class="text-red-800">{{ $Pcautomotores }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Monitor de Pc:
                                                                <strong class="text-red-800">{{ $monitor }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Notebook:
                                                                <strong class="text-red-800">{{ $notebook }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Netbook:
                                                                <strong class="text-red-800">{{ $netbook }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Celular:
                                                                <strong class="text-red-800">{{ $celular }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Tablet:
                                                                <strong class="text-red-800">{{ $tablet }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Impresoras a
                                                                Chorro:
                                                                <strong class="text-red-800">{{ $impresoraChorro }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Impresora
                                                                laser:
                                                                <strong class="text-red-800">{{ $impresoraLaser }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Switch/es:
                                                                <strong class="text-red-800">{{ $switch }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Camaras de
                                                                Videovigilancia:
                                                                <strong class="text-red-800">{{ $camaras }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Ruter/s:
                                                                <strong class="text-red-800">{{ $ruter }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Ups/s:
                                                                <strong class="text-red-800">{{ $ups }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Estacion de Trabajo:
                                                                <strong class="text-red-800">{{ $Estacion_trabajo }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Sevidor/es:
                                                                <strong class="text-red-800">{{ $servidor }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Estabilizador/es:
                                                                <strong class="text-red-800">{{ $Estabilizador }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Auricular/es:
                                                                <strong class="text-red-800">{{ $Auriculares }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Cable/es estructurado/s:
                                                                <strong class="text-red-800">{{ $Cable_estructurado }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Tv/es:
                                                                <strong class="text-red-800">{{ $Tv }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Central
                                                                telefonica:
                                                                <strong v>{{ $centralTelefonica }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Telefono
                                                                Inalambrico:
                                                                <strong v>{{ $telefonoInalambrico }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Telefono
                                                                fijo:
                                                                <strong v>{{ $telefonoFijo }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Otros
                                                                equipos:
                                                                <strong v>{{ $primeraotros }}</strong>
                                                            </p>
                                                        </div>
                                                    @break

                                                    @case('Comisaria Segunda')
                                                       <div>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Total de Pc.
                                                                en
                                                                Comisaria
                                                                Segunda: <strong
                                                                    class="text-red-800">{{ $segundaPc }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                del
                                                                jefe:
                                                                <strong class="text-red-800">{{ $Pcjefe2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                del
                                                                Subjefe: <strong
                                                                    class="text-red-800">{{ $PcSubjefe2da }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Of. del
                                                                Oficial
                                                                servicio: <strong
                                                                    class="text-red-800">{{ $Pcofservicio2da }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Of.del
                                                                Oficial
                                                                sumariante: <strong
                                                                    class="text-red-800">{{ $Pcsumariante2da }}</strong></p>

                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina de
                                                                Jefe
                                                                de Turno
                                                                <strong class="text-red-800">{{ $JefeTurno2daPc }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina de
                                                                Sevicios Externos: <strong
                                                                    class="text-red-800">{{ $ServiciosExternos2daPc }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina de
                                                                Servico de Guardia: <strong
                                                                    class="text-red-800">{{ $Pcguardia2da }}</strong></p>


                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                de dia: <strong
                                                                    class="text-red-800">{{ $Pcdedia2da }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                administrativa: <strong
                                                                    class="text-red-800">{{ $Pcadministrativa2da }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Pc Oficina
                                                                de
                                                                automotores: <strong
                                                                    class="text-red-800">{{ $Pcautomotores2da }}</strong></p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Monitor de Pc:
                                                                <strong class="text-red-800">{{ $monitor }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Notebook:
                                                                <strong class="text-red-800">{{ $notebook2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Netbook:
                                                                <strong class="text-red-800">{{ $netbook2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Celular:
                                                                <strong class="text-red-800">{{ $celular2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Tablet:
                                                                <strong class="text-red-800">{{ $tablet2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Impresoras a
                                                                Chorro:
                                                                <strong class="text-red-800">{{ $impresoraChorro2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Impresora
                                                                laser:
                                                                <strong class="text-red-800">{{ $impresoraLaser2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Switch/es:
                                                                <strong class="text-red-800">{{ $switch2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Camaras de
                                                                Videovigilancia:
                                                                <strong class="text-red-800">{{ $camaras2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Ruter/s:
                                                                <strong class="text-red-800">{{ $ruter2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Ups/s:
                                                                <strong class="text-red-800">{{ $ups2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Estacion de Trabajo:
                                                                <strong class="text-red-800">{{ $Estacion_trabajo2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Sevidor/es:
                                                                <strong class="text-red-800">{{ $servidor2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Estabilizador/es:
                                                                <strong class="text-red-800">{{ $Estabilizador2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Auricular/es:
                                                                <strong class="text-red-800">{{ $Auriculares2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Cable/es estructurado/s:
                                                                <strong class="text-red-800">{{ $Cable_estructurado2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Tv/es:
                                                                <strong class="text-red-800">{{ $Tv2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Central
                                                                telefonica:
                                                                <strong v>{{ $centralTelefonica2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Telefono
                                                                Inalambrico:
                                                                <strong v>{{ $telefonoInalambrico2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Telefono
                                                                fijo:
                                                                <strong v>{{ $telefonoFijo2da }}</strong>
                                                            </p>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Otros
                                                                equipos:
                                                                <strong v>{{ $segundaotros }}</strong>
                                                            </p>
                                                        </div>
                                                    @break

                                                    @case('Comisaria Tercera')
                                                    <div>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Total de Pc. en Comisaria Tercera:
                                                            <strong class="text-red-800">{{ $terceraPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del jefe:
                                                            <strong class="text-red-800">{{ $Pcjefe3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Subjefe:
                                                            <strong class="text-red-800">{{ $Pcsubjefe3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. servicio:
                                                            <strong class="text-red-800">{{ $Pcofservicio3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Of. sumariante:
                                                            <strong class="text-red-800">{{ $Pcsumariante3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de SubOficiales:
                                                            <strong class="text-red-800">{{ $Suboficiales3daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Jefe de Turno:
                                                            <strong class="text-red-800">{{ $JefeTurno3daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Servicios Externos:
                                                            <strong class="text-red-800">{{ $ServiciosExternos3daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. guardia:
                                                            <strong class="text-red-800">{{ $Pcguardia3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de dia:
                                                            <strong class="text-red-800">{{ $Pcdedia3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. administrativa:
                                                            <strong class="text-red-800">{{ $Pcadministrativa3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de automotores:
                                                            <strong class="text-red-800">{{ $Pcautomotores3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc en el Dto. 365:
                                                            <strong class="text-red-800">{{ $PcDTO365 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc en el Dto. 350:
                                                            <strong class="text-red-800">{{ $PcDTO350 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc en el Dto. 352:
                                                            <strong class="text-red-800">{{ $PcDTO352 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Monitores:
                                                            <strong class="text-red-800">{{ $monitor3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Notebooks:
                                                            <strong class="text-red-800">{{ $notebook3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Netbooks:
                                                            <strong class="text-red-800">{{ $netbook3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Celulares:
                                                            <strong class="text-red-800">{{ $celular3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Tablets:
                                                            <strong class="text-red-800">{{ $tablet3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresoras a Chorro:
                                                            <strong class="text-red-800">{{ $impresoraChorro3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora Laser:
                                                            <strong class="text-red-800">{{ $impresoraLaser3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Switch/es:
                                                            <strong class="text-red-800">{{ $switch3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Ruter/s:
                                                            <strong class="text-red-800">{{ $ruter3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            UPS:
                                                            <strong class="text-red-800">{{ $ups3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cámaras de video vigilancia:
                                                            <strong class="text-red-800">{{ $camaras3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estaciones de trabajo:
                                                            <strong class="text-red-800">{{ $Estacion_trabajo3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Servidor/es:
                                                            <strong class="text-red-800">{{ $servidor3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estabilizadores:
                                                            <strong class="text-red-800">{{ $Estabilizador3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Auriculares:
                                                            <strong class="text-red-800">{{ $Auriculares3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cable estructurado:
                                                            <strong class="text-red-800">{{ $Cable_estructurado3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            TV:
                                                            <strong class="text-red-800">{{ $Tv3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Central telefónica:
                                                            <strong class="text-red-800">{{ $centralTelefonica3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono fijo:
                                                            <strong class="text-red-800">{{ $telefonoFijo3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono inalámbrico:
                                                            <strong class="text-red-800">{{ $telefonoInalambrico3da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Otros equipos:
                                                            <strong class="text-red-800">{{ $terceraotros }}</strong>
                                                        </p>
                                                    </div>
                                                    @break

                                                    @case('Comisaria Cuarta')
                                                    <div>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Total de Pc. en Comisaria Cuarta:
                                                            <strong class="text-red-800">{{ $cuartaPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del jefe:
                                                            <strong class="text-red-800">{{ $Pcjefe4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Subjefe:
                                                            <strong class="text-red-800">{{ $Pcsubjefe4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. servicio:
                                                            <strong class="text-red-800">{{ $Pcofservicio4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Of. sumariante:
                                                            <strong class="text-red-800">{{ $Pcsumariante4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de SubOficiales:
                                                            <strong class="text-red-800">{{ $Suboficiales4daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Jefe de Turno:
                                                            <strong class="text-red-800">{{ $JefeTurno4daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Servicios Externos:
                                                            <strong class="text-red-800">{{ $ServiciosExternos4daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. guardia:
                                                            <strong class="text-red-800">{{ $Pcguardia4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de dia:
                                                            <strong class="text-red-800">{{ $Pcdedia4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. administrativa:
                                                            <strong class="text-red-800">{{ $Pcadministrativa4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de automotores:
                                                            <strong class="text-red-800">{{ $Pcautomotores4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Monitores:
                                                            <strong class="text-red-800">{{ $monitor4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Notebooks:
                                                            <strong class="text-red-800">{{ $notebook4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Netbooks:
                                                            <strong class="text-red-800">{{ $netbook4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Celulares:
                                                            <strong class="text-red-800">{{ $celular4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Tablets:
                                                            <strong class="text-red-800">{{ $tablet4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresoras a Chorro:
                                                            <strong class="text-red-800">{{ $impresoraChorro4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora Laser:
                                                            <strong class="text-red-800">{{ $impresoraLaser4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Switch/es:
                                                            <strong class="text-red-800">{{ $switch4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Ruter/s:
                                                            <strong class="text-red-800">{{ $ruter4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            UPS:
                                                            <strong class="text-red-800">{{ $ups4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cámaras de video vigilancia:
                                                            <strong class="text-red-800">{{ $camaras4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estaciones de trabajo:
                                                            <strong class="text-red-800">{{ $Estacion_trabajo4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Servidor/es:
                                                            <strong class="text-red-800">{{ $servidor4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estabilizadores:
                                                            <strong class="text-red-800">{{ $Estabilizador4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Auriculares:
                                                            <strong class="text-red-800">{{ $Auriculares4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cable estructurado:
                                                            <strong class="text-red-800">{{ $Cable_estructurado4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            TV:
                                                            <strong class="text-red-800">{{ $Tv4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Central telefónica:
                                                            <strong class="text-red-800">{{ $centralTelefonica4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono fijo:
                                                            <strong class="text-red-800">{{ $telefonoFijo4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono inalámbrico:
                                                            <strong class="text-red-800">{{ $telefonoInalambrico4da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Otros equipos:
                                                            <strong class="text-red-800">{{ $cuartaotros }}</strong>
                                                        </p>
                                                    </div>
                                                    @break

                                                    @case('Comisaria Quinta')
                                                    <div>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Total de Pc. en Comisaria Quinta:
                                                            <strong class="text-red-800">{{ $quintaPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del jefe:
                                                            <strong class="text-red-800">{{ $Pcjefe5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Subjefe:
                                                            <strong class="text-red-800">{{ $Pcsubjefe5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. servicio:
                                                            <strong class="text-red-800">{{ $Pcofservicio5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Of. sumariante:
                                                            <strong class="text-red-800">{{ $Pcsumariante5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de SubOficiales:
                                                            <strong class="text-red-800">{{ $Suboficiales5daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Jefe de Turno:
                                                            <strong class="text-red-800">{{ $JefeTurno5daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Servicios Externos:
                                                            <strong class="text-red-800">{{ $ServiciosExternos5daPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. guardia:
                                                            <strong class="text-red-800">{{ $Pcguardia5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de dia:
                                                            <strong class="text-red-800">{{ $Pcdedia5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. administrativa:
                                                            <strong class="text-red-800">{{ $Pcadministrativa5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de automotores:
                                                            <strong class="text-red-800">{{ $Pcautomotores5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Monitores:
                                                            <strong class="text-red-800">{{ $monitor5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Notebooks:
                                                            <strong class="text-red-800">{{ $notebook5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Netbooks:
                                                            <strong class="text-red-800">{{ $netbook5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Celulares:
                                                            <strong class="text-red-800">{{ $celular5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Tablets:
                                                            <strong class="text-red-800">{{ $tablet5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresoras a Chorro:
                                                            <strong class="text-red-800">{{ $impresoraChorro5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora Laser:
                                                            <strong class="text-red-800">{{ $impresoraLaser5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Switch/es:
                                                            <strong class="text-red-800">{{ $switch5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Ruter/s:
                                                            <strong class="text-red-800">{{ $ruter5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            UPS:
                                                            <strong class="text-red-800">{{ $ups5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cámaras de video vigilancia:
                                                            <strong class="text-red-800">{{ $camaras5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estaciones de trabajo:
                                                            <strong class="text-red-800">{{ $Estacion_trabajo5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Servidor/es:
                                                            <strong class="text-red-800">{{ $servidor5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estabilizadores:
                                                            <strong class="text-red-800">{{ $Estabilizador5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Auriculares:
                                                            <strong class="text-red-800">{{ $Auriculares5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cable estructurado:
                                                            <strong class="text-red-800">{{ $Cable_estructurado5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            TV:
                                                            <strong class="text-red-800">{{ $Tv5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Central telefónica:
                                                            <strong class="text-red-800">{{ $centralTelefonica5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono fijo:
                                                            <strong class="text-red-800">{{ $telefonoFijo5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono inalámbrico:
                                                            <strong class="text-red-800">{{ $telefonoInalambrico5da }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Otros equipos:
                                                            <strong class="text-red-800">{{ $quintaotros }}</strong>
                                                        </p>
                                                    </div>
                                                    @break

                                                    @case('Comisaria G.F y M.U-1')
                                                    <div>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Total de Pc. en Genero y Familia 1:
                                                            <strong class="text-red-800">{{ $flia1Pc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del jefe:
                                                            <strong class="text-red-800">{{ $PcjefeFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Subjefe:
                                                            <strong class="text-red-800">{{ $PcsubjefeFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. servicio:
                                                            <strong class="text-red-800">{{ $PcofservicioFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Of. sumariante:
                                                            <strong class="text-red-800">{{ $PcsumarianteFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de SubOficiales:
                                                            <strong class="text-red-800">{{ $SuboficialesPCFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Jefe de Turno:
                                                            <strong class="text-red-800">{{ $JefeTurnoPCFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Servicios Externos:
                                                            <strong class="text-red-800">{{ $ServiciosExternosPCFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. guardia:
                                                            <strong class="text-red-800">{{ $PcguardiaFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de dia:
                                                            <strong class="text-red-800">{{ $PcdediaFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. administrativa:
                                                            <strong class="text-red-800">{{ $PcadministrativaFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de automotores:
                                                            <strong class="text-red-800">{{ $PcautomotoresFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Monitores:
                                                            <strong class="text-red-800">{{ $monitorFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Notebooks:
                                                            <strong class="text-red-800">{{ $notebookFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Netbooks:
                                                            <strong class="text-red-800">{{ $netbookFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Celulares:
                                                            <strong class="text-red-800">{{ $celularFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Tablets:
                                                            <strong class="text-red-800">{{ $tabletFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresoras a Chorro:
                                                            <strong class="text-red-800">{{ $impresoraChorroFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora Laser:
                                                            <strong class="text-red-800">{{ $impresoraLaserFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Switch/es:
                                                            <strong class="text-red-800">{{ $switchFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Ruter/s:
                                                            <strong class="text-red-800">{{ $ruterFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            UPS:
                                                            <strong class="text-red-800">{{ $upsFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cámaras de video vigilancia:
                                                            <strong class="text-red-800">{{ $camarasFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estaciones de trabajo:
                                                            <strong class="text-red-800">{{ $Estacion_trabajoFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Servidor/es:
                                                            <strong class="text-red-800">{{ $servidorFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estabilizadores:
                                                            <strong class="text-red-800">{{ $EstabilizadorFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Auriculares:
                                                            <strong class="text-red-800">{{ $AuricularesFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cable estructurado:
                                                            <strong class="text-red-800">{{ $Cable_estructuradoFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            TV:
                                                            <strong class="text-red-800">{{ $TvFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Central telefónica:
                                                            <strong class="text-red-800">{{ $centralTelefonicaFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono fijo:
                                                            <strong class="text-red-800">{{ $telefonoFijoFlia1 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Otros equipos:
                                                            <strong class="text-red-800">{{ $flia1otros }}</strong>
                                                        </p>
                                                    </div>
                                                    @break

                                                    @case('Comisaria G.F y M.U-2')
                                                    <div>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Total de Pc. en Familia 2:
                                                            <strong class="text-red-800">{{ $flia2Pc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del jefe:
                                                            <strong class="text-red-800">{{ $PcjefeFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Subjefe:
                                                            <strong class="text-red-800">{{ $PcsubjefeFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. servicio:
                                                            <strong class="text-red-800">{{ $PcofservicioFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Of. sumariante:
                                                            <strong class="text-red-800">{{ $PcsumarianteFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de SubOficiales:
                                                            <strong class="text-red-800">{{ $SuboficialesPCFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Jefe de Turno:
                                                            <strong class="text-red-800">{{ $JefeTurnoPCFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina de Servicios Externos:
                                                            <strong class="text-red-800">{{ $ServiciosExternosPCFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. guardia:
                                                            <strong class="text-red-800">{{ $PcguardiaFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de dia:
                                                            <strong class="text-red-800">{{ $PcdediaFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. administrativa:
                                                            <strong class="text-red-800">{{ $PcadministrativaFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Of. de automotores:
                                                            <strong class="text-red-800">{{ $PcautomotoresFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Monitores:
                                                            <strong class="text-red-800">{{ $monitorFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Notebooks:
                                                            <strong class="text-red-800">{{ $notebookFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Netbooks:
                                                            <strong class="text-red-800">{{ $netbookFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Celulares:
                                                            <strong class="text-red-800">{{ $celularFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Tablets:
                                                            <strong class="text-red-800">{{ $tabletFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresoras a Chorro:
                                                            <strong class="text-red-800">{{ $impresoraChorroFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora Laser:
                                                            <strong class="text-red-800">{{ $impresoraLaserFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Switch/es:
                                                            <strong class="text-red-800">{{ $switchFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Ruter/s:
                                                            <strong class="text-red-800">{{ $ruterFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            UPS:
                                                            <strong class="text-red-800">{{ $upsFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cámaras de video vigilancia:
                                                            <strong class="text-red-800">{{ $camarasFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estaciones de trabajo:
                                                            <strong class="text-red-800">{{ $Estacion_trabajoFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Servidor/es:
                                                            <strong class="text-red-800">{{ $servidorFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estabilizadores:
                                                            <strong class="text-red-800">{{ $EstabilizadorFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Auriculares:
                                                            <strong class="text-red-800">{{ $AuricularesFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cable estructurado:
                                                            <strong class="text-red-800">{{ $Cable_estructuradoFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            TV:
                                                            <strong class="text-red-800">{{ $TvFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Central telefónica:
                                                            <strong class="text-red-800">{{ $centralTelefonicaFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono fijo:
                                                            <strong class="text-red-800">{{ $telefonoFijoFlia2 }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Otros equipos:
                                                            <strong class="text-red-800">{{ $flia2otros }}</strong>
                                                        </p>
                                                    </div>
                                                    @break

                                                    @case('Servicios Especiales')
                                                    <div>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Total de Pc. en Servicios Especiales:
                                                            <strong class="text-red-800">{{ $serviciosPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Jefe:
                                                            <strong class="text-red-800">{{ $PcjefeServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Subjefe:
                                                            <strong class="text-red-800">{{ $PcsubjefeServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc División Canes:
                                                            <strong class="text-red-800">{{ $PcCanes }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Operaciones Tácticas:
                                                            <strong class="text-red-800">{{ $PcOpTacticas }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Grupo Infantería:
                                                            <strong class="text-red-800">{{ $PcGrupoInfanteria }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Búsqueda y Rescate:
                                                            <strong class="text-red-800">{{ $PcBusquedaRescate }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Sección Explosivos:
                                                            <strong class="text-red-800">{{ $PcSeccionExplosivos }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Área Administrativa:
                                                            <strong class="text-red-800">{{ $PcAdministrativa }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Monitores:
                                                            <strong class="text-red-800">{{ $monitorServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Notebooks:
                                                            <strong class="text-red-800">{{ $notebookServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Netbooks:
                                                            <strong class="text-red-800">{{ $netbookServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Celulares:
                                                            <strong class="text-red-800">{{ $celularServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Tablets:
                                                            <strong class="text-red-800">{{ $tabletServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora Láser:
                                                            <strong class="text-red-800">{{ $impresoraLaserServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora a Chorro:
                                                            <strong class="text-red-800">{{ $impresoraChorroServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Switch/es:
                                                            <strong class="text-red-800">{{ $switchServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Router/s:
                                                            <strong class="text-red-800">{{ $ruterServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            UPS:
                                                            <strong class="text-red-800">{{ $upsServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cámaras de video vigilancia:
                                                            <strong class="text-red-800">{{ $camarasServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estaciones de trabajo:
                                                            <strong class="text-red-800">{{ $Estacion_trabajoServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Servidor/es:
                                                            <strong class="text-red-800">{{ $servidorServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estabilizadores:
                                                            <strong class="text-red-800">{{ $EstabilizadorServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Auriculares:
                                                            <strong class="text-red-800">{{ $AuricularesServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cable estructurado:
                                                            <strong class="text-red-800">{{ $Cable_estructuradoServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            TV:
                                                            <strong class="text-red-800">{{ $TvServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Central telefónica:
                                                            <strong class="text-red-800">{{ $centralTelefonicaServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono fijo:
                                                            <strong class="text-red-800">{{ $telefonoFijoServicios }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Otros equipos:
                                                            <strong class="text-red-800">{{ $serviciosotros }}</strong>
                                                        </p>
                                                    </div>
                                                    @break

                                                    @case('Custodia Gubernamental')
                                                    <div>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Total de Pc. en Custodia:
                                                            <strong class="text-red-800">{{ $custodiaPc }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Jefe:
                                                            <strong class="text-red-800">{{ $PcjefeCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Oficina del Subjefe:
                                                            <strong class="text-red-800">{{ $PcsubjefeCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Guardia Gubernamental:
                                                            <strong class="text-red-800">{{ $PcGuardiaGubernamentale }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Video Vigilancia:
                                                            <strong class="text-red-800">{{ $PcVideoVijilancia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Planta Baja:
                                                            <strong class="text-red-800">{{ $PcPlantaBaja }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Primer Piso:
                                                            <strong class="text-red-800">{{ $PcPrimerPiso }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Segundo Piso:
                                                            <strong class="text-red-800">{{ $PcSegundoPiso }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Superior Tribunal:
                                                            <strong class="text-red-800">{{ $PcSuperiorTribunal }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Presidencia:
                                                            <strong class="text-red-800">{{ $PcPrecidencia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Legislatura:
                                                            <strong class="text-red-800">{{ $PcLegislatura }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc CADIC:
                                                            <strong class="text-red-800">{{ $PcCadic }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Pc Casa de Gobierno:
                                                            <strong class="text-red-800">{{ $PcCasaGobierno }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Monitores:
                                                            <strong class="text-red-800">{{ $monitorCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Notebooks:
                                                            <strong class="text-red-800">{{ $notebookCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Netbooks:
                                                            <strong class="text-red-800">{{ $netbookCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Celulares:
                                                            <strong class="text-red-800">{{ $celularCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Tablets:
                                                            <strong class="text-red-800">{{ $tabletCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora Láser:
                                                            <strong class="text-red-800">{{ $impresoraLaserCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Impresora a Chorro:
                                                            <strong class="text-red-800">{{ $impresoraChorroCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Switch/es:
                                                            <strong class="text-red-800">{{ $switchCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Router/s:
                                                            <strong class="text-red-800">{{ $ruterCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            UPS:
                                                            <strong class="text-red-800">{{ $upsCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cámaras de video vigilancia:
                                                            <strong class="text-red-800">{{ $camarasCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estaciones de trabajo:
                                                            <strong class="text-red-800">{{ $Estacion_trabajoCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Servidor/es:
                                                            <strong class="text-red-800">{{ $servidorCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Estabilizadores:
                                                            <strong class="text-red-800">{{ $EstabilizadorCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Auriculares:
                                                            <strong class="text-red-800">{{ $AuricularesCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Cable estructurado:
                                                            <strong class="text-red-800">{{ $Cable_estructuradoCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            TV:
                                                            <strong class="text-red-800">{{ $TvCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Central telefónica:
                                                            <strong class="text-red-800">{{ $centralTelefonicaCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Teléfono fijo:
                                                            <strong class="text-red-800">{{ $telefonoFijoCustodia }}</strong>
                                                        </p>
                                                        <p class="text-metric-primary font-bold mb-2 text-xl">
                                                            Otros equipos:
                                                            <strong class="text-red-800">{{ $custodiaotros }}</strong>
                                                        </p>
                                                    </div>
                                                    @break

                                                    @case('Otras Dependencias')
                                                        <div>
                                                            <p class="text-metric-primary font-bold mb-2 text-xl">Total de Pc.
                                                                en
                                                                Otras Dependencias: <strong
                                                                    class="text-red-800">{{ $OtrasPc }}</strong>
                                                            </p>
                                                        @break

                                                        @default
                                                            <!-- Código por defecto si no se cumple ningún caso -->
                                                    @endswitch
                                                </div>
                                                <button
                                                    type="button"
                                                    class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-800 font-semibold"
                                                    @click="showModal = false; $wire.closeModal()">
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('informatica.general.index-inventario-general')
    </div>
