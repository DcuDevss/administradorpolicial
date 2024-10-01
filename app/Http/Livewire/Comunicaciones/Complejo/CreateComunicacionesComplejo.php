<?php

namespace App\Http\Livewire\Comunicaciones\Complejo;

use App\Models\Comunicacionescomplejo;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Marcaequipo;
use App\Models\Equipocomunicacion;
use App\Models\Comunicacionesprimera;
use App\Models\Comunicacionesquinta;
use App\Models\Comunicacionestercera;
use App\Models\Vhfantena;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CreateComunicacionesComplejo extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionescomplejo_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionescomplejo;

    protected $rules = [
        'equipocomunicacion_id' => 'nullable',
        'marcaequipo_id' => 'nullable',
        'lugar_colocacion' => 'nullable',
        'modelo' => 'nullable',
        'nro_serie' => 'nullable',
        'condicion_equipo_comunicacion' => 'nullable',
        //'condicion_fuente' => 'nullable',
        //'condicion_baliza' => 'nullable',
        'fecha_service' => 'nullable',
        'tipo_service' => 'nullable',
        'fecha_inventario' => 'nullable',
        'detalle_inventario' => 'nullable',

    ];
    public function showModal()
    {
        $this->showingModal = true;
    }

    public function closeModal()
    {
        $this->showingModal = false;
    }


    public function mount()
    {
        $this->equipocomunicacion_id = "";
        $this->marcaequipo_id = "";
        $this->vhfantena_id = "";


        $this->MarcaEquipo = Marcaequipo::all();
        $this->VhfAntena = Vhfantena::all();
        $this->EquipoComunicacion = Equipocomunicacion::all(); // Cargar los datos

    }
    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        try {

            $this->comunicacionescomplejo = new Comunicacionescomplejo();
            $this->comunicacionescomplejo->lugar_colocacion = $this->lugar_colocacion;
            $this->comunicacionescomplejo->equipocomunicacion_id = $this->equipocomunicacion_id;
            $this->comunicacionescomplejo->marcaequipo_id = $this->marcaequipo_id;
            $this->comunicacionescomplejo->vhfantena_id = $this->vhfantena_id;
            $this->comunicacionescomplejo->modelo = $this->modelo;
            $this->comunicacionescomplejo->nro_serie = $this->nro_serie;
            $this->comunicacionescomplejo->condicion_equipo_comunicacion = $this->condicion_equipo_comunicacion;
            //$this->comunicacionesprimera->condicion_fuente = $this->condicion_fuente;
            //$this->comunicacionesprimera->condicion_baliza = $this->condicion_baliza;
            $this->comunicacionescomplejo->fecha_service = $this->fecha_service;
            $this->comunicacionescomplejo->tipo_service = $this->tipo_service;
            $this->comunicacionescomplejo->fecha_inventario = $this->fecha_inventario;
            $this->comunicacionescomplejo->detalle_inventario = $this->detalle_inventario;
            $this->comunicacionescomplejo->save();



            session()->flash('message', 'Datos guardados correctamente.');


            DB::commit();
            //$this->clearForm();

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }


    public function render()
    {
        $HtCount = Comunicacionescomplejo::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionescomplejo::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 1)
            ->count();
        $marcaotros = Comunicacionescomplejo::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionescomplejo::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionescomplejo::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionescomplejo::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionescomplejo::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionescomplejo::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionescomplejo::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionescomplejo::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 1)
            ->count();
        $baseotros = Comunicacionescomplejo::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionescomplejo::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionescomplejo::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionescomplejo::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionescomplejo::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionescomplejo::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 7)
        ->count();

        $AntenaCount = Comunicacionescomplejo::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $Sindatos = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 2)
            ->count();
        $dipolo2 = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $yagi = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $latigo = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $ringo = Comunicacionescomplejo::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();




        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionescomplejo::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionescomplejo::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionescomplejo::where('equipocomunicacion_id', '7')->count();
        $OtrosCount = Comunicacionescomplejo::where('equipocomunicacion_id','1')->count();



        return view('livewire.comunicaciones.complejo.create-comunicaciones-complejo',compact(
            'HtCount',
            'BaseCount',
            'RepetidoraCount',
            'FuenteCount',
            'BalizaCount',
            'OtrosCount',
            'marcaSindatos',
            'marcaotros',
            'marcaMotorola',
            'marcaKenwood',
            'marcaYaesu',
            'marcaHytera',
            'marcaAlcom',
            'baseSindatos',
            'baseotros',
            'baseMotorola',
            'baseKenwood',
            'baseYaesu',
            'baseHytera',
            'baseAlcom',
            'AntenaCount',
            'Otros',
            'Sindatos',
            'dipolo2',
            'dipolo4',
            'dipolo8',
            'yagi',
            'latigo',
            'ringo',
        ));
    }
}
