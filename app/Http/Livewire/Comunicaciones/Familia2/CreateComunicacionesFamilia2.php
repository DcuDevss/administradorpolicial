<?php

namespace App\Http\Livewire\Comunicaciones\Familia2;

use App\Models\Comunicacionesfamilia2;
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

class CreateComunicacionesFamilia2 extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionesfamilia2_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesfamilia2;

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

            $this->comunicacionesfamilia2 = new Comunicacionesfamilia2();
            $this->comunicacionesfamilia2->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null : $this->lugar_colocacion;
            $this->comunicacionesfamilia2->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id  === '') ? null : $this->equipocomunicacion_id;
            $this->comunicacionesfamilia2->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null : $this->marcaequipo_id;
            $this->comunicacionesfamilia2->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null : $this->vhfantena_id;
            $this->comunicacionesfamilia2->modelo = ($this->modelo === null || $this->modelo === '') ? null : $this->modelo;
            $this->comunicacionesfamilia2->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ?  null : $this->nro_serie;
            $this->comunicacionesfamilia2->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null : $this->condicion_equipo_comunicacion;
            $this->comunicacionesfamilia2->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null : $this->fecha_service;
            $this->comunicacionesfamilia2->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null : $this->tipo_service;
            $this->comunicacionesfamilia2->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null : $this->fecha_inventario;
            $this->comunicacionesfamilia2->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null : $this->detalle_inventario;
            $this->comunicacionesfamilia2->save();



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
        $HtCount = Comunicacionesfamilia2::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionesfamilia2::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 1)
            ->count();
        $marcaotros = Comunicacionesfamilia2::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionesfamilia2::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesfamilia2::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesfamilia2::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesfamilia2::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionesfamilia2::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionesfamilia2::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionesfamilia2::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 1)
            ->count();
        $baseotros = Comunicacionesfamilia2::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionesfamilia2::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesfamilia2::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesfamilia2::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesfamilia2::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionesfamilia2::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionesfamilia2::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $Sindatos = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 2)
            ->count();
        $dipolo2 = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionesfamilia2::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionesfamilia2::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesfamilia2::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesfamilia2::where('equipocomunicacion_id', '7')->count();
        $OtrosCount = Comunicacionesfamilia2::where('equipocomunicacion_id', '1')->count();




        return view('livewire.comunicaciones.familia2.create-comunicaciones-familia2', compact(
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
