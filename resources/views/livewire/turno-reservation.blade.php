<!-- resources/views/livewire/turno-reservation.blade.php -->
<div class="py-5  bg-slate-800  dark:bg-gray-100 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form wire:submit.prevent="reservar">
                <label for="fecha">Fecha:</label>
                <input type="date" wire:model="fecha" required>

                <label for="hora">Hora:</label>
                <input type="time" wire:model="hora" required>

                <button type="submit">Reservar</button>
            </form>
        </div>
    </div>
</div>
