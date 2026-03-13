<div class="text-gray-900 tracking-wider leading-normal m-4">
    {{--  <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto  px-2"> --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <section class="text-gray-600 rounded-md px-1">
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
                        <table class="w-full ">
                            <thead class="text-xs font-semibold uppercase text-gray-900 bg-slate-400 ">
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

                                        Categoria
                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800 cursor-pointer">
                                        Nombre del Elemento

                                    </th>

                                    <th class="p-1   text-center text-xs text-blue-800">

                                        Marca
                                    </th>
                                    <th class="p-1   texte-center text-xs text-blue-800">
                                        Modelo

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Nro serie

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Fecha Service

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo service

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Estado

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Fecha inventario
                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Detalle inventario

                                    </th>
                                    {{-- <th class="p-1   text-center text-xs text-blue-800">
                                        QR

                                    </th> --}}
                                    <th class="p-1 text-center text-xs text-blue-800">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="text-sm divide-y divide-gray-100">

                                @foreach ($comunicacionesdcu as $comu)
                                    <tr>
                                        <td class="text-center py-6 font-bold">{{ $comu->id ?? ''}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->categoriacomunicacions->name ?? ''}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->nombre ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->marca ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->modelo ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->numero_serie ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->fecha_service ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->tipo_service ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->estado ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->fecha_inventario ?? 'Sin Datos'}}</td>
                                        <td class="text-center py-6 font-bold">
                                            <div class="whitespace-normal break-words">{{ $comu->detalle_inventario ?? '' }}
                                            </div>
                                        </td>
                                        <td class="text-center py-2 flex flex-col space-y-2">
                                            <a href="{{ route('editComunicacionesDcu', $comu->id) }}"
                                                class="inline-block bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded">
                                                Editar
                                            </a>
                                            <a href="{{ route('historial-trabajo-dcu', $comu->id) }}"
                                                class="inline-block bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded">
                                                Modificaciones
                                            </a>
                                            <button
                                                type="button"
                                                class="inline-block bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded"
                                                data-wire="eliminar"
                                                data-id="{{ $comu->id }}">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div
                            class="bg-white px-4 py-3 text-justify  items-center justify-between border-gray-200 sm:px-6 float-right">
                            {{ $comunicacionesdcu->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
