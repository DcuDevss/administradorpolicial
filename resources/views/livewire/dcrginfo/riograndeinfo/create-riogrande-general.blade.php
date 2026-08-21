<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('INFORMATICA D.C.R.G') }}

            </h2>
        </x-slot>

        <div class="col-xs-12">
            <div class="flex flex-col p-4 rounded-md shadow-lg">
                <div class="py-5 rounded-md bg-white dark:bg-gray-100">
                    <div x-data="{ open: false }" class="shadow-lg">
                        <div @click="open = !open"
                            class="flex items-center justify-between bg-slate-800 border p-4 rounded-md transition">
                            <p class="text-lg font-extrabold text-white">INVENTARIO GENERAL</p>
                            <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                        </div>
                        <div x-show.transition.in.duration.800ms="open" class="border p-4">
                            <h1 class="text-xl font-bold text-blue-800 mb-4">Total de computadoras en Rio Grande:
                                <strong class="text-red-800 font-semibold"> {{ $sumaTotalPc }}</strong>
                            </h1>
                            <div class="text-center flex flex-wrap justify-center">
                                <button wire:click="showModal('Comisaria Primera R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Primera</button>
                                <button wire:click="showModal('Comisaria Segunda R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Segunda</button>
                                <button wire:click="showModal('Comisaria Tercera R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Tercera</button>
                                <button wire:click="showModal('Comisaria Cuarta R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Cuarta</button>
                                <button wire:click="showModal('Comisaria Quinta R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria Quinta</button>
                                 <button wire:click="showModal('Comisaria de Genero y Familia R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">Comisaria G. y Flia. R. G.</button>
                                <button wire:click="showModal('D.S.E.R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 text-white m-2">D.S.E.R.G</button>
                                <button wire:click="showModal('D.R.Z.N')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">D.R.Z.N</button>
                                <button wire:click="showModal('Escuela de Policia')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Escuela de
                                    Policia</button>
                                <button wire:click="showModal('Repetidora Cerro Laucha')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Repetidora Cerro
                                    Laucha</button>
                                <button wire:click="showModal('D.C.R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">D.C.R.G</button>
                                <button wire:click="showModal('Investigaciones R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Investigaciones
                                    R.G</button>
                                <button wire:click="showModal('Bienestar R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Bienestar R.G</button>
                                <button wire:click="showModal('Brigada Narcocriminalidad R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Narcocriminalidad
                                    R.G</button>
                                <button wire:click="showModal('Brigada Delitos Complejos R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Complejos R.G</button>
                                <button wire:click="showModal('Automotores R.G')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Automotores
                                    R.G</button>
                                <button wire:click="showModal('Otras Dependencias')"
                                    class="bg-slate-800 rounded-md px-3 py-3 mt-2 text-white m-2">Pc en
                                    Otras Dependencias</button>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ showModal: @entangle('showModal') }">
                        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                            x-show="showModal" x-cloak>

                            <div class="bg-white p-4 rounded-md shadow-md w-96" @click.away="showModal = false">
                                <h2 class="text-2xl font-semibold mb-2 underline">Detalles del Inventario</h2>

                                <div class="mb-4 ">
                                    @switch($button)
                                        @case('Comisaria Primera R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos PRIMERA:
                                                    <strong class="text-red-800">{{ $primeraotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs PRIMERA:
                                                    <strong class="text-red-800">{{ $primeraPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcjefe }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcsubjefe }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcofservicio }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcsumariante }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcguardia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC De Día PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcdedia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcadministrativa }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores PRIMERA:
                                                    <strong class="text-red-800">{{ $Pcautomotores }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores PRIMERA:
                                                    <strong class="text-red-800">{{ $monitor }}</strong>
                                                </p>

                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks PRIMERA:
                                                    <strong class="text-red-800">{{ $notebook }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks PRIMERA:
                                                    <strong class="text-red-800">{{ $netbook }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares PRIMERA:
                                                    <strong class="text-red-800">{{ $celular }}</strong>
                                                </p>

                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets PRIMERA:
                                                    <strong class="text-red-800">{{ $tablet }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser PRIMERA:
                                                    <strong class="text-red-800">{{ $impresoraLaser }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta PRIMERA:
                                                    <strong class="text-red-800">{{ $impresoraChorro }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches PRIMERA:
                                                    <strong class="text-red-800">{{ $switch }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers PRIMERA:
                                                    <strong class="text-red-800">{{ $ruter }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS PRIMERA:
                                                    <strong class="text-red-800">{{ $ups }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras PRIMERA:
                                                    <strong class="text-red-800">{{ $camaras }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones PRIMERA:
                                                    <strong class="text-red-800">{{ $estacion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores PRIMERA:
                                                    <strong class="text-red-800">{{ $servidor }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores PRIMERA:
                                                    <strong class="text-red-800">{{ $estabilizador }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares PRIMERA:
                                                    <strong class="text-red-800">{{ $auriculares }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables PRIMERA:
                                                    <strong class="text-red-800">{{ $cable }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs PRIMERA:
                                                    <strong class="text-red-800">{{ $tv }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas PRIMERA:
                                                    <strong class="text-red-800">{{ $centralTelefonica }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos PRIMERA:
                                                    <strong class="text-red-800">{{ $telefonoFijo }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales PRIMERA:
                                                    <strong class="text-red-800">{{ $SuboficialesPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos PRIMERA:
                                                    <strong class="text-red-800">{{ $ServiciosExternosPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno PRIMERA:
                                                    <strong class="text-red-800">{{ $JefeTurnoPc }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Comisaria Segunda R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos SEGUNDA:
                                                    <strong class="text-red-800">{{ $segundaotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs SEGUNDA:
                                                    <strong class="text-red-800">{{ $segundaPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcjefe2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcsubjefe2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcofservicio2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcsumariante2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcguardia2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC De Día SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcdedia2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcadministrativa2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores SEGUNDA:
                                                    <strong class="text-red-800">{{ $Pcautomotores2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores SEGUNDA:
                                                    <strong class="text-red-800">{{ $monitor2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks SEGUNDA:
                                                    <strong class="text-red-800">{{ $notebook2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks SEGUNDA:
                                                    <strong class="text-red-800">{{ $netbook2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares SEGUNDA:
                                                    <strong class="text-red-800">{{ $celular2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets SEGUNDA:
                                                    <strong class="text-red-800">{{ $tablet2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser SEGUNDA:
                                                    <strong class="text-red-800">{{ $impresoraLaser2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta SEGUNDA:
                                                    <strong class="text-red-800">{{ $impresoraChorro2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches SEGUNDA:
                                                    <strong class="text-red-800">{{ $switch2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers SEGUNDA:
                                                    <strong class="text-red-800">{{ $ruter2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS SEGUNDA:
                                                    <strong class="text-red-800">{{ $ups2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras SEGUNDA:
                                                    <strong class="text-red-800">{{ $camaras2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones SEGUNDA:
                                                    <strong class="text-red-800">{{ $estacion2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores SEGUNDA:
                                                    <strong class="text-red-800">{{ $servidor2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores SEGUNDA:
                                                    <strong class="text-red-800">{{ $estabilizador2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares SEGUNDA:
                                                    <strong class="text-red-800">{{ $auriculares2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables SEGUNDA:
                                                    <strong class="text-red-800">{{ $cable2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs SEGUNDA:
                                                    <strong class="text-red-800">{{ $tv2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas SEGUNDA:
                                                    <strong class="text-red-800">{{ $centralTelefonica2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos SEGUNDA:
                                                    <strong class="text-red-800">{{ $telefonoFijo2da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales SEGUNDA:
                                                    <strong class="text-red-800">{{ $Suboficiales2Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos SEGUNDA:
                                                    <strong class="text-red-800">{{ $ServiciosExternos2Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno SEGUNDA:
                                                    <strong class="text-red-800">{{ $JefeTurno2Pc }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Comisaria Tercera R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos TERCERA:
                                                    <strong class="text-red-800">{{ $terceraotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs TERCERA:
                                                    <strong class="text-red-800">{{ $terceraPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe TERCERA:
                                                    <strong class="text-red-800">{{ $Pcjefe3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe TERCERA:
                                                    <strong class="text-red-800">{{ $Pcsubjefe3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio TERCERA:
                                                    <strong class="text-red-800">{{ $Pcofservicio3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante TERCERA:
                                                    <strong class="text-red-800">{{ $Pcsumariante3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia TERCERA:
                                                    <strong class="text-red-800">{{ $Pcguardia3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC De Día TERCERA:
                                                    <strong class="text-red-800">{{ $Pcdedia3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa TERCERA:
                                                    <strong class="text-red-800">{{ $Pcadministrativa3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores TERCERA:
                                                    <strong class="text-red-800">{{ $Pcautomotores3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores TERCERA:
                                                    <strong class="text-red-800">{{ $monitor3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks TERCERA:
                                                    <strong class="text-red-800">{{ $notebook3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks TERCERA:
                                                    <strong class="text-red-800">{{ $netbook3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares TERCERA:
                                                    <strong class="text-red-800">{{ $celular3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets TERCERA:
                                                    <strong class="text-red-800">{{ $tablet3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser TERCERA:
                                                    <strong class="text-red-800">{{ $impresoraLaser3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta TERCERA:
                                                    <strong class="text-red-800">{{ $impresoraChorro3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches TERCERA:
                                                    <strong class="text-red-800">{{ $switch3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers TERCERA:
                                                    <strong class="text-red-800">{{ $ruter3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS TERCERA:
                                                    <strong class="text-red-800">{{ $ups3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras TERCERA:
                                                    <strong class="text-red-800">{{ $camaras3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones TERCERA:
                                                    <strong class="text-red-800">{{ $estacion3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores TERCERA:
                                                    <strong class="text-red-800">{{ $servidor3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores TERCERA:
                                                    <strong class="text-red-800">{{ $estabilizador3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares TERCERA:
                                                    <strong class="text-red-800">{{ $auriculares3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables TERCERA:
                                                    <strong class="text-red-800">{{ $cable3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs TERCERA:
                                                    <strong class="text-red-800">{{ $tv3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas TERCERA:
                                                    <strong class="text-red-800">{{ $centralTelefonica3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos TERCERA:
                                                    <strong class="text-red-800">{{ $telefonoFijo3da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales TERCERA:
                                                    <strong class="text-red-800">{{ $Suboficiales3Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos TERCERA:
                                                    <strong class="text-red-800">{{ $ServiciosExternos3Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno TERCERA:
                                                    <strong class="text-red-800">{{ $JefeTurno3Pc }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Comisaria Cuarta R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos CUARTA:
                                                    <strong class="text-red-800">{{ $cuartaotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs CUARTA:
                                                    <strong class="text-red-800">{{ $cuartaPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe CUARTA:
                                                    <strong class="text-red-800">{{ $Pcjefe4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe CUARTA:
                                                    <strong class="text-red-800">{{ $Pcsubjefe4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio CUARTA:
                                                    <strong class="text-red-800">{{ $Pcofservicio4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante CUARTA:
                                                    <strong class="text-red-800">{{ $Pcsumariante4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia CUARTA:
                                                    <strong class="text-red-800">{{ $Pcguardia4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC De Día CUARTA:
                                                    <strong class="text-red-800">{{ $Pcdedia4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa CUARTA:
                                                    <strong class="text-red-800">{{ $Pcadministrativa4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores CUARTA:
                                                    <strong class="text-red-800">{{ $Pcautomotores4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores CUARTA:
                                                    <strong class="text-red-800">{{ $monitor4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks CUARTA:
                                                    <strong class="text-red-800">{{ $notebook4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks CUARTA:
                                                    <strong class="text-red-800">{{ $netbook4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares CUARTA:
                                                    <strong class="text-red-800">{{ $celular4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets CUARTA:
                                                    <strong class="text-red-800">{{ $tablet4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser CUARTA:
                                                    <strong class="text-red-800">{{ $impresoraLaser4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta CUARTA:
                                                    <strong class="text-red-800">{{ $impresoraChorro4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches CUARTA:
                                                    <strong class="text-red-800">{{ $switch4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers CUARTA:
                                                    <strong class="text-red-800">{{ $ruter4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS CUARTA:
                                                    <strong class="text-red-800">{{ $ups4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras CUARTA:
                                                    <strong class="text-red-800">{{ $camaras4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones CUARTA:
                                                    <strong class="text-red-800">{{ $estacion4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores CUARTA:
                                                    <strong class="text-red-800">{{ $servidor4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores CUARTA:
                                                    <strong class="text-red-800">{{ $estabilizador4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares CUARTA:
                                                    <strong class="text-red-800">{{ $auriculares4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables CUARTA:
                                                    <strong class="text-red-800">{{ $cable4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs CUARTA:
                                                    <strong class="text-red-800">{{ $tv4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas CUARTA:
                                                    <strong class="text-red-800">{{ $centralTelefonica4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos CUARTA:
                                                    <strong class="text-red-800">{{ $telefonoFijo4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales CUARTA:
                                                    <strong class="text-red-800">{{ $Suboficiales4Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos CUARTA:
                                                    <strong class="text-red-800">{{ $ServiciosExternos4Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno CUARTA:
                                                    <strong class="text-red-800">{{ $JefeTurno4Pc }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Comisaria Quinta R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Dispositivos QUINTA:
                                                    <strong class="text-red-800">{{ $quintaotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PCs QUINTA:
                                                    <strong class="text-red-800">{{ $quintaPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe QUINTA:
                                                    <strong class="text-red-800">{{ $Pcjefe5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe QUINTA:
                                                    <strong class="text-red-800">{{ $Pcsubjefe5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio QUINTA:
                                                    <strong class="text-red-800">{{ $Pcofservicio5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante QUINTA:
                                                    <strong class="text-red-800">{{ $Pcsumariante5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia QUINTA:
                                                    <strong class="text-red-800">{{ $Pcguardia5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC De Día QUINTA:
                                                    <strong class="text-red-800">{{ $Pcdedia5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa QUINTA:
                                                    <strong class="text-red-800">{{ $Pcadministrativa5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores QUINTA:
                                                    <strong class="text-red-800">{{ $Pcautomotores5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores QUINTA:
                                                    <strong class="text-red-800">{{ $monitor5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks QUINTA:
                                                    <strong class="text-red-800">{{ $notebook5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks QUINTA:
                                                    <strong class="text-red-800">{{ $netbook5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares QUINTA:
                                                    <strong class="text-red-800">{{ $celular5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets QUINTA:
                                                    <strong class="text-red-800">{{ $tablet5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser QUINTA:
                                                    <strong class="text-red-800">{{ $impresoraLaser5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro de Tinta QUINTA:
                                                    <strong class="text-red-800">{{ $impresoraChorro5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switches QUINTA:
                                                    <strong class="text-red-800">{{ $switch5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Routers QUINTA:
                                                    <strong class="text-red-800">{{ $ruter5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS QUINTA:
                                                    <strong class="text-red-800">{{ $ups5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras QUINTA:
                                                    <strong class="text-red-800">{{ $camaras5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones QUINTA:
                                                    <strong class="text-red-800">{{ $estacion5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores QUINTA:
                                                    <strong class="text-red-800">{{ $servidor5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores QUINTA:
                                                    <strong class="text-red-800">{{ $estabilizador5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares QUINTA:
                                                    <strong class="text-red-800">{{ $auriculares5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables QUINTA:
                                                    <strong class="text-red-800">{{ $cable5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TVs QUINTA:
                                                    <strong class="text-red-800">{{ $tv5da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Centrales Telefónicas CUARTA:
                                                    <strong class="text-red-800">{{ $centralTelefonica4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos CUARTA:
                                                    <strong class="text-red-800">{{ $telefonoFijo4da }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales CUARTA:
                                                    <strong class="text-red-800">{{ $Suboficiales4Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos CUARTA:
                                                    <strong class="text-red-800">{{ $ServiciosExternos4Pc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno CUARTA:
                                                    <strong class="text-red-800">{{ $JefeTurno4Pc }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Comisaria de Genero y Familia R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Genero y Familia:
                                                    <strong class="text-red-800">{{ $fliaotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de pc en Genero y Familia:
                                                    <strong class="text-red-800">{{ $fliaPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcjefeFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcsubjefeFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Oficial de Servicio en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcofservicioFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sumariante en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcsumarianteFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcguardiaFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC de Día en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcdediaFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcadministrativaFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Automotores en Genero y Familia:
                                                    <strong class="text-red-800">{{ $PcautomotoresFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores en Genero y Familia:
                                                    <strong class="text-red-800">{{ $monitorFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks en Genero y Familia:
                                                    <strong class="text-red-800">{{ $notebookFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks en Genero y Familia:
                                                    <strong class="text-red-800">{{ $netbookFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares en Genero y Familia:
                                                    <strong class="text-red-800">{{ $celularFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets en Genero y Familia:
                                                    <strong class="text-red-800">{{ $tabletFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser en Genero y Familia:
                                                    <strong class="text-red-800">{{ $impresoraLaserFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro en Genero y Familia:
                                                    <strong class="text-red-800">{{ $impresoraChorroFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch en Genero y Familia:
                                                    <strong class="text-red-800">{{ $switchFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router en Genero y Familia:
                                                    <strong class="text-red-800">{{ $ruterFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS en Genero y Familia:
                                                    <strong class="text-red-800">{{ $upsFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras en Genero y Familia:
                                                    <strong class="text-red-800">{{ $camarasFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones en Genero y Familia:
                                                    <strong class="text-red-800">{{ $estacionFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores en Genero y Familia:
                                                    <strong class="text-red-800">{{ $servidorFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores en Genero y Familia:
                                                    <strong class="text-red-800">{{ $estabilizadorFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares en Genero y Familia:
                                                    <strong class="text-red-800">{{ $auricularesFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables en Genero y Familia:
                                                    <strong class="text-red-800">{{ $cableFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV en Genero y Familia:
                                                    <strong class="text-red-800">{{ $tvFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica en Genero y Familia:
                                                    <strong class="text-red-800">{{ $centralTelefonicaFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos en Genero y Familia:
                                                    <strong class="text-red-800">{{ $telefonoFijoFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Suboficiales en Genero y Familia:
                                                    <strong class="text-red-800">{{ $SuboficialesPCFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Servicios Externos en Genero y Familia:
                                                    <strong class="text-red-800">{{ $ServiciosExternosPCFlia }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe de Turno en Genero y Familia:
                                                    <strong class="text-red-800">{{ $JefeTurnoPCFlia }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('D.S.E.R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Servicios:
                                                    <strong class="text-red-800">{{ $serviciosotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Servicios:
                                                    <strong class="text-red-800">{{ $serviciosPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Servicios:
                                                    <strong class="text-red-800">{{ $PcjefeServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Servicios:
                                                    <strong class="text-red-800">{{ $PcsubjefeServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Canes:
                                                    <strong class="text-red-800">{{ $PcCanes }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Operaciones Tácticas:
                                                    <strong class="text-red-800">{{ $PcOpTacticas }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Grupo Infantería:
                                                    <strong class="text-red-800">{{ $PcGrupoInfanteria }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Búsqueda y Rescate:
                                                    <strong class="text-red-800">{{ $PcBusquedaRescate }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Sección Explosivos:
                                                    <strong class="text-red-800">{{ $PcSeccionExplosivos }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Administrativa:
                                                    <strong class="text-red-800">{{ $PcAdministrativa }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Servicios:
                                                    <strong class="text-red-800">{{ $monitorServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Servicios:
                                                    <strong class="text-red-800">{{ $notebookServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Servicios:
                                                    <strong class="text-red-800">{{ $netbookServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Servicios:
                                                    <strong class="text-red-800">{{ $celularServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Servicios:
                                                    <strong class="text-red-800">{{ $tabletServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Servicios:
                                                    <strong class="text-red-800">{{ $impresoraLaserServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Servicios:
                                                    <strong class="text-red-800">{{ $impresoraChorroServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Servicios:
                                                    <strong class="text-red-800">{{ $switchServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Servicios:
                                                    <strong class="text-red-800">{{ $ruterServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Servicios:
                                                    <strong class="text-red-800">{{ $upsServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Servicios:
                                                    <strong class="text-red-800">{{ $camarasServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Servicios:
                                                    <strong class="text-red-800">{{ $estacionServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Servicios:
                                                    <strong class="text-red-800">{{ $servidorServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Servicios:
                                                    <strong class="text-red-800">{{ $estabilizadorServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Servicios:
                                                    <strong class="text-red-800">{{ $auricularesServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Servicios:
                                                    <strong class="text-red-800">{{ $cableServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Servicios:
                                                    <strong class="text-red-800">{{ $tvServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Servicios:
                                                    <strong class="text-red-800">{{ $centralTelefonicaServicios }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Servicios:
                                                    <strong class="text-red-800">{{ $telefonoFijoServicios }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('D.R.Z.N')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Dirección:
                                                    <strong class="text-red-800">{{ $direccionotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Dirección:
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
                                                    PC Guardia Dirección:
                                                    <strong class="text-red-800">{{ $PcGuardiadireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Dirección:
                                                    <strong class="text-red-800">{{ $monitordireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Dirección:
                                                    <strong class="text-red-800">{{ $notebookdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Dirección:
                                                    <strong class="text-red-800">{{ $netbookdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Dirección:
                                                    <strong class="text-red-800">{{ $celulardireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Dirección:
                                                    <strong class="text-red-800">{{ $tabledireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Dirección:
                                                    <strong class="text-red-800">{{ $impresoraLaserdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Dirección:
                                                    <strong class="text-red-800">{{ $impresoraChorrodireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Dirección:
                                                    <strong class="text-red-800">{{ $switchdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Dirección:
                                                    <strong class="text-red-800">{{ $ruterdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Dirección:
                                                    <strong class="text-red-800">{{ $upsdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Dirección:
                                                    <strong class="text-red-800">{{ $camarasdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Dirección:
                                                    <strong class="text-red-800">{{ $estaciondireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Dirección:
                                                    <strong class="text-red-800">{{ $servidordireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Dirección:
                                                    <strong class="text-red-800">{{ $estabilizadordireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Dirección:
                                                    <strong class="text-red-800">{{ $auricularesdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Dirección:
                                                    <strong class="text-red-800">{{ $cabledireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Dirección:
                                                    <strong class="text-red-800">{{ $tvdireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Dirección:
                                                    <strong class="text-red-800">{{ $centralTelefonicadireccion }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Dirección:
                                                    <strong class="text-red-800">{{ $telefonoFijodireccion }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Escuela de Policia')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Escuela:
                                                    <strong class="text-red-800">{{ $escuelaotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Escuela:
                                                    <strong class="text-red-800">{{ $escuelaPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Escuela:
                                                    <strong class="text-red-800">{{ $Pcjefeescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Escuela:
                                                    <strong class="text-red-800">{{ $Pcsubjefeescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Escuela:
                                                    <strong class="text-red-800">{{ $PcGuardiaescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Escuela:
                                                    <strong class="text-red-800">{{ $monitorescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Escuela:
                                                    <strong class="text-red-800">{{ $notebookescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Escuela:
                                                    <strong class="text-red-800">{{ $netbookescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Escuela:
                                                    <strong class="text-red-800">{{ $celularescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Escuela:
                                                    <strong class="text-red-800">{{ $tabletescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Escuela:
                                                    <strong class="text-red-800">{{ $impresoraLaserescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Escuela:
                                                    <strong class="text-red-800">{{ $impresoraChorroescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Escuela:
                                                    <strong class="text-red-800">{{ $switchescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Escuela:
                                                    <strong class="text-red-800">{{ $ruterescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Escuela:
                                                    <strong class="text-red-800">{{ $upsescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Escuela:
                                                    <strong class="text-red-800">{{ $camarasescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Escuela:
                                                    <strong class="text-red-800">{{ $estacionescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Escuela:
                                                    <strong class="text-red-800">{{ $servidorescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Escuela:
                                                    <strong class="text-red-800">{{ $estabilizadorescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Escuela:
                                                    <strong class="text-red-800">{{ $auricularesescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Escuela:
                                                    <strong class="text-red-800">{{ $cableescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Escuela:
                                                    <strong class="text-red-800">{{ $tvescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Escuela:
                                                    <strong class="text-red-800">{{ $centralTelefonicaescuela }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Escuela:
                                                    <strong class="text-red-800">{{ $telefonoFijoescuela }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Repetidora Cerro Laucha')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Repetidora:
                                                    <strong class="text-red-800">{{ $repetidoraotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Repetidora:
                                                    <strong class="text-red-800">{{ $repetidoraPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Repetidora:
                                                    <strong class="text-red-800">{{ $monitorrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Repetidora:
                                                    <strong class="text-red-800">{{ $notebookrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Repetidora:
                                                    <strong class="text-red-800">{{ $netbookrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Repetidora:
                                                    <strong class="text-red-800">{{ $celularrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Repetidora:
                                                    <strong class="text-red-800">{{ $tabletrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Repetidora:
                                                    <strong class="text-red-800">{{ $impresoraLaserrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Repetidora:
                                                    <strong class="text-red-800">{{ $impresoraChorrorepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Repetidora:
                                                    <strong class="text-red-800">{{ $switchrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Repetidora:
                                                    <strong class="text-red-800">{{ $ruterrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Repetidora:
                                                    <strong class="text-red-800">{{ $upsrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Repetidora:
                                                    <strong class="text-red-800">{{ $camarasrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Repetidora:
                                                    <strong class="text-red-800">{{ $estacionrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Repetidora:
                                                    <strong class="text-red-800">{{ $servidorrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Repetidora:
                                                    <strong class="text-red-800">{{ $estabilizadorrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Repetidora:
                                                    <strong class="text-red-800">{{ $auricularesrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Repetidora:
                                                    <strong class="text-red-800">{{ $cablerepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Repetidora:
                                                    <strong class="text-red-800">{{ $tvrepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Repetidora:
                                                    <strong class="text-red-800">{{ $centralTelefonicarepetidora }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Repetidora:
                                                    <strong class="text-red-800">{{ $telefonoFijorepetidora }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('D.C.R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Central:
                                                    <strong class="text-red-800">{{ $centralotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Central:
                                                    <strong class="text-red-800">{{ $centralPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Central:
                                                    <strong class="text-red-800">{{ $Pcjefecentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Central:
                                                    <strong class="text-red-800">{{ $Pcsubjefecentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Central:
                                                    <strong class="text-red-800">{{ $PcGuardiacentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Central:
                                                    <strong class="text-red-800">{{ $monitorcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Central:
                                                    <strong class="text-red-800">{{ $notebookcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Central:
                                                    <strong class="text-red-800">{{ $netbookcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Central:
                                                    <strong class="text-red-800">{{ $celularcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Central:
                                                    <strong class="text-red-800">{{ $tabletcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Central:
                                                    <strong class="text-red-800">{{ $impresoraLasercentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Central:
                                                    <strong class="text-red-800">{{ $impresoraChorrocentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Central:
                                                    <strong class="text-red-800">{{ $switchcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Central:
                                                    <strong class="text-red-800">{{ $rutercentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Central:
                                                    <strong class="text-red-800">{{ $upscentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Central:
                                                    <strong class="text-red-800">{{ $camarascentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Central:
                                                    <strong class="text-red-800">{{ $estacioncentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Central:
                                                    <strong class="text-red-800">{{ $servidorcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Central:
                                                    <strong class="text-red-800">{{ $estabilizadorcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Central:
                                                    <strong class="text-red-800">{{ $auricularescentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Central:
                                                    <strong class="text-red-800">{{ $cablecentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Central:
                                                    <strong class="text-red-800">{{ $tvcentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Central:
                                                    <strong class="text-red-800">{{ $centralTelefonicacentral }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Central:
                                                    <strong class="text-red-800">{{ $telefonoFijocentral }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Investigaciones R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Investigaciones:
                                                    <strong class="text-red-800">{{ $invesotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Investigaciones:
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
                                                    PC Guardia Investigaciones:
                                                    <strong class="text-red-800">{{ $PcGuardiainves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Investigaciones:
                                                    <strong class="text-red-800">{{ $monitorinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Investigaciones:
                                                    <strong class="text-red-800">{{ $notebookinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Investigaciones:
                                                    <strong class="text-red-800">{{ $netbookinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Investigaciones:
                                                    <strong class="text-red-800">{{ $celularinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Investigaciones:
                                                    <strong class="text-red-800">{{ $tabletinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Investigaciones:
                                                    <strong class="text-red-800">{{ $impresoraLaserinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Investigaciones:
                                                    <strong class="text-red-800">{{ $impresoraChorroinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Investigaciones:
                                                    <strong class="text-red-800">{{ $switchinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Investigaciones:
                                                    <strong class="text-red-800">{{ $ruterinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Investigaciones:
                                                    <strong class="text-red-800">{{ $upsinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Investigaciones:
                                                    <strong class="text-red-800">{{ $camarasinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Investigaciones:
                                                    <strong class="text-red-800">{{ $estacioninves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Investigaciones:
                                                    <strong class="text-red-800">{{ $servidorinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Investigaciones:
                                                    <strong class="text-red-800">{{ $estabilizadorinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Investigaciones:
                                                    <strong class="text-red-800">{{ $auricularesinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Investigaciones:
                                                    <strong class="text-red-800">{{ $cableinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Investigaciones:
                                                    <strong class="text-red-800">{{ $tvinves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Investigaciones:
                                                    <strong class="text-red-800">{{ $centralTelefonicainves }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Investigaciones:
                                                    <strong class="text-red-800">{{ $telefonoFijoinves }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Bienestar R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Bienestar:
                                                    <strong class="text-red-800">{{ $bienestarotros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Bienestar:
                                                    <strong class="text-red-800">{{ $bienestarPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Bienestar:
                                                    <strong class="text-red-800">{{ $Pcjefebienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Bienestar:
                                                    <strong class="text-red-800">{{ $Pcsubjefebienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Bienestar:
                                                    <strong class="text-red-800">{{ $PcGuardiabienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Bienestar:
                                                    <strong class="text-red-800">{{ $monitorbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Bienestar:
                                                    <strong class="text-red-800">{{ $notebookbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Bienestar:
                                                    <strong class="text-red-800">{{ $netbookbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Bienestar:
                                                    <strong class="text-red-800">{{ $celularbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Bienestar:
                                                    <strong class="text-red-800">{{ $tabletbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Bienestar:
                                                    <strong class="text-red-800">{{ $impresoraLaserbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Bienestar:
                                                    <strong class="text-red-800">{{ $impresoraChorrobienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Bienestar:
                                                    <strong class="text-red-800">{{ $switchbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Bienestar:
                                                    <strong class="text-red-800">{{ $ruterbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Bienestar:
                                                    <strong class="text-red-800">{{ $upsbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Bienestar:
                                                    <strong class="text-red-800">{{ $camarasbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Bienestar:
                                                    <strong class="text-red-800">{{ $estacionbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Bienestar:
                                                    <strong class="text-red-800">{{ $servidorbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Bienestar:
                                                    <strong class="text-red-800">{{ $estabilizadorbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Bienestar:
                                                    <strong class="text-red-800">{{ $auricularesbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Bienestar:
                                                    <strong class="text-red-800">{{ $cablebienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Bienestar:
                                                    <strong class="text-red-800">{{ $tvbienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Bienestar:
                                                    <strong class="text-red-800">{{ $centralTelefonicabienestar }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Bienestar:
                                                    <strong class="text-red-800">{{ $telefonoFijobienestar }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Narcocriminalidad R.G')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de otros en Narco:
                                                    <strong class="text-red-800">{{ $narcootros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de PC en Narco:
                                                    <strong class="text-red-800">{{ $narcoPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Narco:
                                                    <strong class="text-red-800">{{ $Pcjefenarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Narco:
                                                    <strong class="text-red-800">{{ $Pcsubjefenarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Narco:
                                                    <strong class="text-red-800">{{ $PcGuardianarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Monitores en Narco:
                                                    <strong class="text-red-800">{{ $monitornarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Notebooks en Narco:
                                                    <strong class="text-red-800">{{ $notebooknarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Netbooks en Narco:
                                                    <strong class="text-red-800">{{ $netbooknarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Celulares en Narco:
                                                    <strong class="text-red-800">{{ $celularnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Tablets en Narco:
                                                    <strong class="text-red-800">{{ $tabletnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Láser en Narco:
                                                    <strong class="text-red-800">{{ $impresoraLasernarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Impresoras Chorro en Narco:
                                                    <strong class="text-red-800">{{ $impresoraChorronarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Switch en Narco:
                                                    <strong class="text-red-800">{{ $switchnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Router en Narco:
                                                    <strong class="text-red-800">{{ $ruternarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de UPS en Narco:
                                                    <strong class="text-red-800">{{ $upsnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cámaras en Narco:
                                                    <strong class="text-red-800">{{ $camarasnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estaciones en Narco:
                                                    <strong class="text-red-800">{{ $estacionnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Servidores en Narco:
                                                    <strong class="text-red-800">{{ $servidornarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Estabilizadores en Narco:
                                                    <strong class="text-red-800">{{ $estabilizadornarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Auriculares en Narco:
                                                    <strong class="text-red-800">{{ $auricularesnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Cables en Narco:
                                                    <strong class="text-red-800">{{ $cablenarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de TV en Narco:
                                                    <strong class="text-red-800">{{ $tvnarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Centrales Telefónicas en Narco:
                                                    <strong class="text-red-800">{{ $centralTelefonicanarco }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Total de Teléfonos Fijos en Narco:
                                                    <strong class="text-red-800">{{ $telefonoFijonarco }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Brigada Delitos Complejos R.G')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Delito:
                                                    <strong class="text-red-800">{{ $delitootros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Delito:
                                                    <strong class="text-red-800">{{ $delitoPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Delito:
                                                    <strong class="text-red-800">{{ $Pcjefedelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Delito:
                                                    <strong class="text-red-800">{{ $Pcsubjefedelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Delito:
                                                    <strong class="text-red-800">{{ $PcGuardiadelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Delito:
                                                    <strong class="text-red-800">{{ $monitordelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Delito:
                                                    <strong class="text-red-800">{{ $notebookdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Delito:
                                                    <strong class="text-red-800">{{ $netbookdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Delito:
                                                    <strong class="text-red-800">{{ $celulardelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Delito:
                                                    <strong class="text-red-800">{{ $tabletdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Delito:
                                                    <strong class="text-red-800">{{ $impresoraLaserdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro Delito:
                                                    <strong class="text-red-800">{{ $impresoraChorrodelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch Delito:
                                                    <strong class="text-red-800">{{ $switchdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router Delito:
                                                    <strong class="text-red-800">{{ $ruterdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Delito:
                                                    <strong class="text-red-800">{{ $upsdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Delito:
                                                    <strong class="text-red-800">{{ $camarasdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones Delito:
                                                    <strong class="text-red-800">{{ $estaciondelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Delito:
                                                    <strong class="text-red-800">{{ $servidordelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Delito:
                                                    <strong class="text-red-800">{{ $estabilizadordelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Delito:
                                                    <strong class="text-red-800">{{ $auricularesdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Delito:
                                                    <strong class="text-red-800">{{ $cabledelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV Delito:
                                                    <strong class="text-red-800">{{ $tvdelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica Delito:
                                                    <strong class="text-red-800">{{ $centralTelefonicadelito }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos Delito:
                                                    <strong class="text-red-800">{{ $telefonoFijodelito }}</strong>
                                                </p>
                                        @break

                                        @case('Automotores R.G')
                                            <div>
                                               <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Otros Auto:
                                                    <strong class="text-red-800">{{ $autootros }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Auto:
                                                    <strong class="text-red-800">{{ $autoPc }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Jefe Auto:
                                                    <strong class="text-red-800">{{ $Pcjefeauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Subjefe Auto:
                                                    <strong class="text-red-800">{{ $Pcsubjefeauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    PC Guardia Auto:
                                                    <strong class="text-red-800">{{ $PcGuardiaauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Monitores Auto:
                                                    <strong class="text-red-800">{{ $monitorauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Notebooks Auto:
                                                    <strong class="text-red-800">{{ $notebookauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Netbooks Auto:
                                                    <strong class="text-red-800">{{ $netbookauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Celulares Auto:
                                                    <strong class="text-red-800">{{ $celularauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Tablets Auto:
                                                    <strong class="text-red-800">{{ $tabletauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Láser Auto:
                                                    <strong class="text-red-800">{{ $impresoraLaserauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Impresoras Chorro Auto:
                                                    <strong class="text-red-800">{{ $impresoraChorroauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Switch Auto:
                                                    <strong class="text-red-800">{{ $switchauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Router Auto:
                                                    <strong class="text-red-800">{{ $ruterauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    UPS Auto:
                                                    <strong class="text-red-800">{{ $upsauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cámaras Auto:
                                                    <strong class="text-red-800">{{ $camarasauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estaciones Auto:
                                                    <strong class="text-red-800">{{ $estacionauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Servidores Auto:
                                                    <strong class="text-red-800">{{ $servidorauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Estabilizadores Auto:
                                                    <strong class="text-red-800">{{ $estabilizadorauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Auriculares Auto:
                                                    <strong class="text-red-800">{{ $auricularesauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Cables Auto:
                                                    <strong class="text-red-800">{{ $cableauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    TV Auto:
                                                    <strong class="text-red-800">{{ $tvauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Central Telefónica Auto:
                                                    <strong class="text-red-800">{{ $centralTelefonicaauto }}</strong>
                                                </p>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">
                                                    Teléfonos Fijos Auto:
                                                    <strong class="text-red-800">{{ $telefonoFijoauto }}</strong>
                                                </p>
                                            </div>
                                        @break

                                        @case('Otras Dependencias')
                                            <div>
                                                <p class="text-metric-primary font-bold mb-2 text-xl">Total de Pc. en
                                                    Otras Dependencias: <strong
                                                        class="text-red-800">{{ $OtrasPc }}</strong></p>
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
                                <p class="text-lg font-extrabold text-white">RIO GRANDE</p>
                                <span :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas"></span>
                            </div>
                            <div x-show.transition.in.duration.800ms="open" class="border p-4">
                                <form enctype="multipart/form-data">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mb-10">

                                        <div class="mt-2">
                                            <label for="dependenciariogrande_id"
                                                class="block text-sm font-medium text-gray-700">Dependencia:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="dependencia_riogrande_id">
                                                <option value="" selected disabled>Seleccione la Dependencia.
                                                </option>
                                                @foreach ($Dependencia_Riogrande as $riogrande)
                                                    <option value="{{ $riogrande->id }}">{{ $riogrande->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mt-2">
                                            <label for="administracion_id"
                                                class="block text-sm font-medium text-gray-700">Oficina:</label>
                                            <select class="w-full form-control rounded-md"
                                                wire:model="tipodeoficina_id">
                                                <option value="" selected disabled>Seleccione la oficina.
                                                </option>
                                                @foreach ($TipodeOficina as $rg)
                                                    <option value="{{ $rg->id }}">{{ $rg->nombre }}
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
                                            data-wire="guardarriogrande"
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
            @livewire('dcrginfo.riograndeinfo.index-riogrande-general')
        </div>
    </div>
