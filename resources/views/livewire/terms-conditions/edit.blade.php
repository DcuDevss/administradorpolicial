<div class="max-w-5xl mx-auto space-y-6">

    <div>
        <label class="block mb-2">
            Título
        </label>

        <input
            type="text"
            wire:model="titulo"
            class="w-full"
        >
    </div>

    <div>
        <label class="block mb-2">
            Versión
        </label>

        <input
            type="text"
            wire:model="version"
            class="w-full"
        >
    </div>

    <div>
        <label class="block mb-2">
            Contenido
        </label>

        <textarea
            wire:model="contenido"
            rows="15"
            class="w-full"
        ></textarea>
    </div>

    <div class="pt-4 flex justify-end">

        <button
            type="button"
            wire:click="save"
            class="px-4 py-2 rounded bg-blue-600 text-white"
        >
            Guardar cambios
        </button>

    </div>

</div>
