<?php

namespace App\Http\Livewire\Comunicaciones\Tercera;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Marcaequipo;
use App\Models\Equipocomunicacion;
use App\Models\Comunicacionesprimera;
use App\Models\Comunicacionestercera;
use App\Models\Vhfantena;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CreateComunicacionesTercera extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionestercera_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionestercera;

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

            $this->comunicacionestercera = new Comunicacionestercera();
            $this->comunicacionestercera->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null : $this->lugar_colocacion;
            $this->comunicacionestercera->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null : $this->equipocomunicacion_id;
            $this->comunicacionestercera->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null : $this->marcaequipo_id;
            $this->comunicacionestercera->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null : $this->vhfantena_id;
            $this->comunicacionestercera->modelo = ($this->modelo === null || $this->modelo === '') ? null : $this->modelo;
            $this->comunicacionestercera->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null : $this->nro_serie;
            $this->comunicacionestercera->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null : $this->condicion_equipo_comunicacion;
            $this->comunicacionestercera->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null : $this->fecha_service;
            $this->comunicacionestercera->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null : $this->tipo_service;
            $this->comunicacionestercera->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null : $this->fecha_inventario;
            $this->comunicacionestercera->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null : $this->detalle_inventario;
            $this->comunicacionestercera->save();



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
        $HtCount = Comunicacionestercera::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionestercera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 1)
            ->count();
        $marcaotros = Comunicacionestercera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionestercera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionestercera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionestercera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionestercera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionestercera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionestercera::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionestercera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 1)
            ->count();
        $baseotros = Comunicacionestercera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionestercera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionestercera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionestercera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionestercera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionestercera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionestercera::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $Sindatos = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 2)
            ->count();
        $dipolo2 = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionestercera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionestercera::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionestercera::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionestercera::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionestercera::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionestercera::where('equipocomunicacion_id', '10')->count();
        $OtrosCount = Comunicacionestercera::where('equipocomunicacion_id', '1')->count();


        return view('livewire.comunicaciones.tercera.create-comunicaciones-tercera', compact(
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
