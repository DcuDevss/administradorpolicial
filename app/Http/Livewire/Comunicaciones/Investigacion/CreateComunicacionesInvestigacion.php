<?php

namespace App\Http\Livewire\Comunicaciones\Investigacion;

use App\Models\Comunicacionesinvestigacion;
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

class CreateComunicacionesInvestigacion extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;


    public $codigo_qr, $comunicacioneinvestigacion_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesinvestigacion;

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

            $this->comunicacionesinvestigacion = new Comunicacionesinvestigacion();
            $this->comunicacionesinvestigacion->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null : $this->lugar_colocacion;
            $this->comunicacionesinvestigacion->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null : $this->equipocomunicacion_id;
            $this->comunicacionesinvestigacion->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null : $this->marcaequipo_id;
            $this->comunicacionesinvestigacion->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null : $this->vhfantena_id;
            $this->comunicacionesinvestigacion->modelo = ($this->modelo === null || $this->modelo === '') ? null : $this->modelo;
            $this->comunicacionesinvestigacion->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null : $this->nro_serie;
            $this->comunicacionesinvestigacion->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null : $this->condicion_equipo_comunicacion;
            $this->comunicacionesinvestigacion->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null : $this->fecha_service;
            $this->comunicacionesinvestigacion->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null : $this->tipo_service;
            $this->comunicacionesinvestigacion->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null : $this->fecha_inventario;
            $this->comunicacionesinvestigacion->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null : $this->detalle_inventario;
            $this->comunicacionesinvestigacion->save();


            DB::commit();
            //$this->clearForm();
            $this->dispatchBrowserEvent('notificacion', [
                'type' => 'success',
                'message' => 'Datos guardados correctamente.'
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function render()
    {
        $HtCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionesinvestigacion::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 1)
            ->count();
        $marcaotros = Comunicacionesinvestigacion::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionesinvestigacion::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesinvestigacion::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesinvestigacion::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesinvestigacion::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionesinvestigacion::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionesinvestigacion::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 1)
            ->count();
        $baseotros = Comunicacionesinvestigacion::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionesinvestigacion::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesinvestigacion::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesinvestigacion::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesinvestigacion::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionesinvestigacion::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $Sindatos = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 2)
            ->count();
        $dipolo2 = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionesinvestigacion::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();




        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '10')->count();
        $OtrosCount = Comunicacionesinvestigacion::where('equipocomunicacion_id', '1')->count();

        return view('livewire.comunicaciones.investigacion.create-comunicaciones-investigacion', compact(
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
