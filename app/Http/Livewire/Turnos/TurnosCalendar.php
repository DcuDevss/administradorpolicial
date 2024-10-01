<?php

namespace App\Http\Livewire\Turnos;

use Livewire\Component;
use App\Models\Turno;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TurnosCalendar extends Component
{
    public $fecha;
    public $hora;
    public $availableTimes = [];
    public $isHoraNoDisponible = false;

    public function render()
    {
        // Obtener la fecha de inicio de la semana actual (lunes)
        $startOfWeek = Carbon::now()->startOfWeek();

        // Calcular los horarios disponibles para la semana
        $currentHour = 9;
        $currentMinute = 0;

        while ($currentHour <= 15) {
            while ($currentMinute < 60) {
                $time = Carbon::create($startOfWeek->year, $startOfWeek->month, $startOfWeek->day, $currentHour, $currentMinute);
                $this->availableTimes[] = $time->format('H:i');
                $currentMinute += 30;
            }
            $currentHour++;
            $currentMinute = 0;
        }

        return view('livewire.turnos.turnos-calendar', ['availableTimes' => $this->availableTimes]);
    }

    public function reservarTurno()
    {
        // Verificar si el turno ya está reservado por el usuario actual
        $existingReservation = Turno::where('fecha', $this->fecha)
            ->where('hora', $this->hora)
            ->where('user_id', Auth::id())
            ->where('reservado', true)
            ->count();

        if ($existingReservation > 0) {
            session()->flash('error', 'Ya has reservado este turno.');
        } else {
            // Agrega tu lógica para verificar la disponibilidad de la hora aquí
            // Si la hora no está disponible, establece $this->isHoraNoDisponible en true
            // De lo contrario, realiza la reserva

            // Ejemplo de verificación ficticia (reemplaza con tu lógica real)
            if ($this->hora == '09:30') {
                $this->isHoraNoDisponible = true;
            } else {
                // Crear una nueva reserva
                Turno::create([
                    'fecha' => $this->fecha,
                    'hora' => $this->hora,
                    'user_id' => Auth::id(),
                    'reservado' => true,
                ]);

                session()->flash('success', 'Turno reservado exitosamente.');
            }
        }
    }
}

