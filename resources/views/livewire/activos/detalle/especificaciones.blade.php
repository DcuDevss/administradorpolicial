{{-- Especificaciones técnicas --}}
                <div class="border-t border-gray-200 p-6 dark:border-gray-700">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 dark:bg-blue-900/40">

                            <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 5h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2z" />
                            </svg>

                        </div>

                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Especificaciones técnicas
                            </h2>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Características técnicas registradas del activo
                            </p>
                        </div>

                    </div>

                    @if ($activo->especificaciones->isEmpty())

                        <div
                            class="mt-5 rounded-xl border border-dashed border-gray-300 p-6 text-center dark:border-gray-600">

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                No hay especificaciones técnicas registradas.
                            </p>

                        </div>
                    @else
                        <div class="mt-5 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">

                            <div class="divide-y divide-gray-200 dark:divide-gray-700">

                                @foreach ($activo->especificaciones as $especificacion)
                                    <div
                                        class="flex flex-col gap-1 px-5 py-4 sm:flex-row sm:items-center sm:justify-between">

                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                            {{ ucfirst(str_replace('_', ' ', $especificacion->clave)) }}
                                        </span>

                                        <span class="text-sm font-semibold text-gray-900 dark:text-white">
                                            {{ $especificacion->valor }}

                                            @if ($especificacion->unidad)
                                                <span class="font-normal text-gray-500 dark:text-gray-400">
                                                    {{ $especificacion->unidad }}
                                                </span>
                                            @endif
                                        </span>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    @endif

                </div>