 {{-- Formulario --}}
 <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">

     {{-- Encabezado --}}
     <div class="border-b border-gray-200 p-6 dark:border-gray-700">

         <div class="flex items-center gap-4">

             <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-100 dark:bg-blue-900/40">
                 <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                     viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M9 17v-2a4 4 0 014-4h4m0 0V7m0 4h-4m4 0l3-3m-3 3l3 3M5 5h6a2 2 0 012 2v2H5a2 2 0 01-2-2V7a2 2 0 01-2-2z" />
                 </svg>
             </div>

             <div>
                 <h1 class="text-lg font-semibold text-gray-900 dark:text-white">
                     Carga rápida de activo
                 </h1>

                 <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                     Completá los datos básicos del equipo.
                 </p>
             </div>

         </div>

     </div>

     {{-- Información --}}
     <div class="border-b border-gray-200 bg-blue-50 px-6 py-4 dark:border-gray-700 dark:bg-blue-900/10">

         <div class="flex items-start">

             <svg class="mr-3 mt-0.5 h-5 w-5 shrink-0 text-blue-600 dark:text-blue-400" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z" />
             </svg>

             <div>
                 <p class="text-sm font-semibold text-blue-800 dark:text-blue-300">
                     Registro inicial
                 </p>

                 <p class="mt-1 text-sm leading-5 text-blue-700 dark:text-blue-400">
                     En esta etapa sólo se solicitan los datos básicos del equipo.
                     La información técnica y patrimonial podrá ser completada posteriormente
                     por personal autorizado.
                 </p>
             </div>

         </div>

     </div>

     <form>

         <div class="space-y-6 p-6">

             {{-- =========================================================
                CATEGORÍA
                ========================================================== --}}

             @if ($modo === 'crear')

                 <div>
                     <label for="categoria_activo_id"
                         class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                         Categoría
                         <span class="text-red-500">*</span>
                     </label>

                     <select id="categoria_activo_id" wire:model="categoria_activo_id"
                         class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                         <option value="">
                             Seleccionar categoría
                         </option>

                         @foreach ($categorias as $categoria)
                             <option value="{{ $categoria->id }}">
                                 {{ $categoria->nombre }}
                             </option>
                         @endforeach
                     </select>

                     @error('categoria_activo_id')
                         <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                             {{ $message }}
                         </p>
                     @enderror
                 </div>
             @else
                 {{-- Categoría bloqueada durante edición --}}
                 <div>
                     <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                         Categoría
                     </label>

                     <div
                         class="mt-2 rounded-lg border border-gray-200 bg-gray-100 px-4 py-2.5 text-sm text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                         {{ $activo->categoria?->nombre ?? 'Sin categoría' }}
                     </div>

                     <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                         La categoría del activo requiere validación técnica.
                     </p>
                 </div>

             @endif


             {{-- =========================================================
            MARCA Y MODELO
        ========================================================== --}}

             <div class="grid gap-6 sm:grid-cols-2">

                 <div>
                     <label for="marca" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                         Marca
                     </label>

                     <input id="marca" type="text" wire:model="marca" placeholder="Ej.: Dell, HP, Lenovo"
                         class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500">

                     @error('marca')
                         <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                             {{ $message }}
                         </p>
                     @enderror
                 </div>


                 <div>
                     <label for="modelo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                         Modelo
                     </label>

                     <input id="modelo" type="text" wire:model="modelo" placeholder="Ej.: OptiPlex 3080"
                         class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500">

                     @error('modelo')
                         <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                             {{ $message }}
                         </p>
                     @enderror
                 </div>

             </div>


             {{-- =========================================================
            UBICACIÓN
        ========================================================== --}}

             <div>

                 <label for="ubicacion_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                     Ubicación
                     <span class="text-red-500">*</span>
                 </label>

                 <select id="ubicacion_id" wire:model="ubicacion_id"
                     class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                     <option value="">
                         Seleccionar ubicación
                     </option>

                     @foreach ($ubicaciones as $ubicacion)
                         <option value="{{ $ubicacion->id }}">
                             {{ $ubicacion->nombre }}

                             @if ($ubicacion->dependencia)
                                 — {{ $ubicacion->dependencia->nombre }}
                             @endif
                         </option>
                     @endforeach
                 </select>

                 <div
                     class="mt-3 rounded-lg border border-blue-100 bg-blue-50 p-3 dark:border-blue-900/40 dark:bg-blue-900/20">
                     <div class="flex items-start">

                         <svg class="mr-2 mt-0.5 h-4 w-4 shrink-0 text-blue-600 dark:text-blue-400" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                         </svg>

                         <p class="text-xs leading-5 text-blue-700 dark:text-blue-300">
                             La dependencia del activo se determinará automáticamente
                             a partir de la ubicación seleccionada.
                             Si la ubicación donde se encuentra el equipo no está disponible,
                             próximamente podrás solicitar el alta de una nueva ubicación.
                         </p>

                     </div>
                 </div>

                 @error('ubicacion_id')
                     <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                         {{ $message }}
                     </p>
                 @enderror

             </div>

             {{-- =========================================================
                    OBSERVACIONES
                ========================================================== --}}

             <div>

                 <label for="observaciones" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                     Observaciones
                 </label>

                 <textarea id="observaciones" wire:model="observaciones" rows="4" maxlength="2000"
                     placeholder="Podés indicar información adicional sobre el equipo, ubicación o situación actual."
                     class="mt-2 block w-full rounded-lg border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-500"></textarea>

                 @error('observaciones')
                     <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                         {{ $message }}
                     </p>
                 @enderror

             </div>

         </div>


         {{-- =========================================================
                ACCIONES
            ========================================================== --}}

         <div
             class="flex flex-col-reverse gap-3 border-t border-gray-200 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-900/30 sm:flex-row sm:justify-end">

             <a href="{{ $modo === 'editar' ? route('mis-activos.detalle', $activo) : route('mis-activos') }}"
                 class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                 Cancelar
             </a>


             <button type="button" wire:click="guardar" wire:loading.attr="disabled" wire:target="guardar"
                 class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 dark:focus:ring-offset-gray-900">
                 <span wire:loading.remove wire:target="guardar">
                     {{ $modo === 'editar' ? 'Guardar cambios' : 'Registrar activo' }}
                 </span>

                 <span wire:loading wire:target="guardar" class="inline-flex items-center">
                     <svg class="mr-2 h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24">
                         <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                             stroke-width="4"></circle>

                         <path class="opacity-75" fill="currentColor"
                             d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12 0h4z">
                         </path>
                     </svg>

                     {{ $modo === 'editar' ? 'Guardando...' : 'Registrando...' }}
                 </span>
             </button>
         </div>

     </form>

 </div>
