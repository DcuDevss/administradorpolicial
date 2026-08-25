<?php

namespace App\Http\Livewire\Activos;

use App\Models\Activo;
use App\Models\SolicitudReparacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SolicitarReparacion extends Component
{
    public Activo $activo;

    public string $titulo = '';

    public string $descripcion = '';

    public string $prioridad = 'media';

    public function mount(Activo $activo): void
    {
        $this->activo = $activo->load([
            'dependencia',
            'ubicacion',
            'categoria',
        ]);

        Log::info('SolicitarReparacion: componente iniciado', [
            'user_id' => Auth::id(),
            'activo_id' => $activo->id,
        ]);
    }

    public function guardar(): void
    {
        Log::info('SolicitarReparacion: inicio de creación', [
            'user_id' => Auth::id(),
            'activo_id' => $this->activo->id,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'prioridad' => $this->prioridad,
        ]);

        $this->validate([
            'titulo' => [
                'required',
                'string',
                'max:150',
            ],

            'descripcion' => [
                'required',
                'string',
                'max:5000',
            ],

            'prioridad' => [
                'required',
                'in:baja,media,alta,urgente',
            ],
        ]);

        $solicitudPendiente = SolicitudReparacion::query()
            ->where('activo_id', $this->activo->id)
            ->where('estado', 'pendiente')
            ->exists();

        if ($solicitudPendiente) {
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
            'prioridad' => $this->prioridad,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
        ]);

        Log::info('SolicitarReparacion: solicitud creada correctamente', [
            'solicitud_id' => $solicitud->id,
            'activo_id' => $solicitud->activo_id,
            'usuario_id' => $solicitud->usuario_id,
            'estado' => $solicitud->estado,
            'prioridad' => $solicitud->prioridad,
        ]);

        $this->reset([
            'titulo',
            'descripcion',
        ]);


        $this->dispatch(
            'solicitud-reparacion-creada',
            solicitudId: $solicitud->id
        );
    }

    public function render()
    {
        return view('livewire.activos.solicitar-reparacion');
    }
}
