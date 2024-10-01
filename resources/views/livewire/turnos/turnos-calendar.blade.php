{{-- <div class="p-4">
    <div class="mb-4">
        <h1 class="text-xl font-bold mb-2">Calendario de Turnos</h1>
        <p>Selecciona una fecha para ver los turnos disponibles:</p>
    </div>



        <!-- Lista de Turnos -->
        <div class="w-1/4">
            <h2 class="text-lg font-bold mb-2">Turnos Disponibles</h2>
            <ul style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; margin: auto;">
                @foreach ($turnos as $turno)
                    <li
                        wire:click="selectTurno('{{ $turno }}')"
                        class="cursor-pointer px-4 py-2 border rounded {{ $selectedTurno === $turno ? 'bg-blue-500 text-white' : '' }}">
                        {{ $turno }}
                    </li>
                @endforeach
            </ul>
        </div>

</div> --}}

<!-- resources/views/livewire/turno-reservation.blade.php -->
  <div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
       {{-- <div>
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4">{{ session('error') }}</div>
            @endif

            <form wire:submit.prevent="reservar">
                <label for="fecha" class="text-white">Fecha:</label>
                <input type="date" wire:model="fecha" required class="bg-white text-black p-2 rounded-md mb-4">

                <label for="hora" class="text-white">Hora:</label>
                <input type="time" wire:model="hora" required class="bg-white text-black p-2 rounded-md mb-4">

                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Reservar</button>
            </form>
        </div>--}}

       {{--  <div>
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4">{{ session('error') }}</div>
            @endif

            <div class="flex">
                <div class="w-1/4">
                    <!-- Aquí se muestran los días de la semana -->
                    @php
                        $daysOfWeek = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];
                    @endphp
                    @foreach ($daysOfWeek as $day)
                        <div class="mb-4">{{ $day }}</div>
                    @endforeach
                </div>

                <div class="w-3/4">
                    <!-- Aquí se muestran los horarios disponibles -->
                    @php
                        $startHour = 9;
                        $endHour = 15;
                        $interval = 30;
                    @endphp
                    @for ($hour = $startHour; $hour <= $endHour; $hour++)
                        @for ($minute = 0; $minute < 60; $minute += $interval)
                            <div class="mb-2">
                                {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:{{ str_pad($minute, 2, '0', STR_PAD_LEFT) }}
                                <!-- Lógica para verificar disponibilidad aquí -->
                                <!-- Puedes agregar un botón para que los usuarios reserven el turno -->
                            </div>
                        @endfor
                    @endfor
                </div>
            </div>
        </div> --}}

        <div>
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 mb-4">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-4 mb-4">{{ session('error') }}</div>
            @endif

            <div class="flex">
                <div class="w-1/4 text-white">
                    <!-- Aquí se muestran los días de la semana -->
                    @php
                        $startOfWeek = \Carbon\Carbon::now()->startOfWeek();
                    @endphp
                    @for ($i = 0; $i < 5; $i++)
                        <div class="mb-4">{{ $startOfWeek->format('l') }}</div>
                        @php
                            $startOfWeek->addDay();
                        @endphp
                    @endfor
                </div>

                <div class="w-3/4">
                    <!-- Aquí se muestran los horarios disponibles -->
                   {{--  @foreach ($availableTimes as $time)
                        <div class="mb-2 text-white">
                            {{ $time }}
                            @if (!$isReserving)
                                <button wire:click="reservarTurno('{{ $time }}')">Reservar</button>
                            @else
                                <span>Cargando...</span>
                            @endif
                        </div>
                    @endforeach --}}
                </div>

                <div class="mt-4">
                    <label for="fecha" class="text-white">Seleccionar Fecha:</label>
                    <input type="date" wire:model="fecha" required class="bg-white text-black p-2 rounded-md mb-2">

                    <label for="hora" class="text-white">Seleccionar Hora:</label>
                    <input type="time" wire:model="hora" required class="bg-white text-black p-2 rounded-md mb-2">

                    @if (!$isHoraNoDisponible)
                        <button wire:click="reservarTurno()" class="bg-blue-500 text-white p-2 rounded-md">Reservar</button>
                    @else
                        <button class="bg-red-500 text-white p-2 rounded-md" disabled>No disponible</button>
                    @endif
                </div>


            </div>
        </div>











    </div>
</div>

