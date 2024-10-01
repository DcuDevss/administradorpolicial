<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('INFORMATICA TOLHUIN') }}

            </h2>
        </x-slot>

        <div class="col-xs-12">
            <div class="flex flex-col p-4 rounded-md shadow-lg">

                <div class="py-5 rounded-md bg-white dark:bg-gray-100">



                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">INVENTARIO INFORMATICA TOLHUIN</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">


                            <h1 class="text-xl font-bold text-blue-800 mb-4">Total de computadoras en Tolhuin:
                                <strong class="text-red-800 font-semibold"> {{ $sumaTotalPc }}</strong>
                            </h1>
                            <div class="text-center flex flex-wrap justify-center">
                                <button wire:click="showModal('Comisaria Tolhuin')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Tolhuin</button>
                                <button wire:click="showModal('Comisaria G.F. y M-T')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria G Y F-T</button>
                                <button wire:click="showModal('Policia Cientifica Tolhuin')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Cientifica Tolhuin</button>
                                <button wire:click="showModal('D.R.Z.C')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">D.R.Z.N</button>
                                <button wire:click="showModal('Investigaciones Tolhuin')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Investigaciones
                                    Tolhuin</button>
                                <button wire:click="showModal('Brigada Narcocriminalidad Tolhuin')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Narco Tolhuin</button>
                                <button wire:click="showModal('Brigada Delitos Complejos Tolhuin')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Complejos Tolhuin</button>
                                <button wire:click="showModal('Brigada Rural')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Brigada Rural</button>
                                <button wire:click="showModal('Repetidora Cerro Michi')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Cerro Michi</button>
                                <button wire:click="showModal('Repetidora Estancia Tepi')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Estancia Tepi</button>
                                <button wire:click="showModal('Dto. Lago Escondido 460')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Lago
                                    Escondido</button>
                                <button wire:click="showModal('Dto. Control de Ruta 480')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Dto. 480</button>
                                <button wire:click="showModal('Otras Dependencias')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Pc en Otras
                                    Dependencias</button>
                            </div>

                        </div>
                    </div>

                    <div x-data="{ showModal: @entangle('showModal') }">
                        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                            x-show="showModal" x-cloak>

                            <div class="bg-white p-4 rounded-md shadow-md w-96" @click.away="showModal = false">
                                <h2 class="text-2xl font-semibold mb-2 underline">Detalles del Inventario
                                </h2>



                                <div class="mb-4">
                                    @switch($button)
                                        @case('Comisaria Tolhuin')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Comisaria
                                                    Tolhuin: <strong class="text-red-800">{{ $tolhuinPc }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjefe }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    Subjefe: <strong class="text-red-800">{{ $Pcsubjefe }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong class="text-red-800">{{ $Pcofservicio }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of.del Oficial
                                                    sumariante: <strong class="text-red-800">{{ $Pcsumariante }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales
                                                    <strong class="text-red-800">{{ $SuboficialesPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno
                                                    <strong class="text-red-800">{{ $JefeTurnoPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Sevicios Externos: <strong
                                                        class="text-red-800">{{ $ServiciosExternosPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Servico de Guardia: <strong
                                                        class="text-red-800">{{ $Pcguardia }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina
                                                    de dia: <strong class="text-red-800">{{ $Pcdedia }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina
                                                    administrativa: <strong
                                                        class="text-red-800">{{ $Pcadministrativa }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina
                                                    de
                                                    automotores: <strong class="text-red-800">{{ $Pcautomotores }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorro }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLaser }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switch }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camaras }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $ruter }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidor }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong v>{{ $centralTelefonica }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong v>{{ $telefonoFijo }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong v>{{ $tolhuinotros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Comisaria G.F. y M-T')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Comisaria
                                                    G y F-T: <strong class="text-red-800">{{ $generoPc }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjefegenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    Subjefe: <strong class="text-red-800">{{ $Pcsubjefegenero }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong class="text-red-800">{{ $Pcofserviciogenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of.del Oficial
                                                    sumariante: <strong class="text-red-800">{{ $Pcsumariantegenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales
                                                    <strong class="text-red-800">{{ $SuboficialesPcgenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno
                                                    <strong class="text-red-800">{{ $JefeTurnoPcgenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Sevicios Externos: <strong
                                                        class="text-red-800">{{ $ServiciosExternosPcgenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Servico de Guardia: <strong
                                                        class="text-red-800">{{ $Pcguardiagenero }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina
                                                    de dia: <strong class="text-red-800">{{ $Pcdediagenero }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina
                                                    administrativa: <strong
                                                        class="text-red-800">{{ $Pcadministrativagenero }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina
                                                    de
                                                    automotores: <strong
                                                        class="text-red-800">{{ $Pcautomotoresgenero }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorrogenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLasergenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchgenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarasgenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $rutergenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidorgenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicagenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijogenero }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $generootros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Policia Cientifica Tolhuin')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Comisaria
                                                    G y F-T: <strong class="text-red-800">{{ $cientPc }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjefecient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    Subjefe: <strong class="text-red-800">{{ $Pcsubjefecient }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong class="text-red-800">{{ $Pcofserviciocient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of.del Oficial
                                                    sumariante: <strong class="text-red-800">{{ $Pcsumariantecient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales
                                                    <strong class="text-red-800">{{ $SuboficialesPccient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno
                                                    <strong class="text-red-800">{{ $JefeTurnoPccient }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Servico de Guardia: <strong
                                                        class="text-red-800">{{ $Pcguardiacient }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina
                                                    administrativa: <strong
                                                        class="text-red-800">{{ $Pcadministrativacient }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorrocient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLasercient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchcient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarascient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $rutercient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidorcient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicacient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijocient }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $cientotros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('D.R.Z.C')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    D.R.Z.C: <strong class="text-red-800">{{ $direccionPc }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjefedireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong
                                                        class="text-red-800">{{ $Pcofserviciodireccion }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales:
                                                    <strong class="text-red-800">{{ $SuboficialesPcdireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcdireccion }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorrodireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLaserdireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchdireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarasdireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $ruterdireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidordireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicadireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijodireccion }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $direccionotros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Investigaciones Tolhuin')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Investigaciones Tolhuin: <strong
                                                        class="text-red-800">{{ $invesPc }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjefeinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong class="text-red-800">{{ $Pcofservicioinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales:
                                                    <strong class="text-red-800">{{ $SuboficialesPcinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcinves }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorroinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLaserinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarasinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $ruterinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidorinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicainves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijoinves }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $invesotros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Narcocriminalidad Tolhuin')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Narcocriminalidad Tolhuin: <strong
                                                        class="text-red-800">{{ $narcoPc }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjefenarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong class="text-red-800">{{ $Pcofservicionarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales:
                                                    <strong class="text-red-800">{{ $SuboficialesPcnarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Sumariante:
                                                    <strong class="text-red-800">{{ $Pcsumariantenarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcnarco }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorronarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLasernarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchnarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarasnarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $ruternarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidornarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicanarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijonarco }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $narcootros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Delitos Complejos Tolhuin')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Narcocriminalidad Tolhuin: <strong
                                                        class="text-red-800">{{ $compPc }}</strong></p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjefecomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong class="text-red-800">{{ $Pcofserviciocomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales:
                                                    <strong class="text-red-800">{{ $SuboficialesPccomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Sumariante:
                                                    <strong class="text-red-800">{{ $Pcsumariantecomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno:
                                                    <strong class="text-red-800">{{ $JefeTurnoPccomp }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorrocomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLasercomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchcomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarascomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $rutercomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidorcomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicacomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijocomp }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $compotros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Rural')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Brigada Rural: <strong class="text-red-800">{{ $ruralPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina del
                                                    jefe:
                                                    <strong class="text-red-800">{{ $Pcjeferural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Of. del Oficial
                                                    servicio: <strong class="text-red-800">{{ $Pcofserviciorural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    SubOficiales:
                                                    <strong class="text-red-800">{{ $SuboficialesPcrural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de
                                                    Sumariante:
                                                    <strong class="text-red-800">{{ $Pcsumarianterural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Oficina de Jefe
                                                    de Turno:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcrural }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorrorural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLaserrural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchrural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarasrural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $ruterrural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidorrural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicarural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijorural }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $ruralotros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Repetidora Estancia Tepi')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Estancia Tepi: <strong class="text-red-800">{{ $tepiPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Guardia Tepi:
                                                    <strong class="text-red-800">{{ $Pcguardiatepi }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorrotepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLasertepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchtepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarastepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $rutertepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidortepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicatepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijotepi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $tepiotros }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Repetidora Cerro Michi')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Cerro Michi: <strong class="text-red-800">{{ $tepiPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Guardia Tepi:
                                                    <strong class="text-red-800">{{ $Pcguardiamichi }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorromichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLasermichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchmichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarasmichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $rutermichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidormichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicamichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijomichi }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $michiotros }}</strong>
                                                </p>
                                            </div>
                                        @break


                                        @case('Dto. Lago Escondido 460')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Lago Escondido: <strong class="text-red-800">{{ $lagoPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Guardia Tepi:
                                                    <strong class="text-red-800">{{ $Pcguardialago }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorrolago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLaserlago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchlago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camaraslago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $ruterlago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidorlago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicalago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijolago }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $lagootros }}</strong>
                                                </p>
                                            </div>
                                        @break


                                        @case('Dto. Control de Ruta 480')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Dto. 480: <strong class="text-red-800">{{ $rutaPc }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Pc Guardia Tepi:
                                                    <strong class="text-red-800">{{ $Pcguardiaruta }}</strong>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresoras a
                                                    Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorroruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Impresora laser:
                                                    <strong class="text-red-800">{{ $impresoraLaserruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Switch/es:
                                                    <strong class="text-red-800">{{ $switchruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Camaras de Videovigilancia:
                                                    <strong class="text-red-800">{{ $camarasruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Ruter/s:
                                                    <strong class="text-red-800">{{ $ruterruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Sevidor/es:
                                                    <strong class="text-red-800">{{ $servidorruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Central
                                                    telefonica:
                                                    <strong class="text-red-800">{{ $centralTelefonicaruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Telefono fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijoruta }}</strong>
                                                </p>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Otros equipos:
                                                    <strong class="text-red-800">{{ $rutaotros }}</strong>
                                                </p>
                                            </div>
                                        @break


                                        @case('Otras Dependencias')
                                            <div>
                                                <p class="text-slate-800 font-bold mb-2 text-xl">Total de Pc. en
                                                    Otras Dependencias: <strong
                                                        class="text-red-800">{{ $OtrasPc }}</strong></p>
                                            @break

                                            @default
                                                <!-- Código por defecto si no se cumple ningún caso -->
                                        @endswitch
                                    </div>

                                    <button
                                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-md text-gray-800 font-semibold"
                                        wire:click="closeModal">Cerrar</button>
                                </div>
                            </div>
                        </div>


                        <div x-data="{ open: false }" class="shadow-lg">
                            <div @click="open = !open"
                                class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                                <p class="text-lg font-extrabold text-white">TOLHUIN</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">


                                <form enctype="multipart/form-data">


                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">


                                        <div class="mt-2">
                                            <label for="dependenciatolhuin_id"
                                                class="block text-sm font-medium text-gray-700">Dependencia:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="dependencia_tolhuin_id">
                                                <option value="" selected disabled>Seleccione la Dependencia.
                                                </option>

                                                @foreach ($Dependencia_Tolhuin as $tolhuin)
                                                    <option value="{{ $tolhuin->id }}">{{ $tolhuin->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mt-2">
                                            <label for="administracion_id"
                                                class="block text-sm font-medium text-gray-700">Tolhuin:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="tipodeoficina_id">
                                                <option value="" selected disabled>Seleccione la oficina.
                                                </option>

                                                @foreach ($TipodeOficina as $tol)
                                                    <option value="{{ $tol->id }}">{{ $tol->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>



                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">

                                        <div class="mt-2">
                                            <label for="tipodispositivo_id"
                                                class="block text-sm font-medium text-gray-700">Tipo de
                                                Dispositivo:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="tipodispositivo_id">
                                                <option value="" selected disabled>Seleccione el dispositivo.
                                                </option>
                                                @foreach ($TipoDispositivo as $tipoDisp)
                                                    <option value="{{ $tipoDisp->id }}">{{ $tipoDisp->nombre }}
                                                    </option>
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
                                            <select class="w-full form-control rounded-md"
                                                wire:model="slotmemoria_id">
                                                <option value="" selected disabled>Slot de memoria
                                                    Ram.</option>
                                                @foreach ($SlotMemoria as $slot)
                                                    <option value="{{ $slot->id }}">{{ $slot->cantidad }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mt-2">
                                            <label for="cantidadram_id"
                                                class="block text-sm font-medium text-gray-700">Cantidad de memoria
                                                ram:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="cantidadram_id">
                                                <option value="" selected disabled>Cantidad de memoria
                                                    Ram.</option>
                                                @foreach ($CantidadRam as $cantRam)
                                                    <option value="{{ $cantRam->id }}">{{ $cantRam->cantidad }}
                                                    </option>
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
                                            <label class="block text-gray-700 text-sm font-bold mb-1"
                                                for="activo">Disp.
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
                                            for="detalles_inventario">Softwares instalados</label>
                                        <textarea
                                            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            wire:model="softwares_instalados" placeholder="Ingrese software"></textarea>
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
                                            wire:click="guardartolhuin">
                                            Guardar!!
                                        </button>
                                    </div>
                                </form>


                            </div>

                        </div>


                    </div>

                </div>

            </div>

            @livewire('informatica.tolhuin.index-tolhuin-general')

        </div>

    </div>
