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
                                <h2 class="text-2xl font-semibold mb-2 underline">Detalles del Inventario</h2>

                                <div class="mb-4">
                                    @switch($button)
                                        @case('Comisaria Tolhuin')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe:
                                                    <strong class="text-red-800">{{ $Pcjefe }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe:
                                                    <strong class="text-red-800">{{ $Pcsubjefe }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio:
                                                    <strong class="text-red-800">{{ $Pcofservicio }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante:
                                                    <strong class="text-red-800">{{ $Pcsumariante }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia:
                                                    <strong class="text-red-800">{{ $Pcguardia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC de Día:
                                                    <strong class="text-red-800">{{ $Pcdedia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa:
                                                    <strong class="text-red-800">{{ $Pcadministrativa }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores:
                                                    <strong class="text-red-800">{{ $Pcautomotores }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales:
                                                    <strong class="text-red-800">{{ $SuboficialesPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos:
                                                    <strong class="text-red-800">{{ $ServiciosExternosPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno:
                                                    <strong class="text-red-800">{{ $JefeTurnoPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores:
                                                    <strong class="text-red-800">{{ $monitor }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks:
                                                    <strong class="text-red-800">{{ $notebook }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks:
                                                    <strong class="text-red-800">{{ $netbook }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares:
                                                    <strong class="text-red-800">{{ $celular }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets:
                                                    <strong class="text-red-800">{{ $tablet }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser:
                                                    <strong class="text-red-800">{{ $impresoraLaser }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro:
                                                    <strong class="text-red-800">{{ $impresoraChorro }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch:
                                                    <strong class="text-red-800">{{ $switch }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router:
                                                    <strong class="text-red-800">{{ $ruter }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS:
                                                    <strong class="text-red-800">{{ $ups }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras:
                                                    <strong class="text-red-800">{{ $camaras }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones:
                                                    <strong class="text-red-800">{{ $estacion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores:
                                                    <strong class="text-red-800">{{ $servidor }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores:
                                                    <strong class="text-red-800">{{ $estabilizador }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares:
                                                    <strong class="text-red-800">{{ $auriculares }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables:
                                                    <strong class="text-red-800">{{ $cable }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV:
                                                    <strong class="text-red-800">{{ $tv }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica:
                                                    <strong class="text-red-800">{{ $centralTelefonica }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfono Fijo:
                                                    <strong class="text-red-800">{{ $telefonoFijo }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Comisaria G.F. y M-T')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Género:
                                                    <strong class="text-red-800">{{ $generootros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Género:
                                                    <strong class="text-red-800">{{ $generoPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Género:
                                                    <strong class="text-red-800">{{ $Pcjefegenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Género:
                                                    <strong class="text-red-800">{{ $Pcsubjefegenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio Género:
                                                    <strong class="text-red-800">{{ $Pcofserviciogenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante Género:
                                                    <strong class="text-red-800">{{ $Pcsumariantegenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Género:
                                                    <strong class="text-red-800">{{ $Pcguardiagenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC de Día Género:
                                                    <strong class="text-red-800">{{ $Pcdediagenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa Género:
                                                    <strong class="text-red-800">{{ $Pcadministrativagenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores Género:
                                                    <strong class="text-red-800">{{ $Pcautomotoresgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales Género:
                                                    <strong class="text-red-800">{{ $SuboficialesPcgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos Género:
                                                    <strong class="text-red-800">{{ $ServiciosExternosPcgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno Género:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Género:
                                                    <strong class="text-red-800">{{ $monitorgnero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Género:
                                                    <strong class="text-red-800">{{ $notebookgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Género:
                                                    <strong class="text-red-800">{{ $netbooggenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Género:
                                                    <strong class="text-red-800">{{ $celulargenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Género:
                                                    <strong class="text-red-800">{{ $tabletgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Género:
                                                    <strong class="text-red-800">{{ $impresoraLasergenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro Género:
                                                    <strong class="text-red-800">{{ $impresoraChorrogenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch Género:
                                                    <strong class="text-red-800">{{ $switchgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router Género:
                                                    <strong class="text-red-800">{{ $rutergenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Género:
                                                    <strong class="text-red-800">{{ $upsgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Género:
                                                    <strong class="text-red-800">{{ $camarasgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones Género:
                                                    <strong class="text-red-800">{{ $estaciongenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Género:
                                                    <strong class="text-red-800">{{ $servidorgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Género:
                                                    <strong class="text-red-800">{{ $estabilizador }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Género:
                                                    <strong class="text-red-800">{{ $auricularesgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Género:
                                                    <strong class="text-red-800">{{ $cablegenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV Género:
                                                    <strong class="text-red-800">{{ $tvgenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica Género:
                                                    <strong class="text-red-800">{{ $centralTelefonicagenero }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfono Fijo Género:
                                                    <strong class="text-red-800">{{ $telefonoFijogenero }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Policia Cientifica Tolhuin')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Científica:
                                                    <strong class="text-red-800">{{ $cientotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Científica:
                                                    <strong class="text-red-800">{{ $cientPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Científica:
                                                    <strong class="text-red-800">{{ $Pcjefecient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Científica:
                                                    <strong class="text-red-800">{{ $Pcsubjefecient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio Científica:
                                                    <strong class="text-red-800">{{ $Pcofserviciocient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante Científica:
                                                    <strong class="text-red-800">{{ $Pcsumariantecient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Científica:
                                                    <strong class="text-red-800">{{ $Pcguardiacient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa Científica:
                                                    <strong class="text-red-800">{{ $Pcadministrativacient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales Científica:
                                                    <strong class="text-red-800">{{ $SuboficialesPccient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno Científica:
                                                    <strong class="text-red-800">{{ $JefeTurnoPccient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Científica:
                                                    <strong class="text-red-800">{{ $monitorcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Científica:
                                                    <strong class="text-red-800">{{ $notebookcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Científica:
                                                    <strong class="text-red-800">{{ $netbookcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Científica:
                                                    <strong class="text-red-800">{{ $celularcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Científica:
                                                    <strong class="text-red-800">{{ $tabletcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Científica:
                                                    <strong class="text-red-800">{{ $impresoraLasercient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro Científica:
                                                    <strong class="text-red-800">{{ $impresoraChorrocient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch Científica:
                                                    <strong class="text-red-800">{{ $switchcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router Científica:
                                                    <strong class="text-red-800">{{ $rutercient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Científica:
                                                    <strong class="text-red-800">{{ $upscient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Científica:
                                                    <strong class="text-red-800">{{ $camarascient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones Científica:
                                                    <strong class="text-red-800">{{ $estacioncient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Científica:
                                                    <strong class="text-red-800">{{ $servidorcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Científica:
                                                    <strong class="text-red-800">{{ $estabilizarcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Científica:
                                                    <strong class="text-red-800">{{ $auricularescient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Científica:
                                                    <strong class="text-red-800">{{ $cablecient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV Científica:
                                                    <strong class="text-red-800">{{ $tvcient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica Científica:
                                                    <strong class="text-red-800">{{ $centralTelefonicacient }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfono Fijo Científica:
                                                    <strong class="text-red-800">{{ $telefonoFijocient }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('D.R.Z.C')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dirección:
                                                    <strong class="text-red-800">{{ $direccionotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Dirección:
                                                    <strong class="text-red-800">{{ $direccionPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Dirección:
                                                    <strong class="text-red-800">{{ $Pcjefedireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Dirección:
                                                    <strong class="text-red-800">{{ $Pcsubjefedireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio Dirección:
                                                    <strong class="text-red-800">{{ $Pcofserviciodireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Dirección:
                                                    <strong class="text-red-800">{{ $Pcguardiadireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa Dirección:
                                                    <strong class="text-red-800">{{ $Pcadministrativadireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales Dirección:
                                                    <strong class="text-red-800">{{ $SuboficialesPcdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno Dirección:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Dirección:
                                                    <strong class="text-red-800">{{ $monitordireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Dirección:
                                                    <strong class="text-red-800">{{ $notebookdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Dirección:
                                                    <strong class="text-red-800">{{ $netbookdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Dirección:
                                                    <strong class="text-red-800">{{ $celulardireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Dirección:
                                                    <strong class="text-red-800">{{ $tabletdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Dirección:
                                                    <strong class="text-red-800">{{ $impresoraLaserdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro Dirección:
                                                    <strong class="text-red-800">{{ $impresoraChorrodireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch Dirección:
                                                    <strong class="text-red-800">{{ $switchdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router Dirección:
                                                    <strong class="text-red-800">{{ $ruterdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Dirección:
                                                    <strong class="text-red-800">{{ $upsdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Dirección:
                                                    <strong class="text-red-800">{{ $camarasdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones Dirección:
                                                    <strong class="text-red-800">{{ $estaciondireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Dirección:
                                                    <strong class="text-red-800">{{ $servidordireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Dirección:
                                                    <strong class="text-red-800">{{ $estabilizadordireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Dirección:
                                                    <strong class="text-red-800">{{ $auricularesdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Dirección:
                                                    <strong class="text-red-800">{{ $cabledireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV Dirección:
                                                    <strong class="text-red-800">{{ $tvdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica Dirección:
                                                    <strong class="text-red-800">{{ $centralTelefonicadireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfono Fijo Dirección:
                                                    <strong class="text-red-800">{{ $telefonoFijodireccion }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Investigaciones Tolhuin')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Investigaciones:
                                                    <strong class="text-red-800">{{ $invesotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Investigaciones:
                                                    <strong class="text-red-800">{{ $invesPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Investigaciones:
                                                    <strong class="text-red-800">{{ $Pcjefeinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Investigaciones:
                                                    <strong class="text-red-800">{{ $Pcsubjefeinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio Investigaciones:
                                                    <strong class="text-red-800">{{ $Pcofservicioinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Investigaciones:
                                                    <strong class="text-red-800">{{ $Pcguardiainves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa Investigaciones:
                                                    <strong class="text-red-800">{{ $Pcadministrativainves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales Investigaciones:
                                                    <strong class="text-red-800">{{ $SuboficialesPcinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno Investigaciones:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Investigaciones:
                                                    <strong class="text-red-800">{{ $monitorinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Investigaciones:
                                                    <strong class="text-red-800">{{ $notebookinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Investigaciones:
                                                    <strong class="text-red-800">{{ $netbookinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Investigaciones:
                                                    <strong class="text-red-800">{{ $celularinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Investigaciones:
                                                    <strong class="text-red-800">{{ $tabletinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Investigaciones:
                                                    <strong class="text-red-800">{{ $impresoraLaserinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro Investigaciones:
                                                    <strong class="text-red-800">{{ $impresoraChorroinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch Investigaciones:
                                                    <strong class="text-red-800">{{ $switchinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router Investigaciones:
                                                    <strong class="text-red-800">{{ $ruterinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Investigaciones:
                                                    <strong class="text-red-800">{{ $upsinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Investigaciones:
                                                    <strong class="text-red-800">{{ $camarasinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones Investigaciones:
                                                    <strong class="text-red-800">{{ $estacioninves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Investigaciones:
                                                    <strong class="text-red-800">{{ $servidorinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Investigaciones:
                                                    <strong class="text-red-800">{{ $estabilizadorinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Investigaciones:
                                                    <strong class="text-red-800">{{ $auricularesinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Investigaciones:
                                                    <strong class="text-red-800">{{ $cableinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV Investigaciones:
                                                    <strong class="text-red-800">{{ $tvinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica Investigaciones:
                                                    <strong class="text-red-800">{{ $centralTelefonicainves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfono Fijo Investigaciones:
                                                    <strong class="text-red-800">{{ $telefonoFijoinves }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Narcocriminalidad Tolhuin')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $narcootros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $narcoPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $Pcjefenarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $Pcsubjefenarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial Servicio Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $Pcofservicionarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $Pcsumariantenarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $Pcguardianarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativo Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $Pcadministrativanarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $monitornarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $notebooknarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $netbooknarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $celularnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $tabletnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $impresoraLasernarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $impresoraChorronarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $switchnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $ruternarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $upsnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $camarasnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones de Trabajo Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $estacionnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $servidornarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $estabilizadornarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $auricularesnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $cablenarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $tvnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $centralTelefonicanarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $telefonoFijonarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $SuboficialesPcnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno Narcocriminalidad:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcnarco }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Delitos Complejos Tolhuin')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos:
                                                    <strong class="text-red-800">{{ $compotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC:
                                                    <strong class="text-red-800">{{ $compPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe:
                                                    <strong class="text-red-800">{{ $Pcjefecomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe:
                                                    <strong class="text-red-800">{{ $Pcsubjefecomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio:
                                                    <strong class="text-red-800">{{ $Pcofserviciocomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante:
                                                    <strong class="text-red-800">{{ $Pcsumariantecomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia:
                                                    <strong class="text-red-800">{{ $Pcguardiacomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa:
                                                    <strong class="text-red-800">{{ $Pcadministrativacomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales:
                                                    <strong class="text-red-800">{{ $SuboficialesPccomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno:
                                                    <strong class="text-red-800">{{ $JefeTurnoPccomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores:
                                                    <strong class="text-red-800">{{ $monitorcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks:
                                                    <strong class="text-red-800">{{ $notebookcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks:
                                                    <strong class="text-red-800">{{ $netbookcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares:
                                                    <strong class="text-red-800">{{ $celularcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets:
                                                    <strong class="text-red-800">{{ $tabletcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser:
                                                    <strong class="text-red-800">{{ $impresoraLasercomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta:
                                                    <strong class="text-red-800">{{ $impresoraChorrocomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch:
                                                    <strong class="text-red-800">{{ $switchcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router:
                                                    <strong class="text-red-800">{{ $rutercomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS:
                                                    <strong class="text-red-800">{{ $upscomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras:
                                                    <strong class="text-red-800">{{ $camarascomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones de Trabajo:
                                                    <strong class="text-red-800">{{ $estacioncomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores:
                                                    <strong class="text-red-800">{{ $servidorcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores:
                                                    <strong class="text-red-800">{{ $estabilizadorcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares:
                                                    <strong class="text-red-800">{{ $auricularescomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables:
                                                    <strong class="text-red-800">{{ $cablecomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV:
                                                    <strong class="text-red-800">{{ $tvcomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica:
                                                    <strong class="text-red-800">{{ $centralTelefonicacomp }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos:
                                                    <strong class="text-red-800">{{ $telefonoFijocomp }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Rural')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos Rural:
                                                    <strong class="text-red-800">{{ $ruralotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs Rural:
                                                    <strong class="text-red-800">{{ $ruralPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Rural:
                                                    <strong class="text-red-800">{{ $Pcjeferural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Rural:
                                                    <strong class="text-red-800">{{ $Pcsubjeferural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio Rural:
                                                    <strong class="text-red-800">{{ $Pcofserviciorural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante Rural:
                                                    <strong class="text-red-800">{{ $Pcsumarianterural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Rural:
                                                    <strong class="text-red-800">{{ $Pcguardiarural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa Rural:
                                                    <strong class="text-red-800">{{ $Pcadministrativarural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Rural:
                                                    <strong class="text-red-800">{{ $monitorrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Rural:
                                                    <strong class="text-red-800">{{ $notebookrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Rural:
                                                    <strong class="text-red-800">{{ $netbookrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Rural:
                                                    <strong class="text-red-800">{{ $celularrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Rural:
                                                    <strong class="text-red-800">{{ $tabletrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Rural:
                                                    <strong class="text-red-800">{{ $impresoraLaserrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta Rural:
                                                    <strong class="text-red-800">{{ $impresoraChorrorural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches Rural:
                                                    <strong class="text-red-800">{{ $switchrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers Rural:
                                                    <strong class="text-red-800">{{ $ruterrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Rural:
                                                    <strong class="text-red-800">{{ $upsrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Rural:
                                                    <strong class="text-red-800">{{ $camarasrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones Rural:
                                                    <strong class="text-red-800">{{ $estacionrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Rural:
                                                    <strong class="text-red-800">{{ $servidorrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Rural:
                                                    <strong class="text-red-800">{{ $estabilizadorrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Rural:
                                                    <strong class="text-red-800">{{ $auricularesrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Rural:
                                                    <strong class="text-red-800">{{ $cablerural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs Rural:
                                                    <strong class="text-red-800">{{ $tvrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas Rural:
                                                    <strong class="text-red-800">{{ $centralTelefonicarural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos Rural:
                                                    <strong class="text-red-800">{{ $telefonoFijorural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales Rural:
                                                    <strong class="text-red-800">{{ $SuboficialesPcrural }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno Rural:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcrural }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Repetidora Estancia Tepi')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos TEPI:
                                                    <strong class="text-red-800">{{ $tepiotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs TEPI:
                                                    <strong class="text-red-800">{{ $tepiPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia TEPI:
                                                    <strong class="text-red-800">{{ $Pcguardiatepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores TEPI:
                                                    <strong class="text-red-800">{{ $monitortepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks TEPI:
                                                    <strong class="text-red-800">{{ $notebooktepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks TEPI:
                                                    <strong class="text-red-800">{{ $netbooktepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares TEPI:
                                                    <strong class="text-red-800">{{ $celulartepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets TEPI:
                                                    <strong class="text-red-800">{{ $tablettepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser TEPI:
                                                    <strong class="text-red-800">{{ $impresoraLasertepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta TEPI:
                                                    <strong class="text-red-800">{{ $impresoraChorrotepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches TEPI:
                                                    <strong class="text-red-800">{{ $switchtepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers TEPI:
                                                    <strong class="text-red-800">{{ $rutertepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS TEPI:
                                                    <strong class="text-red-800">{{ $upstepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras TEPI:
                                                    <strong class="text-red-800">{{ $camarastepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones TEPI:
                                                    <strong class="text-red-800">{{ $estaciontepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores TEPI:
                                                    <strong class="text-red-800">{{ $servidortepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores TEPI:
                                                    <strong class="text-red-800">{{ $estabilizadortepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares TEPI:
                                                    <strong class="text-red-800">{{ $auricularestepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables TEPI:
                                                    <strong class="text-red-800">{{ $cabletepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs TEPI:
                                                    <strong class="text-red-800">{{ $tvtepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas TEPI:
                                                    <strong class="text-red-800">{{ $centralTelefonicatepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos TEPI:
                                                    <strong class="text-red-800">{{ $telefonoFijotepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales TEPI:
                                                    <strong class="text-red-800">{{ $SuboficialesPctepi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno TEPI:
                                                    <strong class="text-red-800">{{ $JefeTurnoPctepi }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Repetidora Cerro Michi')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos MICHI:
                                                    <strong class="text-red-800">{{ $michiotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs MICHI:
                                                    <strong class="text-red-800">{{ $michiPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia MICHI:
                                                    <strong class="text-red-800">{{ $Pcguardiamichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores MICHI:
                                                    <strong class="text-red-800">{{ $monitormichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks MICHI:
                                                    <strong class="text-red-800">{{ $notebookmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks MICHI:
                                                    <strong class="text-red-800">{{ $netbookmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares MICHI:
                                                    <strong class="text-red-800">{{ $celularmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets MICHI:
                                                    <strong class="text-red-800">{{ $tabletmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser MICHI:
                                                    <strong class="text-red-800">{{ $impresoraLasermichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta MICHI:
                                                    <strong class="text-red-800">{{ $impresoraChorromichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches MICHI:
                                                    <strong class="text-red-800">{{ $switchmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers MICHI:
                                                    <strong class="text-red-800">{{ $rutermichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS MICHI:
                                                    <strong class="text-red-800">{{ $upsmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras MICHI:
                                                    <strong class="text-red-800">{{ $camarasmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones MICHI:
                                                    <strong class="text-red-800">{{ $estacionmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores MICHI:
                                                    <strong class="text-red-800">{{ $servidormichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores MICHI:
                                                    <strong class="text-red-800">{{ $estabilizadormichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares MICHI:
                                                    <strong class="text-red-800">{{ $auricularesmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables MICHI:
                                                    <strong class="text-red-800">{{ $cablemichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs MICHI:
                                                    <strong class="text-red-800">{{ $tvmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas MICHI:
                                                    <strong class="text-red-800">{{ $centralTelefonicamichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos MICHI:
                                                    <strong class="text-red-800">{{ $telefonoFijomichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales MICHI:
                                                    <strong class="text-red-800">{{ $SuboficialesPcmichi }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno MICHI:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcmichi }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Dto. Lago Escondido 460')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos LAGO:
                                                    <strong class="text-red-800">{{ $lagootros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs LAGO:
                                                    <strong class="text-red-800">{{ $lagoPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia LAGO:
                                                    <strong class="text-red-800">{{ $Pcguardialago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores LAGO:
                                                    <strong class="text-red-800">{{ $monitorlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks LAGO:
                                                    <strong class="text-red-800">{{ $notebooklago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks LAGO:
                                                    <strong class="text-red-800">{{ $netbooklago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares LAGO:
                                                    <strong class="text-red-800">{{ $celularlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets LAGO:
                                                    <strong class="text-red-800">{{ $tabletlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser LAGO:
                                                    <strong class="text-red-800">{{ $impresoraLaserlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta LAGO:
                                                    <strong class="text-red-800">{{ $impresoraChorrolago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches LAGO:
                                                    <strong class="text-red-800">{{ $switchlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers LAGO:
                                                    <strong class="text-red-800">{{ $ruterlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS LAGO:
                                                    <strong class="text-red-800">{{ $upslago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras LAGO:
                                                    <strong class="text-red-800">{{ $camaraslago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones LAGO:
                                                    <strong class="text-red-800">{{ $estacionlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores LAGO:
                                                    <strong class="text-red-800">{{ $servidorlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores LAGO:
                                                    <strong class="text-red-800">{{ $estabilizadorlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares LAGO:
                                                    <strong class="text-red-800">{{ $auriculareslago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables LAGO:
                                                    <strong class="text-red-800">{{ $cablelago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs LAGO:
                                                    <strong class="text-red-800">{{ $tvlago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas LAGO:
                                                    <strong class="text-red-800">{{ $centralTelefonicalago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos LAGO:
                                                    <strong class="text-red-800">{{ $telefonoFijolago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales LAGO:
                                                    <strong class="text-red-800">{{ $SuboficialesPclago }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno LAGO:
                                                    <strong class="text-red-800">{{ $JefeTurnoPclago }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Dto. Control de Ruta 480')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos RUTA:
                                                    <strong class="text-red-800">{{ $rutaotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs RUTA:
                                                    <strong class="text-red-800">{{ $rutaPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia RUTA:
                                                    <strong class="text-red-800">{{ $Pcguardiaruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores RUTA:
                                                    <strong class="text-red-800">{{ $monitorruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks RUTA:
                                                    <strong class="text-red-800">{{ $notebookruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks RUTA:
                                                    <strong class="text-red-800">{{ $netbookruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares RUTA:
                                                    <strong class="text-red-800">{{ $celularruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets RUTA:
                                                    <strong class="text-red-800">{{ $tabletruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser RUTA:
                                                    <strong class="text-red-800">{{ $impresoraLaserruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta RUTA:
                                                    <strong class="text-red-800">{{ $impresoraChorroruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches RUTA:
                                                    <strong class="text-red-800">{{ $switchruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers RUTA:
                                                    <strong class="text-red-800">{{ $ruterruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS RUTA:
                                                    <strong class="text-red-800">{{ $upsruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras RUTA:
                                                    <strong class="text-red-800">{{ $camarasruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores RUTA:
                                                    <strong class="text-red-800">{{ $servidorruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores RUTA:
                                                    <strong class="text-red-800">{{ $estabilizadorruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares RUTA:
                                                    <strong class="text-red-800">{{ $auricularesruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables RUTA:
                                                    <strong class="text-red-800">{{ $cableruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs RUTA:
                                                    <strong class="text-red-800">{{ $tvruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas RUTA:
                                                    <strong class="text-red-800">{{ $centralTelefonicaruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos RUTA:
                                                    <strong class="text-red-800">{{ $telefonoFijoruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales RUTA:
                                                    <strong class="text-red-800">{{ $SuboficialesPcruta }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno RUTA:
                                                    <strong class="text-red-800">{{ $JefeTurnoPcruta }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Otras Dependencias')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">Total de Pc. en
                                                    Otras Dependencias:
                                                <strong class="text-red-800">{{ $OtrasPc }}</strong></p>
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
                                        type="button"
                                        data-wire="guardartolhuin"
                                        class="btn-confirm">
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
