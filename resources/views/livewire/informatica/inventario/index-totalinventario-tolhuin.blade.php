<div class="py-5  bg-slate-800  dark:bg-slate-800 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <x-slot name="header">
            <h2 class="font-semibold text-xl  text-red-500 leading-tight">
                {{ __('Dispositivos Informáticos en Tolhuin') }}

            </h2>
        </x-slot>

        <div class="max-w-7x1 mx-auto">
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold">Inventario general Tolhuin</h2>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div class="bg-blue-500 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Computadoras en dependencias policiales Tolhuin</p>
                        <p class="text-2xl font-bold">{{ $sumaTotalPc }}</p>
                    </div>
                    <div class="bg-green-500 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Impresoras a Tinta: </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalImpresora_tinta }}</p>
                    </div>
                    <div class="bg-yellow-500 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Impresoras a laser: </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalImpresora_laser }}</p>
                    </div>

                    <div class="bg-pink-500 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">cantidad de ruters:</p>
                        <p class="text-2xl font-bold">{{ $sumaTotalRuter }}</p>
                    </div>
                    <div class="bg-slate-500 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">cantidad de switch: </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalSwitch }}</p>
                    </div>
                    <div class="bg-purple-400 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Cantidad de servidores: </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalServidor }}</p>
                    </div>
                    <div class="bg-green-700 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Cantidad de Telefono fijos: </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalTelefono_fijo }}</p>
                    </div>
                    <div class="bg-red-500 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Cantidad Notbooks: </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalNotebook }}</p>
                    </div>
                    <div class="bg-violet-500 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Central telefonicas: </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalCentral_telefonica }}</p>
                    </div>
                    <div class="bg-black p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Canidad de monitores:  </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalMonitor_pc }}</p>
                    </div>
                    <div class="bg-blue-300 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Camaras video vigilancias:  </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalCamaras_video }}</</p>
                    </div>
                    <div class="bg-slate-700 p-4 text-white rounded-lg">
                        <p class="text-sm font-semibold">Estacion de trabajo:  </p>
                        <p class="text-2xl font-bold">{{ $sumaTotalEstacion_trabajo }}</</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









{{--  <div>
    <h1 class="text-xl font-extrabold text-white">Total de computadoras en dependencias policiales Ushuaia: <strong class="font-bold text-red-700">{{ $sumaTotalPc }}</strong> </h1>
</div> --}}
