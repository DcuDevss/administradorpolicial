<?php

namespace App\Http\Livewire\Activos;

use App\Services\Activos\MisActivosService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CrearActivo extends Component
{
    public $categoria_activo_id = '';

    public $ubicacion_id = '';

    public $marca = '';

    public $modelo = '';

    public $observaciones = '';

    public string $modo = 'crear';

    public function mount(): void
    {
        $usuario = Auth::user();

        Log::info('CrearActivo: componente iniciado', [
            'user_id' => $usuario?->id,
            'dependencia_id' => $usuario?->dependencia_id,
            'area_id' => $usuario?->area_id,
            'url' => request()->fullUrl(),
        ]);
    }

    public function guardar(MisActivosService $service): void
    {
        $usuario = Auth::user();

        Log::info('CrearActivo: inicio de guardar', [
            'user_id' => $usuario?->id,
            'dependencia_id' => $usuario?->dependencia_id,
            'area_id' => $usuario?->area_id,
            'categoria_activo_id' => $this->categoria_activo_id,
            'ubicacion_id' => $this->ubicacion_id,
        ]);

        $this->validate([
            'categoria_activo_id' => [
                'required',
                'exists:categorias_activos,id',
            ],

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

        $activo = $service->crearActivo([
            'categoria_activo_id' => $this->categoria_activo_id,
            'ubicacion_id' => $this->ubicacion_id,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'observaciones' => $this->observaciones,
        ]);

        Log::info('CrearActivo: activo creado correctamente', [
            'activo_id' => $activo->id,
            'dependencia_id' => $activo->dependencia_id,
            'ubicacion_id' => $activo->ubicacion_id,
            'categoria_activo_id' => $activo->categoria_activo_id,
            'estado' => $activo->estado,
        ]);

        session()->flash(
            'success',
            'El activo fue registrado correctamente.'
        );

        $this->redirectRoute('mis-activos');
    }

    public function render(MisActivosService $service)
    {
        $usuario = Auth::user();

        $datos = $service->obtenerDatosFormulario(
            $usuario?->dependencia_id
        );

        return view(
            'livewire.activos.crear-activo',
            $datos
        );
    }
}
