<?php

namespace App\Http\Livewire\Comunicaciones\Dcu;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PdfDcu extends Component
{
    public $registros = [];
    public $categoriaTabla = 0;
    public $categorias = [];

    public function mount()
    {
    $this->categorias = DB::table('categoriacomunicacions')
        ->orderBy('name')
        ->get()
        ->map(function ($categoria) {
            return [
                'id' => $categoria->id,
                'name' => $categoria->name,
            ];
        })
        ->toArray();
        
        $this->cargar();
    }

    public function cargar()
    {
        $query = DB::table('comunicacionesdcus')
            ->leftJoin(
                'categoriacomunicacions',
                'categoriacomunicacions.id',
                '=',
                'comunicacionesdcus.categoriacomunicacion_id'
            )
            ->select(
                'categoriacomunicacions.name as categoria',
                'comunicacionesdcus.nombre',
                'comunicacionesdcus.marca',
                'comunicacionesdcus.modelo',
                'comunicacionesdcus.numero_serie',
                'comunicacionesdcus.fecha_service',
                'comunicacionesdcus.tipo_service',
                'comunicacionesdcus.estado',
                'comunicacionesdcus.fecha_inventario',
                'comunicacionesdcus.detalle_inventario'
            );

        if ($this->categoriaTabla != 0) {
            $query->where(
                'comunicacionesdcus.categoriacomunicacion_id',
                $this->categoriaTabla
            );
        }

        $this->registros = $query
            ->orderBy('categoriacomunicacions.name')
            ->get()
            ->toArray();
    }

    public function updatedCategoriaTabla()
    {
        $this->cargar();
    }

    public function render()
    {
        return view('livewire.comunicaciones.dcu.pdf-dcu');
    }
}
