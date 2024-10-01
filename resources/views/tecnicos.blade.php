<x-app-layout>
  <div class="text-center">
<h1>Tecnicos</h1>
  <!-- En la vista del técnico (por ejemplo, dashboard del técnico) -->
</div>




<div>

  @can('tecnico-comunicacion')
  <a class="inline-flex items-center justify-center float-right mr-4 px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"
      href="{{ route('tecnico-comunicacion') }}">Tecnicos comunicaciones</a>
@endcan
 

 <a href="{{route('tecnico-informatico')}}">Tecnicos Informaticos</a>

</div>

    {{--  Resto del contenido de la vista del técnico{{ route('enviar-respuesta', ['notificacionId' ]) }} -->

    <div class="grid grid-cols-1 gap-5 lg:grid-cols-5 lg:gap-8 m-8 mb-8">
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="{{route('panel.comisaria1')}}" class="text-center"><h2>Comisaria Primera</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="{{route('ver-notificaciones')}}" class="text-center"><h2>Comisaria Segunda</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="" class="text-center">comisaria cuarta</a>

      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Comisria Cuarta</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Comisria Quinta</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Jefatura</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Sub Jefatura</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Investigaciones</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Recursos Humanos</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Administracion</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Brigada narcocriminalidad</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Brigada Delitos Complejos</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Automotores</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Destacamento 365</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Comisaria de familia 1</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Comisaria de familia 2</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Division servicios especiales</h2></a>
      </div>
      <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
        <a href="#" class="text-center"><h2>Custodia gubernamental</h2></a>
      </div>

      <div class="h-32 rounded-lg bg-gray-300"></div>
      <div class="h-32 rounded-lg bg-gray-300"></div>
      <div class="h-32 rounded-lg bg-gray-300"></div>
      <div class="h-32 rounded-lg bg-gray-300"></div>
      <div class="h-32 rounded-lg bg-gray-300"></div>
      <div class="h-32 rounded-lg bg-gray-300"></div>
      <div class="h-32 rounded-lg bg-gray-300"></div>
    </div>
--}}



  </x-app-layout>
