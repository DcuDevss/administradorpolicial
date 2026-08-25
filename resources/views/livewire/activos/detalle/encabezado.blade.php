      {{-- Encabezado del activo --}}
      <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

          <div>
              <p class="text-sm font-semibold uppercase tracking-wider text-blue-600 dark:text-blue-400">
                  {{ $activo->categoria?->nombre ?? 'Activo' }}
              </p>

              <h1 class="mt-1 text-2xl font-bold text-gray-900 dark:text-white">
                  {{ $activo->marca ?? 'Sin marca' }}
                  {{ $activo->modelo ?? '' }}
              </h1>
          </div>

          <div class="flex flex-wrap items-center gap-3">

              <span
                  class="inline-flex w-fit rounded-full bg-green-100 px-4 py-2 text-sm font-semibold text-green-700 dark:bg-green-900/40 dark:text-green-400">
                  {{ ucfirst($activo->estado) }}
              </span>

              @if ($this->tieneSolicitudPendiente())
                  {{-- Edición bloqueada durante revisión --}}
                  <button type="button" disabled
                      title="El activo no puede editarse mientras tenga una solicitud de revisión pendiente"
                      class="inline-flex cursor-not-allowed items-center justify-center rounded-lg bg-gray-300 px-4 py-2.5 text-sm font-semibold text-gray-500 shadow-sm dark:bg-gray-700 dark:text-gray-400">
                      <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-5a2 2 0 00-2-2H6a2 2 0 00-2 2v5a2 2 0 002 2zm10-9V7a4 4 0 00-8 0v3h8z" />
                      </svg>

                      Edición bloqueada
                  </button>
              @else
                  {{-- Editar activo --}}
                  <a href="{{ route('mis-activos.editar', $activo) }}"
                      class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                      <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h5m7-10.5a2.121 2.121 0 013 3L12 16l-4 1 1-4 7.5-7.5z" />
                      </svg>

                      Editar activo
                  </a>
              @endif


          </div>

      </div>
