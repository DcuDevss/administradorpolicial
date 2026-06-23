<div>
    <h1>{{ $terms->titulo }}</h1>

    <div>
        {!! $terms->contenido !!}
    </div>
    <div class="mt-5">
    <button
        wire:click="accept"
        class="px-4 py-2 bg-green-600 text-white rounded"
    >
        Aceptar términos y condiciones
    </button>
</div>

</div>
