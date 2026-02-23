<?php

namespace App\Http\Livewire\Comunicaciones\custodia;

use App\Models\Comunicacionescustodia;
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

class CreateComunicacionesCustodia extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionescustodia_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionescustodia;

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

            $this->comunicacionescustodia = new Comunicacionescustodia();
            $this->comunicacionescustodia->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null: $this->lugar_colocacion;
            $this->comunicacionescustodia->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null: $this->equipocomunicacion_id;
            $this->comunicacionescustodia->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id=== '') ? null: $this->marcaequipo_id;
            $this->comunicacionescustodia->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null: $this->vhfantena_id;
            $this->comunicacionescustodia->modelo = ($this->modelo === null || $this->modelo === '') ? null: $this->modelo;
            $this->comunicacionescustodia->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null: $this->nro_serie;
            $this->comunicacionescustodia->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null: $this->condicion_equipo_comunicacion;
            $this->comunicacionescustodia->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null: $this->fecha_service;
            $this->comunicacionescustodia->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null: $this->tipo_service;
            $this->comunicacionescustodia->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null: $this->fecha_inventario;
            $this->comunicacionescustodia->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null: $this->detalle_inventario;
            $this->comunicacionescustodia->save();



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
        $HtCount = Comunicacionescustodia::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionescustodia::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 1)
        ->count();
        $marcaotros = Comunicacionescustodia::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 2)
        ->count();
        $marcaMotorola = Comunicacionescustodia::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionescustodia::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionescustodia::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionescustodia::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionescustodia::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionescustodia::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionescustodia::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 1)
        ->count();
        $baseotros = Comunicacionescustodia::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 2)
        ->count();
        $baseMotorola = Comunicacionescustodia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionescustodia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionescustodia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionescustodia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionescustodia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionescustodia::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionescustodia::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 1)
        ->count();
        $Sindatos = Comunicacionescustodia::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 2)
        ->count();
        $dipolo2 = Comunicacionescustodia::where('equipocomunicacion_id', 6)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionescustodia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionescustodia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionescustodia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionescustodia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionescustodia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionescustodia::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionescustodia::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionescustodia::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionescustodia::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionescustodia::where('equipocomunicacion_id', '10')->count();
        $OtrosCount = Comunicacionescustodia::where('equipocomunicacion_id', '1')->count();



        return view('livewire.comunicaciones.custodia.create-comunicaciones-custodia
        ',compact(
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
            'PttCount',
            'ComandoBalizaCount',
        ));
    }
}
