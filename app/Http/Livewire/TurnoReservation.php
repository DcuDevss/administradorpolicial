<?php

// app/Http/Livewire/TurnoReservation.php

use Livewire\Component;
use App\Models\Turno;
use Illuminate\Support\Facades\Auth;

class TurnoReservation extends Component
{
    public $fecha;
    public $hora;

    public function render()
    {
        return view('livewire.turno-reservation');
    }

    public function reservar()
    {
        // Verifica si ya hay dos reservas para esta fecha y hora
        $reservas = Turno::where('fecha', $this->fecha)
            ->where('hora', $this->hora)
            ->where('reservado', true)
            ->count();

        if ($reservas >= 2) {
            session()->flash('error', 'Ya no hay turnos disponibles para esta fecha y hora.');
        } else {
            // Crea una nueva reserva
            Turno::create([
                'fecha' => $this->fecha,
                'hora' => $this->hora,
                'usuario_id' => Auth::id(),
                'reservado' => true,
            ]);

            session()->flash('success', 'Turno reservado exitosamente.');
        }
    }
}

