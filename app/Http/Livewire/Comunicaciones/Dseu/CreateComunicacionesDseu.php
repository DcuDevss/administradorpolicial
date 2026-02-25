<?php

namespace App\Http\Livewire\Comunicaciones\dseu;

use App\Models\Comunicacionesdseu;
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

class CreateComunicacionesDseu extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacionesdseu_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesdseu;

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

            $this->comunicacionesdseu = new Comunicacionesdseu();
            $this->comunicacionesdseu->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null : $this->lugar_colocacion;
            $this->comunicacionesdseu->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null : $this->equipocomunicacion_id;
            $this->comunicacionesdseu->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null : $this->marcaequipo_id;
            $this->comunicacionesdseu->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null : $this->vhfantena_id;
            $this->comunicacionesdseu->modelo = ($this->modelo === null || $this->modelo === '') ? null : $this->modelo;
            $this->comunicacionesdseu->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null : $this->nro_serie;
            $this->comunicacionesdseu->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null | $this->condicion_equipo_comunicacion === '') ? null : $this->condicion_equipo_comunicacion;
            $this->comunicacionesdseu->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null : $this->fecha_service;
            $this->comunicacionesdseu->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null : $this->tipo_service;
            $this->comunicacionesdseu->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null : $this->fecha_inventario;
            $this->comunicacionesdseu->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null : $this->detalle_inventario;
            $this->comunicacionesdseu->save();



             $this->dispatchBrowserEvent('notificacion', [
                'type' => 'success',
                'message' => 'Datos guardados correctamente.'
            ]);



            DB::commit();
            //$this->clearForm();

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }



    public function render()
    {
        $HtCount = Comunicacionesdseu::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionesdseu::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 1)
            ->count();
        $marcaotros = Comunicacionesdseu::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionesdseu::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesdseu::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesdseu::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesdseu::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionesdseu::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionesdseu::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionesdseu::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 1)
            ->count();
        $baseotros = Comunicacionesdseu::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionesdseu::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesdseu::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesdseu::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesdseu::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionesdseu::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionesdseu::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $Sindatos = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 2)
            ->count();
        $dipolo2 = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionesdseu::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionesdseu::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesdseu::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesdseu::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionesdseu::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionesdseu::where('equipocomunicacion_id', '10')->count();
        $OtrosCount = Comunicacionesdseu::where('equipocomunicacion_id', '1')->count();


        return view('livewire.comunicaciones.dseu.create-comunicaciones-Dseu
        ', compact(
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
