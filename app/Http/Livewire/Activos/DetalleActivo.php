<?php

namespace App\Http\Livewire\Activos;

use App\Events\SolicitudReparacionCreada;
use App\Models\Activo;
use App\Models\SolicitudReparacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class DetalleActivo extends Component
{
    use WithPagination;

    public Activo $activo;

    public bool $mostrarSolicitud = false;

    public string $tituloSolicitud = '';

    public string $descripcionSolicitud = '';

    public string $prioridadSolicitud = 'media';

    public function mount(Activo $activo): void
    {
        $this->activo = $activo->refresh()->load([
            'dependencia',
            'ubicacion',
            'categoria',
            'especificaciones',
            'solicitudesReparacion',
        ]);
    }

    /**
     * Indica si el activo posee una solicitud pendiente.
     */
    public function tieneSolicitudPendiente(): bool
    {
        return $this->activo
            ->solicitudesReparacion()
            ->where('estado', 'pendiente')
            ->exists();
    }

    /**
     * Abre el formulario de solicitud.
     */
    public function abrirSolicitud(): void
    {
        if ($this->tieneSolicitudPendiente()) {
            return;
        }

        $this->resetValidation();

        $this->reset([
            'tituloSolicitud',
            'descripcionSolicitud',
        ]);

        $this->prioridadSolicitud = 'media';

        $this->mostrarSolicitud = true;
    }

    /**
     * Cierra el formulario de solicitud.
     */
    public function cerrarSolicitud(): void
    {
        $this->mostrarSolicitud = false;

        $this->resetValidation();
    }


    /**
     * Registra una nueva solicitud de reparación.
     */
    public function guardarSolicitud(): void
    {
        $this->validate([
            'tituloSolicitud' => [
                'required',
                'string',
                'max:150',
            ],

            'descripcionSolicitud' => [
                'required',
                'string',
                'max:5000',
            ],

            'prioridadSolicitud' => [
                'required',
                'in:baja,media,alta,urgente',
            ],
        ]);

        if ($this->tieneSolicitudPendiente()) {
            $this->addError(
                'general',
                'Este activo ya tiene una solicitud de reparación pendiente.'
            );

            return;
        }

        $solicitud = SolicitudReparacion::create([
            'activo_id' => $this->activo->id,
            'usuario_id' => Auth::id(),
            'estado' => 'pendiente',
            'prioridad' => $this->prioridadSolicitud,
            'titulo' => $this->tituloSolicitud,
            'descripcion' => $this->descripcionSolicitud,
        ]);

        Log::info('DetalleActivo: solicitud creada correctamente', [
            'solicitud_id' => $solicitud->id,
            'activo_id' => $this->activo->id,
            'usuario_id' => Auth::id(),
            'prioridad' => $solicitud->prioridad,
        ]);

        event(new SolicitudReparacionCreada($solicitud));
        
        // Limpiar formulario
        $this->reset([
            'tituloSolicitud',
            'descripcionSolicitud',
        ]);

        $this->prioridadSolicitud = 'media';

        // Cerrar modal
        $this->mostrarSolicitud = false;

        // Actualizar el activo y su historial
        $this->activo->refresh()->load([
            'dependencia',
            'ubicacion',
            'categoria',
            'especificaciones',
            'solicitudesReparacion',
        ]);

        session()->flash(
            'success',
            'La solicitud de revisión fue registrada correctamente.'
        );
    }

    public function cancelarSolicitud(int $solicitudId): void
    {
        $solicitud = $this->activo
            ->solicitudesReparacion()
            ->where('id', $solicitudId)
            ->where('usuario_id', Auth::id())
            ->where('estado', 'pendiente')
            ->firstOrFail();

        Log::info('DetalleActivo: cancelación de solicitud', [
            'user_id' => Auth::id(),
            'activo_id' => $this->activo->id,
            'solicitud_id' => $solicitud->id,
        ]);

        $solicitud->update([
            'estado' => 'cancelada',
        ]);

        /*
         * Actualizamos el historial.
         */
        $this->activo->load('solicitudesReparacion');

        session()->flash(
            'success',
            'La solicitud de revisión fue cancelada correctamente.'
        );
    }

    public function render()
    {
        $solicitudes = $this->activo
            ->solicitudesReparacion()
            ->latest()
            ->paginate(5);

        return view('livewire.activos.detalle-activo', [
            'solicitudes' => $solicitudes,
        ]);
    }
}
