<?php

namespace App\Http\Livewire\Comunicaciones\Primera;

use App\Models\Comunicacionesprimera;
use Livewire\Component;
use App\Models\Identificado;
use App\Models\Domicilio;
use Livewire\WithPagination;
use App\Models\Contacto;
use App\Models\Persona;
use App\Models\FotoImage;
use App\Models\Foto;
use App\Models\ArchivoImage;
use App\Models\Archivo;
use App\Models\Tipodoc;
use Carbon\Carbon;
use App\Models\Equipocomunicacion;


class IndexComunicacionesPrimera extends Component
{
    use WithPagination;
    public $buscar='';
    public $perPage1 = '4';
    public $sort='id';
    public $direction='desc';
    public $arma=null;

    public $search='';
    public $perPage = '4';
    public $sort1='id';
    public $direction1='desc';
    protected $queryString = [
        'perPage'=>['except'=>'4'],
        'perPage1'=>['except'=>'4'],
        'direction'=>['except'=>'desc'],
        'direction1'=>['except'=>'desc'],
        'search'=>['except'=>''],
        'buscar'=>['except'=>''],
        'sort'=>['except'=>'id'],
        'sort1'=>['except'=>'id'],
    ];
    protected $listeners = ['render'=> 'render'];


    public function render()
    {

        /*$comunicaciones=Comunicacionesprimera::where('id','like',"%{$this->search}%")
        ->orWhere('nro_serie','like',"%{$this->search}%")
        //->orWhere('$marcaequipo_id','like',"%{$this->search}%")
        //->orWhere('$equipocomunicacion_id','like',"%{$this->search}%")condicion_equipo_comunicacion
        ->orWhere('fecha_service','like',"%{$this->search}%")
        ->orWhere('modelo','like',"%{$this->search}%")
        ->orWhere('fecha_inventario','like',"%{$this->search}%")
        ->orWhere('tipo_service','like',"%{$this->search}%")
        ->orWhere('lugar_colocacion','like',"%{$this->search}%")
        ->orWhere('detalle_inventario','like',"%{$this->search}%")
        ->orWhere('condicion_equipo_comunicacion','like',"%{$this->search}%")
        ->orderBy($this->sort1, $this->direction1)
        ->paginate($this->perPage);*/
        //$equiposConHtCount = Equipocomunicacion::where('nombre', 'Ht')->count();

       /* $comunicaciones = Comunicacionesprimera::where('nro_serie', 'like', "%{$this->search}%")
        ->orWhere('fecha_service', 'like', "%{$this->search}%")
        ->orWhere('modelo', 'like', "%{$this->search}%")
        ->orWhere('fecha_inventario', 'like', "%{$this->search}%")
        ->orWhere('tipo_service', 'like', "%{$this->search}%")
        ->orWhere('lugar_colocacion', 'like', "%{$this->search}%")
        ->orWhere('detalle_inventario', 'like', "%{$this->search}%")
        ->orWhere('condicion_equipo_comunicacion', 'like', "%{$this->search}%")
        ->orWhereHas('marcaequipo', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('equipocomunicacion', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orderBy($this->sort1, $this->direction1)
        ->paginate($this->perPage);*/
        $comunicaciones = Comunicacionesprimera::where(function ($query) {
            $query->where('nro_serie', 'like', "%{$this->search}%")
                ->orWhere('fecha_service', 'like', "%{$this->search}%")
                ->orWhere('modelo', 'like', "%{$this->search}%")
                ->orWhere('fecha_inventario', 'like', "%{$this->search}%")
                ->orWhere('tipo_service', 'like', "%{$this->search}%")
                ->orWhere('lugar_colocacion', 'like', "%{$this->search}%")
                ->orWhere('detalle_inventario', 'like', "%{$this->search}%")
                ->orWhere('condicion_equipo_comunicacion', 'like', "%{$this->search}%");
        })
        ->orWhereHas('equipocomunicacion', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('marcaequipo', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('vhfantena', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orderBy($this->sort1, $this->direction1)
        ->paginate($this->perPage);



        //$comunicacionesPri = Comunicacionesprimera::all();
        return view('livewire.comunicaciones.primera.index-comunicaciones-primera',compact('comunicaciones'));
    }

    public function order1($sort1)
    {
        if($this->sort1==$sort1){
            if ($this->direction1=='desc') {
                $this->direction1 ='asc';
            } else {
                $this->direction1='desc';
            }
        } else{
            $this->sort1=$sort1;
            $this->direction1 ='asc';
        }
    }

    public function clear()
    {
        $this->page = 1;
       // $this->orde = null;
       // $this->camp = null;
       // $this->icon = '-circle';
        $this->search = '';
        $this->perPage = 4;
        $this->perPage1 = 4;

        $this->buscar='';
        $this->sort='id';
        $this->direction='desc';
        $this->sort1='id';
        $this->direction1='desc';
        /*$this->order='desc';
        $this->order1='desc';*/
    }

    public function updatingSearch()
    {

        $this->resetPage();

    }


}
