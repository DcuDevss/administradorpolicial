<?php

namespace App\Http\Livewire\Comunicaciones\Quinta;

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

class CreateComunicacionesQuinta extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionesquinta_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesquinta;

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

            $this->comunicacionesquinta = new Comunicacionesquinta();
            $this->comunicacionesquinta->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null: $this->lugar_colocacion;
            $this->comunicacionesquinta->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null: $this->equipocomunicacion_id;
            $this->comunicacionesquinta->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null: $this->marcaequipo_id;
            $this->comunicacionesquinta->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null: $this->vhfantena_id;
            $this->comunicacionesquinta->modelo = ($this->modelo === null || $this->modelo === '') ? null: $this->modelo;
            $this->comunicacionesquinta->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null: $this->nro_serie;
            $this->comunicacionesquinta->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null: $this->condicion_equipo_comunicacion;
            $this->comunicacionesquinta->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null: $this->fecha_service;
            $this->comunicacionesquinta->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null: $this->fecha_service;
            $this->comunicacionesquinta->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null: $this->fecha_inventario;
            $this->comunicacionesquinta->detalle_inventario = ($this->detalle_inventario === null|| $this->detalle_inventario === '') ? null: $this->detalle_inventario;
            $this->comunicacionesquinta->save();



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
        $HtCount = Comunicacionesquinta::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionesquinta::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 1)
        ->count();
        $marcaotros = Comunicacionesquinta::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 2)
        ->count();
        $marcaMotorola = Comunicacionesquinta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesquinta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesquinta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesquinta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionesquinta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionesquinta::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionesquinta::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 1)
        ->count();
        $baseotros = Comunicacionesquinta::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 2)
        ->count();
        $baseMotorola = Comunicacionesquinta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesquinta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesquinta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesquinta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionesquinta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionesquinta::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesquinta::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 1)
        ->count();
        $Sindatos = Comunicacionesquinta::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 2)
        ->count();
        $dipolo2 = Comunicacionesquinta::where('equipocomunicacion_id', 6)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesquinta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesquinta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesquinta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesquinta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionesquinta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();




        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionesquinta::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesquinta::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesquinta::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionesquinta::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionesquinta::where('equipocomunicacion_id', '10')->count();
        $OtrosCount = Comunicacionesquinta::where('equipocomunicacion_id', '1')->count();

        return view('livewire.comunicaciones.quinta.create-comunicaciones-quinta',compact(
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
