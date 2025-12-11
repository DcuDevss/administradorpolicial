<x-app-layout>
    <div class="text-center text-xl font-bold text-white mb-4 mt-4">
        <h1>Técnico Comunicaciones</h1>
    </div>




    <div class="grid grid-cols-1 gap-5 lg:grid-cols-5 lg:gap-8 ml-2 mr-2 ">

        <div class="h-32 rounded-lg bg-purple-800 relative">
            <img src="{{ asset('foto/trabajogeneral.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createTrabajoGeneral') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Trabajos Generales</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-purple-800 relative">
            <img src="{{ asset('foto/poliUsh.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesUshuaia') }} "
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Dependencias Ushuaia</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/jefatura.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesJefatura') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Jefatura</h2>
            </a>
        </div>


        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/primera.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicaciones1') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Primera</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/segunda.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicaciones2') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Segunda</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/tercera.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicaciones3') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Tercera</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/cuarta.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicaciones4') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Cuarta</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/quinta1.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicaciones5') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Quinta</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/famila1.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesFamilia1') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria GyFU N 1</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/genero2.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesFamilia2') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria GyFU N 2</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/investigaciones.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesInvestigacion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Investigaciones</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/recursos.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesRecurso') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Recursos Humanos</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/administracion.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesAdministracion') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Administracion</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/narco.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesNarco') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Brigada narcocriminalidad</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/complejos.webp') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesComplejo') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Brigada Delitos Complejos</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/auto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesAutomotore') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Automotores</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/365.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesDto365') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Destacamento 365</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/cientifica.JPG') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesCientifica') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Division Policia Cientifica</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/deseu.webp') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesDseu') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Division servicios especiales</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/custodiagobierno.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesCustodia') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Custodia Gubernamental</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/Comisariatolhuin.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesTolhuin') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Tolhuin</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/botondcu.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesDcu') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>D.C.U</h2>
            </a>
        </div>


        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/polrg.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createComunicacionesRiogrande') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>D.C.R.G</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/banderatdf.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalEquiposComunicacionProv') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario Provincial</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/ushuaiafoto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalEquiposComunicacion') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario general Ushuaia</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/rgfoto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalEquiposComunicacionRg') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario general Río Grande</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/tolhuinfoto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalEquiposComunicacionTol') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario general Tolhuin</h2>
            </a>
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
