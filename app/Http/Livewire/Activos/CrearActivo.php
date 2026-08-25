<?php

namespace App\Http\Livewire\Activos;

use App\Models\Activo;
use App\Models\CategoriaActivo;
use App\Models\Ubicacion;
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
        Log::info('CrearActivo: componente iniciado', [
            'user_id' => Auth::id(),
            'url' => request()->fullUrl(),
        ]);
    }

    public function guardar(): void
    {
        Log::info('CrearActivo: inicio de guardar', [
            'user_id' => Auth::id(),
            'categoria_activo_id' => $this->categoria_activo_id,
            'ubicacion_id' => $this->ubicacion_id,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'observaciones' => $this->observaciones,
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

        Log::info('CrearActivo: validación correcta');

        $ubicacion = Ubicacion::with('dependencia')
            ->findOrFail($this->ubicacion_id);

        Log::info('CrearActivo: ubicación encontrada', [
            'ubicacion_id' => $ubicacion->id,
            'ubicacion_nombre' => $ubicacion->nombre,
            'dependencia_id' => $ubicacion->dependencia_id,
            'dependencia_nombre' => $ubicacion->dependencia?->nombre,
        ]);

        $activo = Activo::create([
            'dependencia_id' => $ubicacion->dependencia_id,
            'ubicacion_id' => $ubicacion->id,
            'categoria_activo_id' => $this->categoria_activo_id,
            'marca' => $this->marca ?: null,
            'modelo' => $this->modelo ?: null,
            'estado' => 'activo',
            'observaciones' => $this->observaciones ?: null,
        ]);

        Log::info('CrearActivo: activo creado correctamente', [
            'activo_id' => $activo->id,
            'dependencia_id' => $activo->dependencia_id,
            'ubicacion_id' => $activo->ubicacion_id,
            'categoria_activo_id' => $activo->categoria_activo_id,
            'marca' => $activo->marca,
            'modelo' => $activo->modelo,
            'estado' => $activo->estado,
        ]);

        session()->flash(
            'success',
            'El activo fue registrado correctamente y quedó disponible para validación técnica.'
        );

        Log::info('CrearActivo: redireccionando a mis-activos', [
            'activo_id' => $activo->id,
        ]);

        $this->redirectRoute('mis-activos');
    }

    public function render()
    {
        Log::info('CrearActivo: render ejecutado', [
            'user_id' => Auth::id(),
        ]);

        return view('livewire.activos.crear-activo', [
            'categorias' => CategoriaActivo::query()
                ->where('activa', true)
                ->orderBy('nombre')
                ->get(),

            'ubicaciones' => Ubicacion::query()
                ->where('activa', true)
                ->with('dependencia')
                ->orderBy('nombre')
                ->get(),
        ]);
    }
}
