<div class="text-gray-900 tracking-wider leading-normal m-4">
    {{--  <div class="container w-full md:w-4/5 xl:w-3/5  mx-auto  px-2"> --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <section class=" text-gray-600 rounded-md px-1">
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
                            {{--  <a class="inline-flex items-center justify-center float-right mr-4 px-4 py-3 bg-slate-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
                                href="{{route('createComunicaciones1')}}">Ingrese Inventario/service</a> --}}
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

                                        Tipo de equipo
                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">

                                        Marca
                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">

                                        Tipo de antena
                                    </th>
                                    <th class="p-1   texte-center text-xs text-blue-800">
                                        Modelo

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Nro serie

                                    </th>

                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Donde se localiza

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Condicion del equipo

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Fecha service

                                    </th>
                                    <th class="p-1   text-center text-xs text-blue-800">
                                        Tipo de service

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

                                @foreach ($comunicaciones as $comu)
                                    <tr>
                                        <td class="text-center py-6 font-bold">{{ $comu->id ?? 'No encontrado'}}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->equipocomunicacion->nombre ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->marcaequipo->nombre ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->vhfantena->nombre ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->modelo ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->nro_serie ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->lugar_colocacion ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->condicion_equipo_comunicacion ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->fecha_service ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->tipo_service ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">{{ $comu->fecha_inventario ?? 'No encontrado' }}</td>
                                        <td class="text-center py-6 font-bold">
                                            <div class="whitespace-normal break-words">{{ $comu->detalle_inventario ?? 'No encontrado' }}
                                            </div>
                                        </td>
                                        <td class="text-center py-2 flex flex-col space-y-2">
                                            <a href="{{ route('editComunicacionesCientifica', $comu->id) }}"
                                                class="inline-block bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 mr-1 rounded">
                                                Editar
                                            </a>
                                            <a  href="{{ route('historial-trabajo-cientifica', $comu->id) }}"
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
                            {{ $comunicaciones->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
