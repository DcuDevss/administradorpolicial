<x-app-layout>

    <h1 class="text-center text-xl font-bold text-white mb-4 mt-4">Técnico Informática</h1>
{{-- {{ route('turnos-calendar') }} --}}
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

        <div class="grid grid-cols-1 gap-3 lg:grid-cols-3 lg:gap-8 m-8 mb-8">

            <div class="h-52 rounded-lg bg-blue-300 relative shadow-none"> <!-- Agregar shadow-none aquí -->
                <img src="{{ asset('foto/patrullero.jpg') }}" alt="image"
                     class="w-full h-full object-cover rounded-lg">
                <a href="{{ route('createInventarioGeneral') }}"
                   class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                    <h2>Areas operativas Informatica</h2>
                </a>
            </div>

            <div class="h-52 rounded-lg bg-gray-300 relative shadow-none"> <!-- Agregar shadow-none aquí -->
                <img src="{{ asset('foto/investigaciones.jpeg') }}" alt="image"
                     class="w-full h-full object-cover rounded-lg">
                <a href="{{ route('createInvestigacionesGeneral') }} "
                   class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                    <h2>Investigaciones</h2>
                </a>
            </div>

        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/administracion.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createAdministracionGeneral') }} "
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Administracion</h2>
            </a>
        </div>

        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/jefatura.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createJefaturaGeneral') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Jefatura</h2>
            </a>
        </div>

        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/recursos.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createRecursosGeneral') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Recursos humanos</h2>
            </a>
        </div>
        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/Comisariatolhuin.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createTolhuinGeneral') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Tolhuin</h2>
            </a>
        </div>

        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/polrg.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createRiograndeGeneral') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>D.C.R.G</h2>
            </a>
        </div>
        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/notificacion4.png') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('ver-notificaciones') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Notificaciones de trabajo</h2>
            </a>
        </div>

        <div class="h-52 rounded-lg bg-gray-300 relative text-center">
            <img src="{{ asset('foto/estadistica.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('estadistica') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Estadisticas</h2>
            </a>
        </div>

          <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/reparador.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('createTrabajosInformatica') }}"
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Trabajos generales</h2>
            </a>
        </div>

        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/banderatdf.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalInventarioProvincia') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario general Provincial</h2>
            </a>
        </div>


        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/ushuaiafoto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalInventarioInformatica') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario general Ushuaia</h2>
            </a>
        </div>
        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/rgfoto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalInventarioInformaticaRioGrande') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario general Rio Grande</h2>
            </a>
        </div>
        <div class="h-52 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/tolhuinfoto.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href="{{ route('TotalInventarioInformaticaTolhuin') }}" class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-20 rounded-lg">
                <h2>Inventario general Tolhuin</h2>
            </a>
        </div>
    </div>
       {{-- <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Recursos Humanos</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Administracion</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Brigada narcocriminalidad</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Brigada Delitos Complejos</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Automotores</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Destacamento 365</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Comisaria de familia 1</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Comisaria de familia 2</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Division servicios especiales</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
            <a href="#" class="text-center">
                <h2>Custodia gubernamental</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>--}}









        {{--<div class="grid grid-cols-1 gap-5 lg:grid-cols-5 lg:gap-8 m-8 mb-8">
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">

                <a href="" class="text-center">
                    <h2>Comisaria Primera</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="" class="text-center">
                    <h2>Comisaria Segunda</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="" class="text-center">comisaria cuarta</a>

            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="#" class="text-center">
                    <h2>Comisria Cuarta</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="#" class="text-center">
                    <h2>Comisria Quinta</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="#" class="text-center">
                    <h2>Jefatura</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="#" class="text-center">
                    <h2>Sub Jefatura</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="#" class="text-center">
                    <h2>Investigaciones</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="#" class="text-center">
                    <h2>Recursos Humanos</h2>
                </a>
            </div>
            <div class="h-32 rounded-lg bg-gray-300 flex items-center justify-center">
                <a href="#" class="text-center">
                    <h2>Administracion</h2>
                </a>
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


        <div class="bg-white p-4 border rounded shadow-lg">
            <h2 class="text-lg font-semibold">Panel de Opciones</h2>
            <ul class="mt-2">
              <li class="mb-2">
                <label class="inline-flex items-center">
                  <input type="checkbox" class="form-checkbox text-indigo-600">
                  <span class="ml-2">Opción 1</span>
                </label>
              </li>
              <li class="mb-2">
                <label class="inline-flex items-center">
                  <input type="checkbox" class="form-checkbox text-indigo-600">
                  <span class="ml-2">Opción 2</span>
                </label>
              </li>
              <li class="mb-2">
                <label class="inline-flex items-center">
                  <input type="checkbox" class="form-checkbox text-indigo-600">
                  <span class="ml-2">Opción 3</span>
                </label>
              </li>
            </ul>
            <button class="mt-4 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">
              Aplicar
            </button>
          </div>--}}




</div>
</x-app-layout>
