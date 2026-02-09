<?php

namespace App\Http\Livewire\Comunicaciones\Totalequiposrg;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PdfEquiposRg extends Component
{
    public $dependenciaId = '';
    public $dependencias = [];
    public $registros = [];

    public function mount()
    {
        // OJO: ajustá el nombre real de la tabla de dependencias de Río Grande
        // Ej: dependencias_riogrande, dependencia_riogrande, dependenciariogrande, etc.
        $this->dependencias = DB::table('dependencia_riograndes')
            ->orderBy('nombre')
            ->get(['id', 'nombre']);
    }

    public function updatedDependenciaId()
    {
        $this->cargar();
    }

    public function cargar()
    {
        if (!$this->dependenciaId) {
            $this->registros = [];
            return;
        }

        $this->registros = DB::table('comunicacionesrgs as c')
            ->leftJoin('equipocomunicacions as e', 'e.id', '=', 'c.equipocomunicacion_id')
            ->leftJoin('dependencia_riograndes as d', 'd.id', '=', 'c.dependencia_riogrande_id')
            ->where('c.dependencia_riogrande_id', $this->dependenciaId)
            ->select(
                'd.nombre as dependencia',
                'e.nombre as tipo_equipo',
                'c.nro_serie',
                'c.condicion_equipo_comunicacion',
                'c.fecha_inventario'
            )
            ->orderBy('e.nombre')
            ->get()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.comunicaciones.totalequiposrg.pdf-equipos-rg');
    }
}
