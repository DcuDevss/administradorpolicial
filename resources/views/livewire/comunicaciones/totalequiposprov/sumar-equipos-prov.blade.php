<style>
.btn-pdf-custom {
    background-color: #4f46e5 !important; /* indigo-600 */
    color: #ffffff !important;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.2);
    text-decoration: none;
    transition: all .2s ease-in-out;
}

.btn-pdf-custom:hover {
    background-color: #4338ca !important; /* indigo-700 */
    box-shadow: 0 4px 6px rgba(0,0,0,.25);
    transform: translateY(-1px);
}
</style>
<div class="py-5 bg-slate-800 dark:bg-slate-800">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h2 class="font-semibold text-xl text-red-500 leading-tight mb-4">
            Total Provincial de Equipos de Comunicaciones
        </h2>

        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-semibold">Inventario general - Provincia</h2>

            <div class="grid grid-cols-2 gap-4 mt-4">

                <div class="bg-blue-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Equipos base</p>
                    <p class="text-2xl font-bold">{{ $totalEquipoBase }}</p>
                </div>

                <div class="bg-green-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">HT</p>
                    <p class="text-2xl font-bold">{{ $totalHt }}</p>
                </div>

                <div class="bg-yellow-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Repetidoras</p>
                    <p class="text-2xl font-bold">{{ $totalRepetidora }}</p>
                </div>

                <div class="bg-purple-400 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Fuentes de poder</p>
                    <p class="text-2xl font-bold">{{ $totalFuentePoder }}</p>
                </div>

                <div class="bg-pink-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Balizas</p>
                    <p class="text-2xl font-bold">{{ $totalBaliza }}</p>
                </div>

                <div class="bg-slate-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Antenas</p>
                    <p class="text-2xl font-bold">{{ $totalAntena }}</p>
                </div>

                <div class="bg-orange-500 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Otros</p>
                    <p class="text-2xl font-bold">{{ $totalOtros }}</p>
                </div>

                <div class="bg-black p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Sin datos</p>
                    <p class="text-2xl font-bold">{{ $totalSinDatos }}</p>
                </div>

                <div class="bg-purple-400 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Ptt</p>
                    <p class="text-2xl font-bold">{{ $totalPtt }}</p>
                </div>

                <div class="bg-green-400 p-4 text-white rounded-lg">
                    <p class="text-sm font-semibold">Comando Balizas</p>
                    <p class="text-2xl font-bold">{{ $totalComandoBaliza }}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 flex justify-end">
        <a href="{{ route('pdf-equipos-prov') }}"
        class="btn-pdf-custom">
            Generar PDF de Equipos
        </a>
    </div>
</div>
