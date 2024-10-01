<?php

namespace App\Http\Livewire\Comunicaciones\Tolhuin;

use App\Models\Comunicacionestolhuin;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Marcaequipo;
use App\Models\Equipocomunicacion;
use App\Models\Comunicacionesprimera;
use App\Models\Comunicacionesquinta;
use App\Models\Comunicacionestercera;
use App\Models\Vhfantena;//use Livewire\WithAttributes; WithAttributes
use App\Models\DependenciaTolhuin;
use App\Models\HistorialTrabajoTolhuin;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Metadata\DependsOnClass;


class CreateComunicacionesTolhuin extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $Dependencia_Tolhuin = [];
    public $showingModal = false;


    public $codigo_qr,  $comunicacionestolhuin_id, $dependencia_tolhuin_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionestolhuin;

    protected $rules = [
	'dependencia_tolhuin_id' => 'nullable',
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
	    $this->dependencia_tolhuin_id = "";
        $this->equipocomunicacion_id = "";
        $this->marcaequipo_id = "";
        $this->vhfantena_id = "";


        $this->MarcaEquipo = Marcaequipo::all();
        $this->VhfAntena = Vhfantena::all();
	    $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->EquipoComunicacion = Equipocomunicacion::all(); // Cargar los datos

    }

    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            if ($this->comunicacionestolhuin_id) {
                // Editar registro existente
                $this->comunicacionestolhuin = Comunicacionestolhuin::find($this->comunicacionestolhuin_id);
                if (!$this->comunicacionestolhuin) {
                    throw new Exception('Comunicaciones Tolhuin no encontrado.');
                }
            } else {
                // Crear nuevo registro
                $this->comunicacionestolhuin = new Comunicacionestolhuin();
            }

            $this->comunicacionestolhuin = new Comunicacionestolhuin();
            $this->dependencia_tolhuin_id === null || $this->dependencia_tolhuin_id === '' ? $this->comunicacionestolhuin->dependencia_tolhuin_id = null : $this->comunicacionestolhuin->dependencia_tolhuin_id = $this->dependencia_tolhuin_id;
            $this->lugar_colocacion === null || $this->lugar_colocacion === '' ? $this->comunicacionestolhuin->lugar_colocacion = null : $this->comunicacionestolhuin->lugar_colocacion = $this->lugar_colocacion;
            $this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '' ? $this->comunicacionestolhuin->equipocomunicacion_id = null : $this->comunicacionestolhuin->equipocomunicacion_id = $this->equipocomunicacion_id;
            $this->marcaequipo_id === null || $this->marcaequipo_id === '' ? $this->comunicacionestolhuin->marcaequipo_id = null : $this->comunicacionestolhuin->marcaequipo_id = $this->marcaequipo_id;
            $this->vhfantena_id === null || $this->vhfantena_id === '' ? $this->comunicacionestolhuin->vhfantena_id = null : $this->comunicacionestolhuin->vhfantena_id = $this->vhfantena_id;
            $this->modelo === null || $this->modelo === '' ? $this->comunicacionestolhuin->modelo = null : $this->comunicacionestolhuin->modelo = $this->modelo;
            $this->nro_serie === null || $this->nro_serie === '' ? $this->comunicacionestolhuin->nro_serie = null : $this->comunicacionestolhuin->nro_serie = $this->nro_serie;
            $this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '' ? $this->comunicacionestolhuin->condicion_equipo_comunicacion = null : $this->comunicacionestolhuin->condicion_equipo_comunicacion = $this->condicion_equipo_comunicacion;
            $this->fecha_service === null || $this->fecha_service === '' ? $this->comunicacionestolhuin->fecha_service = null : $this->comunicacionestolhuin->fecha_service = $this->fecha_service;
            $this->tipo_service === null || $this->tipo_service === '' ? $this->comunicacionestolhuin->tipo_service = null : $this->comunicacionestolhuin->tipo_service = $this->tipo_service;
            $this->fecha_inventario === null || $this->fecha_inventario === '' ? $this->comunicacionestolhuin->fecha_inventario = null : $this->comunicacionestolhuin->fecha_inventario = $this->fecha_inventario;
            $this->detalle_inventario === null || $this->detalle_inventario === '' ? $this->comunicacionestolhuin->detalle_inventario = null : $this->comunicacionestolhuin->detalle_inventario = $this->detalle_inventario;

            $this->comunicacionestolhuin->save();

            if ($this->comunicacionestolhuin_id) {
                // Guardar en el historial de cambios
                $historial = new HistorialTrabajoTolhuin();
                $historial->comunicacionestolhuin_id = $this->comunicacionestolhuin_id;
                $historial->detalle_inventario = $this->detalle_inventario;

                // Asignar otros campos según sea necesario
                $historial->save();
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

        $otrasCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 1)->count();
        $comisariaTolhuinCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 3)->count();
        $comisariaGeneroFamiliaTolhuinCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 4)->count();
        $policiaCientificaTolhuinCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 5)->count();
        $drzcCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 6)->count();
        $investigacionesTolhuinCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 7)->count();
        $brigadaNarcoCriminalidadTolhuinCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 8)->count();
        $brigadaDelitosComplejosTolhuinCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 9)->count();
        $brigadaRuralCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 10)->count();
        $repetidoraCerroMichiCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 11)->count();
        $repetidoraEstanciaTepiCount = Comunicacionestolhuin::where('dependencia_tolhuin_id', 12)->count();
        $dtoLagoEscondido460Count = Comunicacionestolhuin::where('dependencia_tolhuin_id', 13)->count();
        $dtoControlRuta480Count = Comunicacionestolhuin::where('dependencia_tolhuin_id', 14)->count();

        $HtCount = Comunicacionestolhuin::where('equipocomunicacion_id', '4')->count();
        $marcaotros = Comunicacionestolhuin::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionestolhuin::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionestolhuin::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionestolhuin::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionestolhuin::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();

        $BaseCount = Comunicacionestolhuin::where('equipocomunicacion_id', '3')->count();
        $baseotros = Comunicacionestolhuin::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionestolhuin::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionestolhuin::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionestolhuin::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionestolhuin::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();

        $AntenaCount = Comunicacionestolhuin::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionestolhuin::where('equipocomunicacion_id', 8)
        ->where('vhfantena_id', 1)
        ->count();
        $dipolo2 = Comunicacionestolhuin::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionestolhuin::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionestolhuin::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionestolhuin::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionestolhuin::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();





        $OtrosCount = Comunicacionestolhuin::where('equipocomunicacion_id', '1')->count();
        $RepetidoraCount = Comunicacionestolhuin::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionestolhuin::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionestolhuin::where('equipocomunicacion_id', '7')->count();


        return view('livewire.comunicaciones.tolhuin.create-comunicaciones-tolhuin
        ',compact(
            'OtrosCount',
            'HtCount',
            'BaseCount',
            'RepetidoraCount',
            'FuenteCount',
            'BalizaCount',
            'marcaotros',
            'marcaMotorola',
            'marcaKenwood',
            'marcaYaesu',
            'marcaHytera',
            'baseotros',
            'baseMotorola',
            'baseKenwood',
            'baseYaesu',
            'baseHytera',
            'AntenaCount',
            'Otros',
            'dipolo2',
            'dipolo4',
            'dipolo8',
            'yagi',
            'latigo',

            //---
            'otrasCount',

            'comisariaTolhuinCount',
            'comisariaGeneroFamiliaTolhuinCount',
            'policiaCientificaTolhuinCount',
            'drzcCount',
            'investigacionesTolhuinCount',
            'brigadaNarcoCriminalidadTolhuinCount',
            'brigadaDelitosComplejosTolhuinCount',
            'brigadaRuralCount',
            'repetidoraCerroMichiCount',
            'repetidoraEstanciaTepiCount',
            'dtoLagoEscondido460Count',
            'dtoControlRuta480Count',

        ));
    }
}

