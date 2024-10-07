<?php

namespace App\Http\Livewire\Comunicaciones\Familia1;

use App\Models\Comunicacionesfamilia1;
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

class CreateComunicacionesFamilia1 extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionesfamilia1_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesfamilia1;

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

            $this->comunicacionesfamilia1 = new Comunicacionesfamilia1();
            $this->comunicacionesfamilia1->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion ==='') ? null: $this->lugar_colocacion;
            $this->comunicacionesfamilia1->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null: $this->equipocomunicacion_id;
            $this->comunicacionesfamilia1->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null: $this->marcaequipo_id;
            $this->comunicacionesfamilia1->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null: $this->vhfantena_id;
            $this->comunicacionesfamilia1->modelo = ($this->modelo === null || $this->modelo === '') ? null: $this->modelo;
            $this->comunicacionesfamilia1->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null: $this->nro_serie;
            $this->comunicacionesfamilia1->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null: $this->condicion_equipo_comunicacion;
            $this->comunicacionesfamilia1->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null: $this->fecha_service;
            $this->comunicacionesfamilia1->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null: $this->tipo_service;
            $this->comunicacionesfamilia1->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null: $this->fecha_inventario;
            $this->comunicacionesfamilia1->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null: $this->detalle_inventario;
            $this->comunicacionesfamilia1->save();



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
        $HtCount = Comunicacionesfamilia1::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionesfamilia1::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 1)
        ->count();
        $marcaotros = Comunicacionesfamilia1::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 2)
        ->count();
        $marcaMotorola = Comunicacionesfamilia1::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesfamilia1::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesfamilia1::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesfamilia1::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionesfamilia1::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionesfamilia1::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionesfamilia1::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 1)
        ->count();
        $baseotros = Comunicacionesfamilia1::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 2)
        ->count();
        $baseMotorola = Comunicacionesfamilia1::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesfamilia1::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesfamilia1::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesfamilia1::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionesfamilia1::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();


        $AntenaCount = Comunicacionesfamilia1::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 1)
        ->count();
        $Sindatos = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 2)
        ->count();
        $dipolo2 = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionesfamilia1::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionesfamilia1::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesfamilia1::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesfamilia1::where('equipocomunicacion_id', '7')->count();
        $OtrosCount = Comunicacionesfamilia1::where('equipocomunicacion_id', '1')->count();


        return view('livewire.comunicaciones.familia1.create-comunicaciones-familia1',compact(
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
