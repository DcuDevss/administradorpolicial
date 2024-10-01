  <div class="p-2">
    <form wire:submit.prevent="enviarRespuesta">
        <div class="mb-1">
            <label for="mensaje" class="text-white">Detalle del trabajo realizado:</label>
            <textarea wire:model="mensaje" class="w-full rounded-md"></textarea>
            @error('mensaje') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded-md">Guardar</button>
    </form>
</div>
{{--<div class="p-2">

     <form wire:submit.prevent="enviarRespuesta">
         <div class="mb-1">
             <label for="mensaje">Mensaje de Respuesta:</label>
             <textarea wire:model="mensaje" class="w-full rounded-md resize-y" rows="4"></textarea>
             @error('mensaje') <span class="text-red-500">{{ $message }}</span> @enderror
         </div>

         <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded-md">Enviar Respuesta</button>
     </form>
 </div>--}}


