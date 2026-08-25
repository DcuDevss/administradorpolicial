  {{-- Ubicación --}}
                <div class="border-t border-gray-200 p-6 dark:border-gray-700">

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 dark:bg-purple-900/40">

                            <svg class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 21a2 2 0 01-2.828 0l-4.243-4.343a8 8 0 1111.314 0z" />

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                        </div>

                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Ubicación
                            </h2>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Dependencia y ubicación actual del equipo
                            </p>
                        </div>

                    </div>

                    <div class="mt-5 grid gap-6 sm:grid-cols-2">

                        <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-700">

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Dependencia
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $activo->dependencia?->nombre ?? 'Sin dependencia' }}
                            </p>

                        </div>

                        <div class="rounded-xl border border-gray-200 p-4 dark:border-gray-700">

                            <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">
                                Ubicación
                            </p>

                            <p class="mt-2 text-sm font-medium text-gray-800 dark:text-gray-200">
                                {{ $activo->ubicacion?->nombre ?? 'Sin ubicación' }}
                            </p>

                        </div>

                    </div>

                </div>