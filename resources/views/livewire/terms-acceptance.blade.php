<div>
    <h1>{{ $terms->titulo }}</h1>

    <div>
        {!! $terms->contenido !!}
    </div>
    <div class="mt-4">

        <label>

            <input
                type="checkbox"
                id="accepted"
                wire:model="accepted"
            >

            He leído y acepto los términos y condiciones.

        </label>

        @error('accepted')
            <div class="text-red-500">
                {{ $message }}
            </div>
        @enderror

    </div>
    <div class="mt-5">
    <button
        type="button"
        onclick="checkTerms()"
        class="px-4 py-2 bg-green-600 text-white rounded"
    >
        Aceptar términos y condiciones
    </button>
</div>

</div>
<script>

function checkTerms() {

    const checkbox =
        document.getElementById('accepted');

    if (!checkbox.checked) {

        Swal.fire({
            icon: 'warning',
            title: 'Atención',
            text: 'Debe leer y aceptar los términos y condiciones.'
        });

        return;
    }

    @this.call('accept');
}

</script>
