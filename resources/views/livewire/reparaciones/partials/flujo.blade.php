   <div class="rounded-xl border border-gray-700 bg-gray-800 p-5 shadow-lg">

            <div class="mb-4">

                <h2 class="text-lg font-bold text-white">
                    Flujo de la solicitud
                </h2>

                <p class="text-sm text-gray-400">
                    Seguimiento general del proceso de reparación.
                </p>

            </div>


            <div class="overflow-x-auto">

                <div class="flex min-w-[800px] items-center justify-between gap-2">

                    {{-- SOLICITUD --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, [
                                'pendiente',
                                'turnada',
                                'recepcionada',
                                'en_diagnostico',
                                'en_reparacion',
                                'esperando_repuesto',
                                'reparada',
                                'lista_para_retirar',
                                'entregada',
                            ])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            1
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Solicitud
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- TURNO --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ $solicitud->turno ||
                            in_array($solicitud->estado, [
                                'turnada',
                                'recepcionada',
                                'en_diagnostico',
                                'en_reparacion',
                                'esperando_repuesto',
                                'reparada',
                                'lista_para_retirar',
                                'entregada',
                            ])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            2
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Turno
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- RECEPCIÓN --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, [
                                'recepcionada',
                                'en_diagnostico',
                                'en_reparacion',
                                'esperando_repuesto',
                                'reparada',
                                'lista_para_retirar',
                                'entregada',
                            ])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            3
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Recepción
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- REPARACIÓN --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, ['en_diagnostico', 'en_reparacion', 'esperando_repuesto', 'reparada'])
                                ? 'bg-blue-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            4
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Reparación
                        </span>

                    </div>


                    <div class="h-px flex-1 bg-gray-700"></div>


                    {{-- ENTREGA --}}
                    <div class="flex flex-col items-center text-center">

                        <div
                            class="{{ in_array($solicitud->estado, ['lista_para_retirar', 'entregada'])
                                ? 'bg-green-600 text-white'
                                : 'bg-gray-700 text-gray-500' }} flex h-10 w-10 items-center justify-center rounded-full">
                            5
                        </div>

                        <span class="mt-2 text-xs text-gray-400">
                            Entrega
                        </span>

                    </div>

                </div>

            </div>

        </div>