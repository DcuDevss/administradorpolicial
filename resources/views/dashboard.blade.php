<x-app-layout>
    <div class="flex items-center justify-center h-screen">
        <div class="max-w-sm{{--  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 --}}">
            <a href="#">
                <img class="rounded-t-lg" src="{{ asset('foto/ComunicacioneNuevoSinFondo.webp') }}" alt=""
                    loading="lazy" decoding="async/>
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Comunicaciones
                        Policiales D.C.U</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Policía de Tierra del Fuego e isla del
                    Atlántico Sur</p>
                <a href="{{ route('crear-notificacion') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Servicio Técnico
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
        </div>
    </div>
    </div>
</x-app-layout>







{{-- <a href="{{ route('crear-notificacion') }}" class="text-blue-800"><strong>notifi chat</strong></a>
      <a href="{{ route('chatlist') }}" class="text-blue-800"><strong>lista de chat</strong></a> --}}

{{--  <div id="notification-bar" class="absolute top-0 right-0 mt-2 mr-4 hidden">
      <span class="absolute h-2 w-2 bg-blue-500 rounded-full top-0 right-0"></span>
      <svg class="h-6 w-6 text-gray-800" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
      </svg>
  </div> --}}
{{--  <div class="grid grid-cols-1 gap-5 lg:grid-cols-5 lg:gap-8 m-8 mb-8">
  <div class="h-32 rounded-lg bg-gray-300 relative">
    <img src="{{ asset('foto/primera.jpg') }}" alt="image"
        class="w-full h-full object-cover rounded-lg shadow-lg">
    @can('accessCrearNotificacion', auth()->user())
        <a href="{{ route('crear-notificacion') }}"
            class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
            <h2>Comisaria Primera</h2>
        </a>
    @endcan
</div>

<div class="h-32 rounded-lg bg-gray-300 relative">
    <img src="{{ asset('foto/segunda.jpg') }}" alt="image"
        class="w-full h-full object-cover rounded-lg shadow-lg">
    @can('accessTurnosCalendar', auth()->user())
        <a href="{{ route('turnos-calendar') }}"
            class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
            <h2>Comisaria Segunda</h2>
        </a>
    @endcan
</div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/tercera.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href=""
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Tercera</h2>
            </a>
        </div>

        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/cuarta.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href=""
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Cuarta</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/quinta1.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href=""
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria Quinta</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/famila1.jpeg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href=""
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria GyFU N 1</h2>
            </a>
        </div>
        <div class="h-32 rounded-lg bg-gray-300 relative">
            <img src="{{ asset('foto/genero2.jpg') }}" alt="image"
                class="w-full h-full object-cover rounded-lg shadow-lg">
            <a href=""
                class="absolute inset-0 flex items-center justify-center text-center text-white text-lg font-bold bg-black bg-opacity-50 rounded-lg">
                <h2>Comisaria GyFU N 2</h2>
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
        </div> --}}

{{--  <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
        <div class="h-32 rounded-lg bg-gray-300"></div>
    </div> --}}
