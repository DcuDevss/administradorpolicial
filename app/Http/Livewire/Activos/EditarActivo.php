<?php

namespace App\Http\Livewire\Activos;

use App\Models\Activo;
use App\Models\Ubicacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditarActivo extends Component
{
    public Activo $activo;

    public $ubicacion_id = '';
    public $marca = '';
    public $modelo = '';
    public $observaciones = '';

    public string $modo = 'editar';

    public function mount(Activo $activo): void
    {
        $this->activo = $activo->load([
            'dependencia',
            'ubicacion',
            'categoria',
        ]);

        $this->ubicacion_id = $activo->ubicacion_id;
        $this->marca = $activo->marca ?? '';
        $this->modelo = $activo->modelo ?? '';
        $this->observaciones = $activo->observaciones ?? '';

        Log::info('EditarActivo: componente iniciado', [
            'user_id' => Auth::id(),
            'activo_id' => $activo->id,
        ]);
    }

    public function guardar(): void
    {
        Log::info('EditarActivo: inicio de actualización', [
            'user_id' => Auth::id(),
            'activo_id' => $this->activo->id,
            'ubicacion_id' => $this->ubicacion_id,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
        ]);

        $this->validate([
            'ubicacion_id' => [
                'required',
                'exists:ubicaciones,id',
            ],
            'marca' => [
                'nullable',
                'string',
                'max:100',
            ],
            'modelo' => [
                'nullable',
                'string',
                'max:100',
            ],
            'observaciones' => [
                'nullable',
                'string',
                'max:2000',
            ],
        ]);

        Log::info('EditarActivo: validación correcta');

        $ubicacion = Ubicacion::with('dependencia')
            ->findOrFail($this->ubicacion_id);

        $this->activo->update([
            'dependencia_id' => $ubicacion->dependencia_id,
            'ubicacion_id' => $ubicacion->id,
            'marca' => $this->marca ?: null,
            'modelo' => $this->modelo ?: null,
            'observaciones' => $this->observaciones ?: null,
        ]);

        Log::info('EditarActivo: activo actualizado correctamente', [
            'user_id' => Auth::id(),
            'activo_id' => $this->activo->id,
            'dependencia_id' => $ubicacion->dependencia_id,
            'ubicacion_id' => $ubicacion->id,
        ]);

        session()->flash(
            'success',
            'Los datos del activo fueron actualizados correctamente.'
        );

        $this->redirectRoute(
            'mis-activos.detalle',
            ['activo' => $this->activo]
        );
    }

    public function render()
    {
        return view('livewire.activos.editar-activo', [
            'ubicaciones' => Ubicacion::query()
                ->where('activa', true)
                ->with('dependencia')
                ->orderBy('nombre')
                ->get(),
        ]);
    }
}
