<div class="bg-gray-100 text-gray-900 tracking-wider leading-normal m-4">
    <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">

        <section class=" bg-white text-gray-600  px-1">

            <!-- Table -->
            <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">

                <header class="px-5 py-2 border-b text-center border-gray-100">
                    <h1 class="font-bold text-xl text-red-800 mr-10 ">DATOS PRINCIPALES <span
                            class="text-green-500  ml-20"> ULTIMO NUMERO DE PRONTUARIO REGISTRADO: <span
                                class="text-black ">{{ $contador_pront }}</span></span></h1>
                    <h1 class="text-green-500"> </h1>


                </header>


                <div class="py-3">
                    <div class="overflow-x-auto">
                        <div class=" pb-3">
                            <select class="rounded-md ml-3" wire:model="perPage">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>

                            <input type="text" class="form-input text-gray-500 ml-6 rounded-md" wire:model="search"
                                placeholder="Ingrese la busqueda">
                            <button wire:click="clear" class="ml-2"><span class="fa fa-eraser"></span></button>


                            <a class="inline-flex items-center justify-center float-right mr-4 px-4 py-3 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                                href="{{ route('unico') }}">Crear Prontuario</a>

                        </div>
                        @if ($personas->count())
                            <table class=" w-full">
                                <thead class="text-xs font-semibold uppercase text-gray-900 bg-slate-400 ">
                                    <tr>
                                        <th class="p-2   text-center text-xs text-red-500">
                                            Vive

                                        </th>

                                        <th
                                            class="p-2  text-center  text-xs text-blue-800 cursor-pointer"wire:click="order1('nroProntuario')">
                                            Nro de Prontuario
                                            @if ($sort1 == 'nroProntuario')
                                                @if ($direction1 == 'asc')
                                                    <i class="fas fa-sort-up text-yellow-400"></i>
                                                @else
                                                    <i class="fas fa-sort-down text-yellow-400"></i>
                                                @endif
                                            @else
                                                <i class="fas fa-sort text-yellow-400"></i>
                                            @endif


                                        </th>
                                        <th class="p-2   text-center text-xs text-blue-800">
                                            Nro de Legajo

                                        </th>
                                        <th class="p-2   texte-center text-xs text-blue-800">
                                            Nombre/s

                                        </th>

                                        <th class="p-2   text-center text-xs text-blue-800">
                                            Apellido/s

                                        </th>
                                        <th class="p-2   text-center text-xs text-blue-800">
                                            Tipo de Documento

                                        </th>
                                        <th class="p-2   text-center text-xs text-blue-800">
                                            Nro de Documento

                                        </th>
                                        <th class="p-2   text-right text-xs text-blue-800">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($personas as $persona)
                                        <tr>

                                            @if ($persona->vive() == 'Si')
                                                <td class="text-center py-6">{{ $persona->vive() }}</td>
                                                <td class="text-center py-6">{{ $persona->nroProntuario }}</td>
                                                <td class="text-center py-6">{{ $persona->nroLegajo }}</td>
                                                <td class="text-center py-6">{{ $persona->nombre }}</td>
                                                <td class="text-center py-6">{{ $persona->apellido }}</td>

                                                <td class="text-center py-6">{{ $persona->tipodoc->nombre }}</td>
                                                <td class="text-center py-6">{{ $persona->nroDocumento }}</td>
                                                <td class="">
                                                    <div x-data="{ isOpen: false }" class="relative inline-block mt-1">
                                                        <!-- Dropdown toggle button -->
                                                        <button @click="isOpen = !isOpen"
                                                            class="relative z-10 flex items-center p-1 text-sm text-gray-600 bg-green-800 border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none">
                                                            <span class="mx-1 text-gray-200">Editar</span>
                                                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </button>
                                                        <!-- Dropdown menu -->
                                                        <div x-show="isOpen" @click.away="isOpen = false"
                                                            x-transition:enter="transition ease-out duration-100"
                                                            x-transition:enter-start="opacity-0 scale-90"
                                                            x-transition:enter-end="opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-100"
                                                            x-transition:leave-start="opacity-100 scale-100"
                                                            x-transition:leave-end="opacity-0 scale-90"
                                                            class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800">
                                                            <a href="#"
                                                                class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                                                <div class="mx-1">

                                                                    <a href="{{ route('editFotos', ['id' => $persona->id]) }}"
                                                                        class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">Editar
                                                                        Fotos</a>

                                                                </div>
                                                            </a>

                                                            <a href="#"
                                                                class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                                                <span class="mx-1">
                                                                    <a href="{{ route('editOficios', ['id' => $persona->id]) }}"
                                                                        class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">Agregar/Eliminar
                                                                        Oficios</a>
                                                                </span>
                                                            </a>

                                                            <a href="#"
                                                                class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                                                <span class="mx-1">
                                                                    <a href="{{ route('edit', $persona->id) }}"
                                                                        class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">
                                                                        Editar Perfil
                                                                    </a>
                                                                </span>
                                                            </a>
                                                            <a href="#"
                                                                class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                                                <span class="mx-1">
                                                                    <a href="{{ route('editDomicilio', $persona->id) }}"
                                                                        class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">
                                                                        Editar Domicilios
                                                                    </a>
                                                                </span>
                                                            </a>
                                                            <a href="#"
                                                                class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                                                <span class="mx-1">
                                                                    <a href="{{ route('editMorfologias', $persona->id) }}"
                                                                        class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">
                                                                        Editar Morfologia
                                                                    </a>
                                                                </span>
                                                            </a>


                                                        </div>
                                                    </div>

                    </div>




                    <button
                        class=" z-10 block rounded-md mt-1 px-6 focus:outline-none  bg-slate-800 text-gray-200 text-sm py-1 overflow-hidden  focus:border-white">
                        <a href="{{ route('show', ['id' => $persona->id]) }}" class="text-center">Perfil</a>
                    </button>



                    <button
                        onclick="confirm('Sguro deseas eliminar este prontuario?')||event.stopImmediatePropagation()"
                        wire:click="delete({{ $persona->id }})"
                        class="my-1 z-10 block rounded-md  px-4 focus:outline-none  bg-red-600 text-gray-200 text-sm py-1 overflow-hidden  focus:border-white">
                        Eliminar
                    </button>

                    </td>

                    {{-- ------EL ELSE QUE ME MUESTRA LOS FALLECIDOS CON EL NO, LOS PINTA --}}
                @else
                    <td class="text-center py-6 bg-red-200">{{ $persona->vive() }}</td>
                    <td class="text-center py-6 bg-red-200">{{ $persona->nroProntuario }}</td>
                    <td class="text-center py-6 bg-red-200">{{ $persona->nroLegajo }}</td>
                    <td class="text-center py-6 bg-red-200">{{ $persona->nombre }}</td>
                    <td class="text-center py-6 bg-red-200">{{ $persona->apellido }}</td>
                    <td class="text-center py-6 bg-red-200">{{ $persona->tipodoc->nombre }}</td>
                    <td class="text-center py-6 bg-red-200">{{ $persona->nroDocumento }}</td>


                    <td class=" bg-red-200">
                        <div x-data="{ isOpen: false }" class="relative inline-block mt-1">
                            <!-- Dropdown toggle button -->
                            <button @click="isOpen = !isOpen"
                                class="relative z-10 flex items-center p-1 text-sm text-gray-600 bg-green-800 border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none">
                                <span class="mx-1 text-gray-200">Editar</span>
                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                        fill="currentColor"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div x-show="isOpen" @click.away="isOpen = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800">
                                <a href="#"
                                    class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                    <div class="mx-1">

                                        <a href="{{ route('editFotos', ['id' => $persona->id]) }}"
                                            class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">Editar
                                            Fotos</a>

                                    </div>
                                </a>

                                <a href="#"
                                    class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                    <span class="mx-1">
                                        <a href="{{ route('editOficios', ['id' => $persona->id]) }}"
                                            class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">Agregar/Eliminar
                                            Oficios</a>
                                    </span>
                                </a>

                                <a href="#"
                                    class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                    <span class="mx-1">
                                        <a href="{{ route('edit', $persona->id) }}"
                                            class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">
                                            Editar Perfil
                                        </a>
                                    </span>
                                </a>

                                <a href="#"
                                    class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                    <span class="mx-1">
                                        <a href="{{ route('editDomicilio', $persona->id) }}"
                                            class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">
                                            Editar Domicilios
                                        </a>
                                    </span>
                                </a>

                                <a href="#"
                                    class="flex items-center p-1 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

                                    <span class="mx-1">
                                        <a href="{{ route('editMorfologias', $persona->id) }}"
                                            class="text-center block px-4 py-2 text-lg hover:bg-blue-300 dark:hover:bg-gray-600 text-red-800 font-extrabold">
                                            Editar Morfologia
                                        </a>
                                    </span>
                                </a>



                            </div>
                        </div>

                </div>


                <button
                    class=" z-10 block rounded-md mt-1 px-6 focus:outline-none  bg-slate-800 text-gray-200 text-sm py-1 overflow-hidden  focus:border-white">
                    <a href="{{ route('show', ['id' => $persona->id]) }}" class="text-center">Perfil</a>
                </button>



                <button onclick="confirm('Sguro deseas eliminar este prontuario?')||event.stopImmediatePropagation()"
                    wire:click="delete({{ $persona->id }})"
                    class="my-1 z-10 block rounded-md  px-4 focus:outline-none  bg-red-600 text-gray-200 text-sm py-1 overflow-hidden  focus:border-white">
                    Eliminar
                </button>

                </td>
                @endif

                </tr>
                @endforeach
                </tbody>
                </table>
            @else
                <div class="text-center mb-6">

                    {{-- ------------------------------tabla nueva -------------------------------- --}}


                    <h1 class="py-6 px-4 text-blue-800 font-extrabold text-xl">!! NO EXISTE NINGUN REGISTRO
                        COINCIDENTE, VERIFIQUE DE LO CONTRARIO CONTINUE CON LA APERTURA DE UN NUEVO
                        PRONTUARIO/LEGAJO !!</h1>

                </div>
                @endif
                <div
                    class="bg-white px-4 py-3 text-justify  items-center justify-between border-gray-200 sm:px-6 float-left">
                    {{ $personas->links() }}
                </div>

            </div>

    </div>
    </section>
</div>
