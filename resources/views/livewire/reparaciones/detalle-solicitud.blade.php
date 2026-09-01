<div class="min-h-screen bg-gray-900 px-4 py-6 text-gray-100">

    <div class="mx-auto max-w-7xl">

        {{-- ============================================================
             ENCABEZADO
        ============================================================ --}}
        @include('livewire.reparaciones.partials.encabezado')


        {{-- ============================================================
             MENSAJE DE ÉXITO
        ============================================================ --}}
        @if (session()->has('success'))
            <div class="mb-6 rounded-lg border border-green-700/50 bg-green-900/30 px-4 py-3 text-sm text-green-300">
                <div class="flex items-center gap-2">
                    <span class="text-lg">✓</span>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>
            </div>
        @endif


        {{-- ============================================================
             ERROR GENERAL
        ============================================================ --}}
        @error('general')
            <div class="mb-6 rounded-lg border border-red-700/50 bg-red-900/30 px-4 py-3 text-sm text-red-300">
                {{ $message }}
            </div>
        @enderror


        {{-- ============================================================
             INFORMACIÓN PRINCIPAL
        ============================================================ --}}
        @include('livewire.reparaciones.partials.informacion-principal')



        {{-- ============================================================
             TURNO ACTUAL
        ============================================================ --}}
        @include('livewire.reparaciones.partials.turno')

        {{-- ============================================================
             ESTADO OPERATIVO DEL ÁREA
        ============================================================ --}}
        <div class="mb-6">

            <div class="mb-3">

                <h2 class="text-lg font-bold text-white">
                    Situación del Área de Reparaciones
                </h2>

                <p class="text-sm text-gray-400">
                    Estado actual de las solicitudes y equipos.
                </p>

            </div>


            <div class="grid grid-cols-2 gap-3 md:grid-cols-3 xl:grid-cols-6">

                {{-- TURNADAS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-blue-400">
                        {{ $resumenOcupacion['turnadas'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Turnadas
                    </div>

                </div>


                {{-- RECEPCIONADAS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-indigo-400">
                        {{ $resumenOcupacion['recepcionadas'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Recepcionadas
                    </div>

                </div>


                {{-- DIAGNÓSTICO --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-purple-400">
                        {{ $resumenOcupacion['diagnostico'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Diagnóstico
                    </div>

                </div>


                {{-- REPARACIÓN --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-orange-400">
                        {{ $resumenOcupacion['reparacion'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        En reparación
                    </div>

                </div>


                {{-- REPUESTOS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-red-400">
                        {{ $resumenOcupacion['esperando_repuesto'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Esperando repuesto
                    </div>

                </div>


                {{-- LISTOS --}}
                <div class="rounded-xl border border-gray-700 bg-gray-800 p-4 shadow-lg">

                    <div class="text-2xl font-bold text-emerald-400">
                        {{ $resumenOcupacion['listas_retirar'] ?? 0 }}
                    </div>

                    <div class="mt-1 text-xs uppercase tracking-wider text-gray-500">
                        Listos para retirar
                    </div>

                </div>

            </div>

        </div>
      

        {{-- ============================================================
             AGENDA
        ============================================================ --}}
       @include('livewire.reparaciones.partials.agenda')


        {{-- ============================================================
             INFORMACIÓN DEL FLUJO
        ============================================================ --}}
          @include('livewire.reparaciones.partials.flujo')
     

    </div>

</div>
