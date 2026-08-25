     {{-- Observaciones --}}
                @if ($activo->observaciones)
                    <div class="border-t border-gray-200 p-6 dark:border-gray-700">

                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Observaciones
                        </h2>

                        <div class="mt-4 rounded-xl bg-gray-50 p-5 dark:bg-gray-900/40">

                            <p class="text-sm leading-6 text-gray-600 dark:text-gray-400">
                                {{ $activo->observaciones }}
                            </p>

                        </div>

                    </div>
                @endif