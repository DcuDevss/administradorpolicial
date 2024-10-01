<div class="max-w-6xl mx-auto my-16">

    <h5 class="text-center text-5xl text-white font-bold py-3">Dependencias Policiales</h5>



    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 gap-5 p-2 ">

        @foreach ($users as $key=> $user)



        {{-- child --}}
        <div class="w-full bg-white border border-gray-200 rounded-lg p-5 shadow">

            <div class="flex flex-col items-center pb-10">
                <img src="{{ asset('foto/escudoNegro.jpg') }}" alt="image" class="w-24 h-24 mb-2 5 rounded-full shadow-lg">
                {{-- <img src="https://source.unsplash.com/500x500?face-{{$key}}" alt="image" class="w-24 h-24 mb-2 5 rounded-full shadow-lg"> --}}

                <h5 class="mb-1 text-xl font-medium text-gray-900 " >
                    {{$user->name}}
                </h5>
                <span class="text-sm text-gray-500">{{$user->email}} </span>

                <div class="flex mt-4 space-x-3 md:mt-6">

                   {{--   <button class="bg-blue-700 rounded-md p-3">
                        Agregar amigos
                   </button>--}}

                    {{--  <x-secondary-button>
                        Add Friend
                    </x-secondary-button>--}}

                    <button wire:click="message({{$user->id}})" class="bg-slate-800 rounded-md p-3 text-white">
                         Enviar Mensage
                    </button>

                  {{--   <x-primar y-button wire:click="message({{$user->id}})" >
                        Message
                    </x-primary-button> --}}

                </div>

            </div>


        </div>

        @endforeach
    </div>

</div>
