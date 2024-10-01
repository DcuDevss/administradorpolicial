<div class="bg-slate-800 text-gray-900 tracking-wider leading-normal m-4">
    <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 ">
        <section class=" bg-white text-gray-600 rounded-md px-1">
            <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
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
                        </div>
                        <table class="w-full table-auto">
                            <thead class="text-xs font-semibold uppercase text-gray-900 bg-slate-400">
                                <tr>
                                    <th class="p-1   text-center text-xs text-red-500">
                                        Nro
                                        @if ($sort1 == 'id')
                                            @if ($direction1 == 'asc')
                                                <i class="fas fa-sort-up text-yellow-400"></i>
                                            @else
                                                <i class="fas fa-sort-down text-yellow-400"></i>
                                            @endif
                                        @else
                                            <i class="fas fa-sort text-yellow-400"></i>
                                        @endif
                                    </th>
                                    <th class="p-1  text-center  text-xs text-blue-800 cursor-pointer">

                                        Dependencias Ushuaia
                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">

                                        Dependencias Tolhuin
                                    </th>

                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Lugar de trabajo

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Fecha de trabajo

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Detalle del trabajo

                                    </th>

                                    <th class="p-1   text-right text-xs text-blue-800">
                                        Acciones
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @foreach ($trabajos as $comu)
                                    <tr>
                                        <td class="text-center py-6 font-bold">{{ $comu->id }}</td>
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->totaldependencia->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">
                                            {{ $comu->dependenciatolhuin->nombre ?? '----' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->lugar_trabajo ?? '----' }}</td>

                                        <td class="text-center py-6 font-bold">{{ $comu->fecha_trabajo ?? '----' }}
                                        </td>
                                        <td class="text-center py-6 font-bold">{{ $comu->detalles_trabajo ?? '----' }}
                                            <td class="text-center py-2 flex flex-col space-y-2">
                                            <a href="{{ route('editTrabajosInformatica', $comu->id) }}"
                                                class="inline-block bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded">
                                                Editar
                                            </a>
                                            <a href="{{ route('historial-trabajo-informatica', $comu->id) }}"
                                                class="inline-block bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded">
                                                Historial
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="bg-white px-4 py-3 text-justify  items-center justify-between border-gray-200 sm:px-6 float-right">
                            {{ $trabajos->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
