<?php

namespace App\Http\Livewire\Comunicaciones\General;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Tecnicocomunicacione;
use App\Models\DependenciaUshuaia;
use App\Models\DependenciaRiogrande;
use App\Models\DependenciaTolhuin;
use App\Models\OtrasInstitucione;
use App\Models\TrabajosGenerale;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Metadata\DependsOnClass;

class IndexTrabajoGeneral extends Component
{

    /*public $trabajos_generale_id, $dependencia_ushuaia_id, $dependencia_riogrande_id, $dependencia_tolhuin_id, $otras_institucione_id, $tecnicocomunicacione_id,
    $lugar_trabajo, $fecha_trabajo, $detalle_trabajo, $trabajogeneral;*/

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

        $trabajos = TrabajosGenerale::where(function ($query) {
            $query->where('lugar_trabajo', 'like', "%{$this->search}%")
                ->orWhere('fecha_trabajo', 'like', "%{$this->search}%")
                ->orWhere('detalle_trabajo', 'like', "%{$this->search}%");

        })
        ->orWhereHas('dependenciaushuaia', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('dependenciariogrande', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('dependenciatolhuin', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('otrainstitucione', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('tecnicocomunicacione', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orderBy($this->sort1, $this->direction1)
        ->paginate($this->perPage);




        return view('livewire.comunicaciones.general.index-trabajo-general',compact('trabajos'));
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

    public function updatingSearch(){

        $this->resetPage();

    }
}
