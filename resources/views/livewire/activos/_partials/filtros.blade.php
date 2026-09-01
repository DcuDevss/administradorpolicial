  <div class="mb-8 rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">

      <div class="mb-5">

          <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
              Buscar activos
          </h2>

          <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
              Utilizá los filtros para encontrar rápidamente un equipo.
          </p>

      </div>


      <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">

          {{-- =================================================
                BÚSQUEDA GENERAL
            ================================================== --}}
          <div class="lg:col-span-2">

              <label for="buscar" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                  Buscar
              </label>

              <input id="buscar" type="text" wire:model.live.debounce.400ms="buscar"
                  placeholder="Marca, modelo, código o número de serie..."
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">

          </div>


          {{-- =================================================
                CATEGORÍA
            ================================================== --}}
          <div>

              <label for="categoria" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                  Categoría
              </label>

              <select id="categoria" wire:model.live="categoriaId"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                  <option value="">
                      Todas las categorías
                  </option>

                  @foreach ($categorias as $categoria)
                      <option value="{{ $categoria->id }}">
                          {{ $categoria->nombre }}
                      </option>
                  @endforeach

              </select>

          </div>


          {{-- =================================================
                UBICACIÓN
            ================================================== --}}
          <div>

              <label for="ubicacion" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                  Ubicación
              </label>

              <select id="ubicacion" wire:model.live="ubicacionId"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                  <option value="">
                      Todas las ubicaciones
                  </option>

                  @foreach ($ubicaciones as $ubicacion)
                      <option value="{{ $ubicacion->id }}">
                          {{ $ubicacion->nombre }}
                      </option>
                  @endforeach

              </select>

          </div>


          {{-- =================================================
                ESTADO
            ================================================== --}}
          <div>

              <label for="estado" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                  Estado
              </label>

              <select id="estado" wire:model.live="estado"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">

                  <option value="">
                      Todos los estados
                  </option>

                  <option value="activo">
                      Activo
                  </option>

                  <option value="en_revision">
                      En revisión
                  </option>

                  <option value="en_reparacion">
                      En reparación
                  </option>

                  <option value="listo_para_retirar">
                      Listo para retirar
                  </option>

                  <option value="fuera_de_servicio">
                      Fuera de servicio
                  </option>

                  <option value="dado_de_baja">
                      Dado de baja
                  </option>

              </select>

          </div>

      </div>


      {{-- =================================================
            LIMPIAR FILTROS
        ================================================== --}}
      @if ($buscar || $categoriaId || $ubicacionId || $estado)
          <div class="mt-5">

              <button type="button" wire:click="limpiarFiltros"
                  class="text-sm font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                  Limpiar filtros
              </button>

          </div>
      @endif

  </div>
