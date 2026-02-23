<div class="py-5 bg-slate-800 dark:bg-slate-800">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="font-semibold text-xl text-red-500 leading-tight mb-4">
            Inventario General – Provincia de Tierra del Fuego
        </h2>

        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold">Inventario general provincial</h2>

            <div class="grid grid-cols-2 gap-4 mt-4">

                <div class="bg-blue-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Computadoras (PC)</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalPc }}</p>
                </div>

                <div class="bg-gray-600 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Otros</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalOtros }}</p>
                </div>

                <div class="bg-blue-400 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Monitores</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalMonitor_pc }}</p>
                </div>

                <div class="bg-red-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Notebooks</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalNotebook }}</p>
                </div>

                <div class="bg-red-700 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Netbooks</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalNetbook }}</p>
                </div>

                <div class="bg-green-700 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Celulares</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalCelular }}</p>
                </div>

                <div class="bg-purple-400 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Tablets</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalTablet }}</p>
                </div>

                <div class="bg-green-700 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Teléfonos fijos</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalTelefono_fijo }}</p>
                </div>

                <div class="bg-green-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Teléfonos inalámbricos</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalTelefono_inalambrico }}</p>
                </div>

                <div class="bg-yellow-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Impresoras a láser</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalImpresora_laser }}</p>
                </div>

                <div class="bg-green-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Impresoras a tinta</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalImpresora_tinta }}</p>
                </div>

                <div class="bg-slate-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Switch</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalSwitch }}</p>
                </div>

                <div class="bg-pink-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Ruters</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalRuter }}</p>
                </div>

                <div class="bg-purple-600 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">UPS</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalUps }}</p>
                </div>

                <div class="bg-blue-300 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Cámaras de video vigilancia</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalCamaras_video }}</p>
                </div>

                <div class="bg-slate-700 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Estaciones de trabajo</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalEstacion_trabajo }}</p>
                </div>

                <div class="bg-purple-400 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Servidores</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalServidor }}</p>
                </div>

                <div class="bg-blue-900 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Estabilizadores de tensión</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalEstabilizador }}</p>
                </div>

                <div class="bg-orange-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Auriculares</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalAuriculares }}</p>
                </div>

                <div class="bg-green-800 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Cable estructurado</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalCable }}</p>
                </div>

                <div class="bg-violet-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Televisores</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalTv }}</p>
                </div>

                <div class="bg-yellow-700 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Centrales telefónicas</p>
                    <p class="text-2xl font-bold">{{ $sumaTotalCentralTelefonica }}</p>
                </div>

            </div>
        </div>

    </div>
</div>
    <div class="mt-4">
       <a href="{{ route('inventario-pdf-general') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md shadow mt-4">
            Generar PDF Informática
        </a>
    </div>
