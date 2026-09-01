<div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

    <div>
        <div class="mb-1 flex items-center gap-2">
            <a href="{{ url()->previous() }}" class="text-sm text-gray-400 transition hover:text-white">
                ← Volver
            </a>
        </div>

        <h1 class="text-2xl font-bold text-white">
            Detalle de solicitud
        </h1>

        <p class="mt-1 text-sm text-gray-400">
            Gestión de la solicitud de reparación y asignación de turno.
        </p>
    </div>

    <div class="flex items-center gap-2">

        <span
            class="@switch($solicitud->estado)
                        @case('pendiente')
                            bg-yellow-900/40 text-yellow-300
                            @break

                        @case('turnada')
                            bg-blue-900/40 text-blue-300
                            @break

                        @case('recepcionada')
                            bg-indigo-900/40 text-indigo-300
                            @break

                        @case('en_diagnostico')
                            bg-purple-900/40 text-purple-300
                            @break

                        @case('en_reparacion')
                            bg-orange-900/40 text-orange-300
                            @break

                        @case('esperando_repuesto')
                            bg-red-900/40 text-red-300
                            @break

                        @case('reparada')
                            bg-green-900/40 text-green-300
                            @break

                        @case('lista_para_retirar')
                            bg-emerald-900/40 text-emerald-300
                            @break

                        @case('entregada')
                            bg-gray-700 text-gray-300
                            @break

                        @case('cancelada')
                            bg-red-900/40 text-red-300
                            @break

                        @default
                            bg-gray-700 text-gray-300
                    @endswitch inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold">
            Estado:
            {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
        </span>

    </div>

</div>
