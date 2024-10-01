
<div class="container mx-auto p-4">
    @if ($respuestas->count() > 0)
        <ul class="border border-gray-300 rounded-md p-4">
            @foreach ($respuestas as $respuesta)
                <li class="py-2">
                    <strong>Fecha:</strong> {{ $respuesta->created_at->format('d/m/Y H:i:s') }}<br>
                    <strong>Mensaje del Técnico:</strong> {{ $respuesta->mensaje }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay respuestas del Técnico para</p>
    @endif
</div>


