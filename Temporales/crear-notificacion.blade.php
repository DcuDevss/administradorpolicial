 <div class="p-4">
    <form wire:submit.prevent="enviarNotificacion" class="max-w-md mx-auto">
        <div class="mb-4">
            <label for="tecnico_id" class="block font-medium mb-1">Seleccionar Técnico:</label>
            <select wire:model="tecnico_id" class="w-full rounded-md border border-gray-300 py-2 px-3">
                <option value="">Seleccionar técnico...</option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                @endforeach
            </select>
            @error('tecnico_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="mensaje" class="block font-medium mb-1">Mensaje:</label>
            <textarea wire:model="mensaje" class="w-full rounded-md border border-gray-300 py-2 px-3 resize-none" rows="4"></textarea>
            @error('mensaje')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="activa" class="block font-medium mb-1">Marcar Orden de trabajo activa:</label>
            <input type="checkbox" wire:model="activa" class="form-checkbox">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Enviar
            Notificación</button>
    </form>
    {{-- @livewire('ver-respuestas', ['tecnico_id' => $tecnico_id]) --}}
</div>

 {{-- resources/views/livewire/crear-notificacion.blade.php --}}

{{-- <div class="p-4">
    <form wire:submit.prevent="enviarNotificacion" class="max-w-md mx-auto">
        <div class="mb-4">
            <label for="tecnico_id" class="block font-medium mb-1">Seleccionar Técnico:</label>
            <select wire:model="tecnico_id" class="w-full rounded-md border border-gray-300 py-2 px-3">
                <option value="">Seleccionar técnico...</option>
                @foreach ($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}">{{ $tecnico->name }}</option>
                @endforeach
            </select>
            @error('tecnico_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="mensaje" class="block font-medium mb-1">Mensaje:</label>
            <textarea wire:model="mensaje" class="w-full rounded-md border border-gray-300 py-2 px-3 resize-none" rows="4"></textarea>
            @error('mensaje')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="activa" class="block font-medium mb-1">Marcar Orden de trabajo activa:</label>
            <input type="checkbox" wire:model="activa" class="form-checkbox">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Enviar Notificación</button>
    </form>
</div>

@if ($mensajeTecnico)
    <div class="p-4">
        <h2 class="text-xl font-bold mb-2">Respuesta del Técnico:</h2>
        <p>{{ $mensajeTecnico }}</p>
    </div>
@endif
 --}}
