<?php

namespace App\Http\Livewire\Comunicaciones\Ushuaia;

use App\Models\Comunicacionesushuaia;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Marcaequipo;
use App\Models\Equipocomunicacion;
use App\Models\Comunicacionesprimera;
use App\Models\Comunicacionesquinta;
use App\Models\Comunicacionestercera;
use App\Models\Vhfantena; //use Livewire\WithAttributes; WithAttributes
use App\Models\DependenciaUshuaia;
use App\Models\HistorialTrabajoUshuaia;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Metadata\DependsOnClass;


class CreateComunicacionesUshuaia extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $Dependencia_Ushuaia = [];
    public $showingModal = false;


    public $codigo_qr,  $comunicacionesushuaia_id, $dependencia_ushuaia_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesushuaia;

    protected $rules = [
        'dependencia_ushuaia_id' => 'nullable',
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
        $this->dependencia_ushuaia_id = "";
        $this->equipocomunicacion_id = "";
        $this->marcaequipo_id = "";
        $this->vhfantena_id = "";


        $this->MarcaEquipo = Marcaequipo::all();
        $this->VhfAntena = Vhfantena::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();
        $this->EquipoComunicacion = Equipocomunicacion::all(); // Cargar los datos

    }

    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            if ($this->comunicacionesushuaia_id) {
                // Editar registro existente
                $this->comunicacionesushuaia = Comunicacionesushuaia::find($this->comunicacionesushuaia_id);
                if (!$this->comunicacionesushuaia) {
                    throw new Exception('Comunicaciones Ushuaia no encontrado.');
                }
            } else {
                // Crear nuevo registro
                $this->comunicacionesushuaia = new Comunicacionesushuaia();
            }

            $this->comunicacionesushuaia = new Comunicacionesushuaia();
            $this->dependencia_ushuaia_id === null || $this->dependencia_ushuaia_id === '' ? $this->comunicacionesushuaia->dependencia_ushuaia_id = null : $this->comunicacionesushuaia->dependencia_ushuaia_id = $this->dependencia_ushuaia_id;
            $this->lugar_colocacion === null || $this->lugar_colocacion === '' ? $this->comunicacionesushuaia->lugar_colocacion = null : $this->comunicacionesushuaia->lugar_colocacion = $this->lugar_colocacion;
            $this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '' ? $this->comunicacionesushuaia->equipocomunicacion_id = null : $this->comunicacionesushuaia->equipocomunicacion_id = $this->equipocomunicacion_id;
            $this->marcaequipo_id === null || $this->marcaequipo_id === '' ? $this->comunicacionesushuaia->marcaequipo_id = null : $this->comunicacionesushuaia->marcaequipo_id = $this->marcaequipo_id;
            $this->vhfantena_id === null || $this->vhfantena_id === '' ? $this->comunicacionesushuaia->vhfantena_id = null : $this->comunicacionesushuaia->vhfantena_id = $this->vhfantena_id;
            $this->modelo === null || $this->modelo === '' ? $this->comunicacionesushuaia->modelo = null : $this->comunicacionesushuaia->modelo = $this->modelo;
            $this->nro_serie === null || $this->nro_serie === '' ? $this->comunicacionesushuaia->nro_serie = null : $this->comunicacionesushuaia->nro_serie = $this->nro_serie;
            $this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '' ? $this->comunicacionesushuaia->condicion_equipo_comunicacion = null : $this->comunicacionesushuaia->condicion_equipo_comunicacion = $this->condicion_equipo_comunicacion;
            $this->fecha_service === null || $this->fecha_service === '' ? $this->comunicacionesushuaia->fecha_service = null : $this->comunicacionesushuaia->fecha_service = $this->fecha_service;
            $this->tipo_service === null || $this->tipo_service === '' ? $this->comunicacionesushuaia->tipo_service = null : $this->comunicacionesushuaia->tipo_service = $this->tipo_service;
            $this->fecha_inventario === null || $this->fecha_inventario === '' ? $this->comunicacionesushuaia->fecha_inventario = null : $this->comunicacionesushuaia->fecha_inventario = $this->fecha_inventario;
            $this->detalle_inventario === null || $this->detalle_inventario === '' ? $this->comunicacionesushuaia->detalle_inventario = null : $this->comunicacionesushuaia->detalle_inventario = $this->detalle_inventario;

            $this->comunicacionesushuaia->save();

            if ($this->comunicacionesushuaia_id) {
                // Guardar en el historial de cambios
                $historial = new HistorialTrabajoUshuaia();
                $historial->comunicacionesushuaia_id = $this->comunicacionesushuaia_id;
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

        $otrasCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 1)->count();
        $comisariaPrimeraCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 3)->count();
        $comisariaSegundaCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 4)->count();
        $comisariaTerceraCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 5)->count();
        $comisariaCuartaCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 6)->count();
        $comisariaQuintaCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 7)->count();
        $comisariaGeneroFamiliaCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 8)->count();
        $comisariaGeneroFamilia2Count = Comunicacionesushuaia::where('dependencia_ushuaia_id', 9)->count();
        $dseuCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 10)->count();
        $CustodiaGubernamentalCount = Comunicacionesushuaia::where('dependencia_ushuaia_id', 11)->count();
        $HtCount = Comunicacionesushuaia::where('equipocomunicacion_id', '4')->count();
        $marcaotros = Comunicacionesushuaia::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionesushuaia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesushuaia::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesushuaia::where('equipocomunicacion_id', 5)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesushuaia::where('equipocomunicacion_id', 6)
            ->where('marcaequipo_id', 6)
            ->count();

        $BaseCount = Comunicacionesushuaia::where('equipocomunicacion_id', '3')->count();
        $baseotros = Comunicacionesushuaia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionesushuaia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesushuaia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesushuaia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesushuaia::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();

        $AntenaCount = Comunicacionesushuaia::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesushuaia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $dipolo2 = Comunicacionesushuaia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesushuaia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesushuaia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesushuaia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesushuaia::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();





        $OtrosCount = Comunicacionesushuaia::where('equipocomunicacion_id', '1')->count();
        $RepetidoraCount = Comunicacionesushuaia::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesushuaia::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesushuaia::where('equipocomunicacion_id', '7')->count();


        return view('livewire.comunicaciones.ushuaia.create-comunicaciones-ushuaia
        ', compact(
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

            'comisariaPrimeraCount',
            'comisariaSegundaCount',
            'comisariaTerceraCount',
            'comisariaCuartaCount',
            'comisariaQuintaCount',
            'comisariaGeneroFamiliaCount',
            'comisariaGeneroFamilia2Count',
            'dseuCount',
            'CustodiaGubernamentalCount',

        ));
    }
}
