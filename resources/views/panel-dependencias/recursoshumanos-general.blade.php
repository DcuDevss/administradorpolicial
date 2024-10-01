<x-app-layout>
    <section class="bg-slate-800">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
          <h2 class="text-center text-4xl text-blue-400 font-bold tracking-tight sm:text-5xl">
            Panel Recursos humanos general
          </h2>

          <div class="mt-12 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
            <blockquote class="rounded-lg bg-gray-100 p-8">
              <div class="flex items-center gap-4">
                {{-- <img
                  alt="Man"
                  src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                  class="h-16 w-16 rounded-full object-cover"
                /> --}}
                <div>
                  <a href="{{route('createRecursosGeneral')}}" class="mt-1 text-lg font-medium text-gray-700">Ingresar Inventario</a>
                </div>
              </div>
            </blockquote>

            <blockquote class="rounded-lg bg-gray-100 p-8">
              <div class="flex items-center gap-4">
                {{-- <img
                  alt="Man"
                  src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                  class="h-16 w-16 rounded-full object-cover"
                />  {{route('editComunicaciones1')}}   --}}

                <div>
                  <a href="{{route('ver-notificaciones')}}" class="mt-1 text-lg font-medium text-gray-700">Ver notificaciones de Trabajo</a>
                </div>
              </div>


            </blockquote>

            <blockquote class="rounded-lg bg-gray-100 p-8">
              <div class="flex items-center gap-4">
               {{-- <img
                  alt="Man"
                  src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                  class="h-16 w-16 rounded-full object-cover"
                /> --}}

                <div>

                  <a href="" class="mt-1 text-lg font-medium text-gray-700">Tabla de Dispositivos</a>
                </div>
              </div>


            </blockquote>
          </div>
        </div>
      </section>
</x-app-layout>
