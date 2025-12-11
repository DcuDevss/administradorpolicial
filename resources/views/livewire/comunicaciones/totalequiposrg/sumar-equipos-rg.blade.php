<div class="py-5 bg-slate-800 dark:bg-slate-800">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="font-semibold text-xl text-red-500 leading-tight mb-4">
            Equipos de comunicaciones – Río Grande
        </h2>

        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold">Inventario general Río Grande</h2>

            <div class="grid grid-cols-2 gap-4 mt-4">

                <div class="bg-blue-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Equipos base</p>
                    <p class="text-2xl font-bold">{{ $sumaEquipoBase }}</p>
                </div>

                <div class="bg-green-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">HT</p>
                    <p class="text-2xl font-bold">{{ $sumaHt }}</p>
                </div>

                <div class="bg-yellow-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Repetidoras</p>
                    <p class="text-2xl font-bold">{{ $sumaRepetidora }}</p>
                </div>

                <div class="bg-purple-400 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Fuentes de poder</p>
                    <p class="text-2xl font-bold">{{ $sumaFuentePoder }}</p>
                </div>

                <div class="bg-pink-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Balizas</p>
                    <p class="text-2xl font-bold">{{ $sumaBaliza }}</p>
                </div>

                <div class="bg-slate-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Antenas</p>
                    <p class="text-2xl font-bold">{{ $sumaAntena }}</p>
                </div>

                <div class="bg-orange-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Otros</p>
                    <p class="text-2xl font-bold">{{ $sumaOtros }}</p>
                </div>

                <div class="bg-black p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Sin datos</p>
                    <p class="text-2xl font-bold">{{ $sumaSinDatos }}</p>
                </div>

                <div class="bg-pink-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Ptt:</p>
                    <p class="text-2xl font-bold">{{ $sumaPtt }}</p>
                </div>

                <div class="bg-gray-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Comando Balizas:</p>
                    <p class="text-2xl font-bold">{{ $sumaComandoBaliza }}</p>
                </div>

            </div>
        </div>

    </div>
</div>
