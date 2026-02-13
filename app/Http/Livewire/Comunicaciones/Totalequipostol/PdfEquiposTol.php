<?php

namespace App\Http\Livewire\Comunicaciones\Totalequipostol;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PdfEquiposTol extends Component
{
    public int $dependenciaId = 0; // 0 = todas
    public $dependencias = [];
    public $registros = [];

    public function mount()
    {
        $this->dependencias = DB::table('dependencia_tolhuins')
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        // cargar todas al iniciar
        $this->cargar();
    }

    public function updatedDependenciaId()
    {
        $this->cargar();
    }

    public function cargar()
    {
        $query = DB::table('comunicacionestolhuins as c')
            ->leftJoin('equipocomunicacions as e', 'e.id', '=', 'c.equipocomunicacion_id')
            ->leftJoin('dependencia_tolhuins as d', 'd.id', '=', 'c.dependencia_tolhuin_id')
            ->select(
                'd.nombre as dependencia',
                'e.nombre as tipo_equipo',
                'c.nro_serie',
                'c.condicion_equipo_comunicacion',
                'c.fecha_inventario'
            )
            ->orderBy('e.nombre');

        // 👉 SOLO filtra si eligieron una
        if ($this->dependenciaId) {
            $query->where('c.dependencia_tolhuin_id', $this->dependenciaId);
        }

        $this->registros = $query->get()->toArray();
    }

    public function render()
    {
        return view('livewire.comunicaciones.totalequipostol.pdf-equipos-tol');
    }
}
