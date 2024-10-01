<x-app-layout>
    <div class="text-center text-xl font-bold text-white mb-4 mt-4">
        <h1>D.C.R.G</h1>
    </div>

    <div class="flex justify-center h-screen items-start pt-10">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12 w-full max-w-5xl px-4">

            <div class="h-96 w-full rounded-lg bg-gray-300 relative">
                <img src="{{ asset('foto/botondcu.jpg') }}" alt="image"
                    class="w-full h-full object-cover rounded-lg shadow-lg">
                <a href="{{ route('createComunicacionesRiogrande') }}"
                    class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                    <h2>Comunicaciones</h2>
                </a>
            </div>

            <div class="h-96 w-full rounded-lg bg-gray-300 relative">
                <img src="{{ asset('foto/informatica.jpg') }}" alt="image"
                    class="w-full h-full object-cover rounded-lg shadow-lg">
                <a href="{{ route('createRiograndeGeneral') }}"
                    class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                    <h2>Informática</h2>
                </a>
            </div>

        </div>
    </div>

    </div>



























    {{--  <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
          <a href="{{route('ver-notificaciones')}}" class="text-center"><h2>Comisaria Segunda</h2></a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
          <a href="" class="text-center">comisaria tercera</a>

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
      --}}




</x-app-layout>
