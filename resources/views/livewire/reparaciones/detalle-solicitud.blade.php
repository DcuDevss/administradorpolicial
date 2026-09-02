<div class="min-h-screen bg-gray-900 px-4 py-6 text-gray-100">

    <div class="mx-auto max-w-7xl">

        {{-- ============================================================
             ENCABEZADO
        ============================================================ --}}
        zczxc
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
            RECEPCIÓN DEL EQUIPO
        ============================================================ --}}
        @if ($solicitud->turno && $solicitud->estado === 'turnada')
            @livewire('reparaciones.registrar-recepcion', ['solicitud' => $solicitud], key('recepcion-' . $solicitud->id))
        @endif

       

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
