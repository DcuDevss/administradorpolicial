<?php

namespace App\Http\Livewire\Reparaciones;

use App\Models\SolicitudReparacion;
use App\Models\TurnoReparacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class DetalleSolicitud extends Component
{
    public SolicitudReparacion $solicitud;

    public bool $mostrarTurno = false;

    public string $fecha = '';

    public string $hora = '';

    public string $observaciones = '';

    public function mount(SolicitudReparacion $solicitud): void
    {
        $this->solicitud = $solicitud->load([
            'activo.dependencia',
            'activo.ubicacion',
            'activo.categoria',
            'usuario',
            'turno',
        ]);
    }

    /**
     * Abre el formulario para asignar un turno.
     */
    public function abrirTurno(): void
    {
        if ($this->solicitud->turno) {
            return;
        }

        if (in_array($this->solicitud->estado, [
            'cancelada',
            'cerrada',
            'rechazada',
        ], true)) {
            return;
        }

        $this->resetValidation();

        $this->reset([
            'fecha',
            'hora',
            'observaciones',
        ]);

        $this->mostrarTurno = true;
    }

    /**
     * Cierra el formulario de asignación.
     */
    public function cerrarTurno(): void
    {
        $this->mostrarTurno = false;

        $this->resetValidation();
    }

    /**
     * Asigna un turno a la solicitud.
     */
    public function asignarTurno(): void
    {
        $this->validate([
            'fecha' => [
                'required',
                'date',
                'after_or_equal:today',
            ],

            'hora' => [
                'required',
                'date_format:H:i',
            ],

            'observaciones' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ], [
            'fecha.required' => 'Debe indicar una fecha.',
            'fecha.date' => 'La fecha indicada no es válida.',
            'fecha.after_or_equal' => 'La fecha no puede ser anterior a hoy.',
            'hora.required' => 'Debe indicar una hora.',
            'hora.date_format' => 'La hora no tiene un formato válido.',
            'observaciones.max' => 'Las observaciones no pueden superar los 1000 caracteres.',
        ]);

        /*
         * Evitamos que una solicitud tenga más de un turno.
         */
        $this->solicitud->refresh();

        if ($this->solicitud->turno) {
            $this->addError(
                'general',
                'Esta solicitud ya tiene un turno asignado.'
            );

            $this->mostrarTurno = false;

            return;
        }

        /*
         * Verificamos que la solicitud pueda recibir un turno.
         */
        if (in_array($this->solicitud->estado, [
            'cancelada',
            'cerrada',
            'rechazada',
        ], true)) {
            $this->addError(
                'general',
                'La solicitud no se encuentra en un estado válido para asignar un turno.'
            );

            return;
        }

        /*
         * Evitamos reservar dos turnos exactamente en la misma
         * fecha y hora dentro del nuevo sistema de Reparaciones.
         */
        $turnoOcupado = TurnoReparacion::query()
            ->where('fecha', $this->fecha)
            ->where('hora', $this->hora)
            ->whereIn('estado', [
                'confirmado',
            ])
            ->exists();

        if ($turnoOcupado) {
            $this->addError(
                'hora',
                'Ya existe un turno asignado para esa fecha y hora.'
            );

            return;
        }

        $turno = TurnoReparacion::create([
            'solicitud_id' => $this->solicitud->id,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'estado' => 'confirmado',
            'observaciones' => $this->observaciones ?: null,
        ]);

        /*
         * Actualizamos el estado de la solicitud.
         *
         * En el documento técnico el estado definido para este punto
         * es "turnada".
         */
        $this->solicitud->update([
            'estado' => 'turnada',
        ]);

        Log::info('DetalleSolicitud: turno asignado correctamente', [
            'turno_id' => $turno->id,
            'solicitud_id' => $this->solicitud->id,
            'activo_id' => $this->solicitud->activo_id,
            'usuario_id' => Auth::id(),
            'fecha' => $turno->fecha,
            'hora' => $turno->hora,
        ]);

        $this->mostrarTurno = false;

        $this->reset([
            'fecha',
            'hora',
            'observaciones',
        ]);

        /*
         * Recargamos la solicitud y sus relaciones.
         */
        $this->solicitud->refresh()->load([
            'activo.dependencia',
            'activo.ubicacion',
            'activo.categoria',
            'usuario',
            'turno',
        ]);

        session()->flash(
            'success',
            'El turno fue asignado correctamente.'
        );
    }

    public function render()
    {
        return view('livewire.reparaciones.detalle-solicitud');
    }
}
