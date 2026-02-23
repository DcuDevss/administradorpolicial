<?php

namespace App\Http\Livewire\Comunicaciones\Cuarta;

use App\Models\Comunicacionescuarta;
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

class CreateComunicacionesCuarta extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionescuarta_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionescuarta;

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

            $this->comunicacionescuarta = new Comunicacionescuarta();
            $this->comunicacionescuarta->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null: $this->lugar_colocacion;
            $this->comunicacionescuarta->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null: $this->equipocomunicacion_id;
            $this->comunicacionescuarta->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null: $this->marcaequipo_id;
            $this->comunicacionescuarta->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null: $this->vhfantena_id;
            $this->comunicacionescuarta->modelo = ($this->modelo === null || $this->modelo === '') ? null: $this->modelo;
            $this->comunicacionescuarta->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null: $this->nro_serie;
            $this->comunicacionescuarta->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this-> condicion_equipo_comunicacion === '') ? null: $this->condicion_equipo_comunicacion;
            $this->comunicacionescuarta->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null: $this->fecha_service;
            $this->comunicacionescuarta->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null: $this->tipo_service;
            $this->comunicacionescuarta->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null: $this->fecha_inventario;
            $this->comunicacionescuarta->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null: $this->detalle_inventario;
            $this->comunicacionescuarta->save();



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
        $HtCount = Comunicacionescuarta::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionescuarta::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 1)
        ->count();
        $marcaotros = Comunicacionescuarta::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 2)
        ->count();
        $marcaMotorola = Comunicacionescuarta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionescuarta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaYaesu = Comunicacionescuarta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaHytera = Comunicacionescuarta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaAlcom = Comunicacionescuarta::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();


        $BaseCount = Comunicacionescuarta::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionescuarta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 1)
            ->count();
        $baseotros = Comunicacionescuarta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionescuarta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionescuarta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionescuarta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionescuarta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionescuarta::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionescuarta::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionescuarta::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 1)
        ->count();
        $Sindatos = Comunicacionescuarta::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 2)
        ->count();
        $dipolo2 = Comunicacionescuarta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionescuarta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionescuarta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionescuarta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionescuarta::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
         $ringo = Comunicacionescuarta::where('equipocomunicacion_id', 8)
                ->where('vhfantena_id', 8)
                ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionescuarta::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionescuarta::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionescuarta::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionescuarta::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionescuarta::where('equipocomunicacion_id', '10')->count();
        $OtrosCount = Comunicacionescuarta::where('equipocomunicacion_id', '1')->count();


        return view('livewire.comunicaciones.cuarta.create-comunicaciones-cuarta',compact(
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
