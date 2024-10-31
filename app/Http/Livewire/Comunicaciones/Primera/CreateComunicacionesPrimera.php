<?php

namespace App\Http\Livewire\Comunicaciones\Primera;

use Livewire\Component;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Marcaequipo;
use App\Models\Equipocomunicacion;
use App\Models\Comunicacionesprimera;
use App\Models\Vhfantena;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\EstadoEquipo;



class CreateComunicacionesPrimera extends Component
{
    use WithFileUploads;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $showingModal = false;

    public $estados; // Almacena los estados cargados desde la base de datos
    public $estado_equipo_id; // Campo para el estado seleccionado en el dropdown



    public $codigo_qr, $comunicacionesprimera_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesprimera;

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
        'estado_equipo_id' => 'nullable',

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
        $this->estado_equipo_id = "";

        $this->estados = EstadoEquipo::all(); // Carga todos los estados disponibles
        $this->MarcaEquipo = Marcaequipo::all();
        $this->VhfAntena = Vhfantena::all();
        $this->EquipoComunicacion = Equipocomunicacion::all(); // Cargar los datos

    }

    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        try {

            $this->comunicacionesprimera = new Comunicacionesprimera();
            $this->comunicacionesprimera->lugar_colocacion = $this->lugar_colocacion;
            $this->comunicacionesprimera->equipocomunicacion_id = $this->equipocomunicacion_id;
            $this->comunicacionesprimera->marcaequipo_id = $this->marcaequipo_id;
            $this->comunicacionesprimera->vhfantena_id = $this->vhfantena_id;
            $this->comunicacionesprimera->modelo = $this->modelo;
            $this->comunicacionesprimera->nro_serie = $this->nro_serie;
            $this->comunicacionesprimera->condicion_equipo_comunicacion = $this->condicion_equipo_comunicacion;
            //$this->comunicacionesprimera->condicion_fuente = $this->condicion_fuente;
            //$this->comunicacionesprimera->condicion_baliza = $this->condicion_baliza;
            $this->comunicacionesprimera->fecha_service = $this->fecha_service;
            $this->comunicacionesprimera->tipo_service = $this->tipo_service;
            $this->comunicacionesprimera->fecha_inventario = $this->fecha_inventario;
            $this->comunicacionesprimera->detalle_inventario = $this->detalle_inventario;
            //$comunicacion->estados()->attach($this->estado_equipo_id);
            $this->comunicacionesprimera->lugar_colocacion = ($this->lugar_colocacion === null || $this->lugar_colocacion === '') ? null : $this->lugar_colocacion;
            $this->comunicacionesprimera->equipocomunicacion_id = ($this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '') ? null : $this->equipocomunicacion_id;
            $this->comunicacionesprimera->marcaequipo_id = ($this->marcaequipo_id === null || $this->marcaequipo_id === '') ? null : $this->marcaequipo_id;
            $this->comunicacionesprimera->vhfantena_id = ($this->vhfantena_id === null || $this->vhfantena_id === '') ? null : $this->vhfantena_id;
            $this->comunicacionesprimera->modelo = ($this->modelo === null || $this->modelo === '') ? null : $this->modelo;
            $this->comunicacionesprimera->nro_serie = ($this->nro_serie === null || $this->nro_serie === '') ? null : $this->nro_serie;
            $this->comunicacionesprimera->condicion_equipo_comunicacion = ($this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '') ? null : $this->condicion_equipo_comunicacion;
            $this->comunicacionesprimera->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null : $this->fecha_service;
            $this->comunicacionesprimera->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null : $this->tipo_service;
            $this->comunicacionesprimera->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null : $this->fecha_inventario;
            $this->comunicacionesprimera->detalle_inventario = ($this->detalle_inventario === null || $this->detalle_inventario === '') ? null : $this->detalle_inventario;
            $this->comunicacionesprimera->save();

                  // Asocia el estado del equipo seleccionado a la comunicación en la tabla intermedia
            if ($this->estado_equipo_id) {
                $this->comunicacionesprimera->estados()->attach($this->estado_equipo_id);
            }

           
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


        $HtCount = Comunicacionesprimera::where('equipocomunicacion_id', '4')->count();
        $marcaSindatos = Comunicacionesprimera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 1)
            ->count();
        $marcaotros = Comunicacionesprimera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionesprimera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesprimera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesprimera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesprimera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();
        $marcaAlcom = Comunicacionesprimera::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 7)
            ->count();

        $BaseCount = Comunicacionesprimera::where('equipocomunicacion_id', '3')->count();
        $baseSindatos = Comunicacionesprimera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 1)
            ->count();
        $baseotros = Comunicacionesprimera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionesprimera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesprimera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesprimera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesprimera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();
        $baseAlcom = Comunicacionesprimera::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 7)
            ->count();

        $AntenaCount = Comunicacionesprimera::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $Sindatos = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 2)
            ->count();
        $dipolo2 = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();
        $ringo = Comunicacionesprimera::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 8)
            ->count();



        /*$Dipolo2Count = Comunicacionesprimera::where('vhfantena_id', '1')->count();
        $Dipolo4Count = Comunicacionesprimera::where('vhfantena_id', '2')->count();
        $Dipolo8Count = Comunicacionesprimera::where('vhfantena_id', '3')->count();
        $YagiCount = Comunicacionesprimera::where('vhfantena_id', '4')->count();
        $LatigoCount = Comunicacionesprimera::where('vhfantena_id', '5')->count();*/


        $RepetidoraCount = Comunicacionesprimera::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesprimera::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesprimera::where('equipocomunicacion_id', '7')->count();
        $OtrosCount = Comunicacionesprimera::where('equipocomunicacion_id', '1')->count();


        return view(
            'livewire.comunicaciones.primera.create-comunicaciones-primera',
            compact(
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
            )
        );
    }
}
