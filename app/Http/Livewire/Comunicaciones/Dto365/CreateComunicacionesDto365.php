<?php

namespace App\Http\Livewire\Comunicaciones\Dto365;

use App\Models\Comunicacionesdto365;
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

class CreateComunicacionesDto365 extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionesdto365_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesdto365;

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

            $this->comunicacionesdto365 = new Comunicacionesdto365();
            $this->comunicacionesdto365->lugar_colocacion = ($this->lugar_colocacion === null || $this === '') ? null: $this->lugar_colocacion;
            $this->comunicacionesdto365->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null: $this->equipocomunicacion_id;
            $this->comunicacionesdto365->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null: $this->marcaequipo_id;
            $this->comunicacionesdto365->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null: $this->vhfantena_id;
            $this->comunicacionesdto365->modelo = ($this->modelo === null || $this->modelo === '') ? null: $this->modelo;
            $this->comunicacionesdto365->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null: $this->nro_serie;
            $this->comunicacionesdto365->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null: $this->condicion_equipo_comunicacion;
            $this->comunicacionesdto365->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null: $this->fecha_service;
            $this->comunicacionesdto365->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null: $this->tipo_service;
            $this->comunicacionesdto365->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null: $this->fecha_inventario;
            $this->comunicacionesdto365->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null: $this->detalle_inventario;
            $this->comunicacionesdto365->save();


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
        $HtCount = Comunicacionesdto365::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionesdto365::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 1)
        ->count();
        $marcaotros = Comunicacionesdto365::where('equipocomunicacion_id', 4)
        ->where('marcaequipo_id', 2)
        ->count();
        $marcaMotorola = Comunicacionesdto365::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesdto365::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesdto365::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesdto365::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionesdto365::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionesdto365::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionesdto365::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 1)
        ->count();
        $baseotros = Comunicacionesdto365::where('equipocomunicacion_id', 3)
        ->where('marcaequipo_id', 2)
        ->count();
        $baseMotorola = Comunicacionesdto365::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesdto365::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesdto365::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesdto365::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionesdto365::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionesdto365::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesdto365::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 1)
        ->count();
        $Sindatos = Comunicacionesdto365::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 2)
        ->count();
        $dipolo2 = Comunicacionesdto365::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesdto365::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesdto365::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesdto365::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesdto365::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionesdto365::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionesdto365::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesdto365::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesdto365::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionesdto365::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionesdto365::where('equipocomunicacion_id', '10')->count();
        $OtrosCount = Comunicacionesdto365::where('equipocomunicacion_id', '1')->count();


        return view('livewire.comunicaciones.dto365.create-comunicaciones-dto365',compact(
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
