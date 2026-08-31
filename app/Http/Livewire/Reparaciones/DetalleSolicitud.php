<?php

namespace App\Http\Livewire\Reparaciones;

use App\Models\SolicitudReparacion;
use App\Models\TurnoReparacion;
use App\Notifications\TurnoReparacionAsignado;
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

    /**
     * Fecha actualmente seleccionada en la agenda.
     */
    public string $fechaAgenda = '';

    public function mount(SolicitudReparacion $solicitud): void
    {
        $this->solicitud = $solicitud->load([
            'activo.dependencia',
            'activo.ubicacion',
            'activo.categoria',
            'usuario',
            'turno',
        ]);

        $this->fechaAgenda = now()->format('Y-m-d');
    }

    /**
     * Abre la agenda para asignar un turno.
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

        $this->fechaAgenda = now()->format('Y-m-d');

        $this->fecha = $this->fechaAgenda;

        $this->mostrarTurno = true;
    }

    /**
     * Cierra la agenda.
     */
    public function cerrarTurno(): void
    {
        $this->mostrarTurno = false;

        $this->resetValidation();
    }

    /**
     * Cambia el día mostrado en la agenda.
     */
    public function seleccionarFecha(string $fecha): void
    {
        $this->fechaAgenda = $fecha;

        $this->fecha = $fecha;
    }

    /**
     * Asigna el turno.
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

        $this->solicitud->refresh();

        if ($this->solicitud->turno) {
            $this->addError(
                'general',
                'Esta solicitud ya tiene un turno asignado.'
            );

            $this->mostrarTurno = false;

            return;
        }

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
         * IMPORTANTE:
         *
         * No se verifica si existe otro turno a la misma fecha/hora.
         *
         * El Área de Reparaciones puede tener múltiples equipos
         * simultáneamente. El turno organiza la recepción y no
         * representa un cupo de reparación.
         */

        $turno = TurnoReparacion::create([
            'solicitud_id' => $this->solicitud->id,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'estado' => 'confirmado',
            'observaciones' => $this->observaciones ?: null,
        ]);

        $this->solicitud->update([
            'estado' => 'turnada',
        ]);


        /*
        * Notificamos al usuario que generó la solicitud
        * informándole que el turno fue asignado.
        */
        $this->solicitud->usuario->notify(
            new TurnoReparacionAsignado($turno)
        );

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

    /**
     * Turnos correspondientes al día seleccionado.
     */
    public function getTurnosDelDiaProperty()
    {
        return TurnoReparacion::query()
            ->with([
                'solicitud.activo.dependencia',
                'solicitud.usuario',
            ])
            ->whereDate('fecha', $this->fechaAgenda)
            ->orderBy('hora')
            ->get();
    }

    /**
     * Cantidad de solicitudes según estado.
     */
    public function getResumenOcupacionProperty(): array
    {
        return [
            'turnadas' => SolicitudReparacion::where('estado', 'turnada')->count(),

            'recepcionadas' => SolicitudReparacion::where(
                'estado',
                'recepcionada'
            )->count(),

            'diagnostico' => SolicitudReparacion::where(
                'estado',
                'en_diagnostico'
            )->count(),

            'reparacion' => SolicitudReparacion::where(
                'estado',
                'en_reparacion'
            )->count(),

            'esperando_repuesto' => SolicitudReparacion::where(
                'estado',
                'esperando_repuesto'
            )->count(),

            'listas_retirar' => SolicitudReparacion::where(
                'estado',
                'lista_para_retirar'
            )->count(),
        ];
    }

    public function render()
    {
        return view('livewire.reparaciones.detalle-solicitud', [
            'turnosDelDia' => $this->turnosDelDia,
            'resumenOcupacion' => $this->resumenOcupacion,
        ]);
    }
}
