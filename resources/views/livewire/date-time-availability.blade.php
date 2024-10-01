<!-- resources/views/livewire/date-time-availability.blade.php -->
{{--
<div class="space-y-4">
    <div class="w-full bg-gray-600 text-center">
        <input
            type="text"
            id="date"
            wire:model="date"
            class="bg-gray-200 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 py-1 my-1 focus:outline-none focus:border-blue-400"
            autocomplete="off"
        />
    </div>

    <div class="grid gap-4 grid-cols-6">
        @foreach($availableTimes as $key => $time)
            <div class="w-full group">
                <input
                    type="radio"
                    id="interval-{{ $key }}"
                    name="time"
                    value="{{ $key }}"
                    wire:model="selectedTime"
                    @disabled(!$time)
                    class="hidden peer"
                />
                <label
                    @class(['inline-block w-full text-center border py-1 peer-checked:bg-green-400 peer-checked:border-green-700', 'bg-blue-400 hover:bg-blue-500' => $time, 'bg-gray-100 cursor-not-allowed' => !$time])
                    wire:key="interval-{{ $key }}"
                    for="interval-{{ $key }}"
                >
                    {{ $key }}
                </label>
            </div>
        @endforeach
    </div>
</div>


@foreach($appointments as $appointment)
    <div>
        {{ $appointment->start_time }}
        <button wire:click="deleteReservation('{{ $appointment->start_time }}')">Borrar</button>
    </div>
@endforeach

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
        new Pikaday({
            field: document.getElementById('date'),
            format: 'YYYY-MM-DD', // Agregado: establecer el formato de fecha
            onSelect: function() {
                @this.set('date', this.getMoment().format('YYYY-MM-DD'));
            }
        });
    </script>
@endpush

 --}}

 <div>
    <h1>Reservar una cita</h1>

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div>
        <label for="date">Selecciona una fecha:</label>
        <input wire:model="date" type="date" id="date">
    </div>

    <div>
        <label for="time">Selecciona una hora:</label>
        <select wire:model="selectedTime" id="time">
            <option value="">Selecciona una hora</option>
            @foreach ($availableTimes as $time => $isAvailable)
                <option value="{{ $time }}" {{ !$isAvailable ? 'disabled' : '' }}>
                    {{ $time }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <button wire:click="reserve" {{ empty($selectedTime) || !$availableTimes[$selectedTime] ? 'disabled' : '' }}>
            Reservar
        </button>
    </div>

    @if($appointments->count() > 0)
        <h2>Citas reservadas para {{ $date }}:</h2>
        <ul>
            @foreach($appointments as $appointment)
                <li>{{ $appointment->start_time->format('h:i A') }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay citas reservadas para {{ $date }}.</p>
    @endif
</div>
