<div>

    <div class="mb-6">

        <a
            href="{{ route('terms.create') }}"
            class="px-4 py-2 rounded bg-blue-600 text-white"
        >
            Nueva versión
        </a>
        <a
            href="{{ route('terms.acceptances') }}"
            class="px-4 py-2 rounded bg-orange-600 text-white ml-4"
        >
            Ver aceptaciones
        </a>

    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">Título</th>
                <th class="text-center">Versión</th>
                <th class="text-center">Activo</th>
                <th class="text-center">Fecha activación</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>

        <tbody>

            @foreach($terms as $term)

                <tr>

                    <td class="text-center">
                        {{ $term->titulo }}
                    </td>

                    <td class="text-center">
                        {{ $term->version }}
                    </td>

                    <td class="text-center">
                        {{ $term->activo ? 'Sí' : 'No' }}
                    </td>

                    <td class="text-center">
                        @if($term->fecha_activacion)
                            {{ \Carbon\Carbon::parse($term->fecha_activacion)->format('d/m/Y H:i') }}
                        @endif
                    </td>

                    <td class="text-center">
                        <div class="flex gap-2">

                            @if(!$term->activo)

                                <a
                                    href="{{ route('terms.edit', $term->id) }}"
                                    class="px-3 py-1 rounded bg-yellow-600 text-white"
                                >
                                    Editar
                                </a>

                                <button
                                    wire:click="activar({{ $term->id }})"
                                    class="px-3 py-1 rounded bg-green-600 text-white"
                                >
                                    Activar
                                </button>

                            @else

                                <button
                                    wire:click="desactivar({{ $term->id }})"
                                    class="px-3 py-1 rounded bg-red-600 text-white"
                                >
                                    Desactivar
                                </button>

                            @endif

                        </div>
                    </td>

                </tr>

            @endforeach

        </tbody>
    </table>

</div>
