<?php

namespace App\Http\Livewire\Dcrgcomu\Riograndecomu;

use App\Models\Comunicacionesrg;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Marcaequipo;
use App\Models\Equipocomunicacion;
use App\Models\Comunicacionesprimera;
use App\Models\Comunicacionesquinta;
use App\Models\Comunicacionestercera;
use App\Models\Vhfantena; //use Livewire\WithAttributes; WithAttributes
use App\Models\DependenciaRiogrande;
use App\Models\HistorialTrabajoRiogrande;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Database\Seeders\DependenciaRiograndeSeeder;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Metadata\DependsOnClass;


class CreateComunicacionesRiogrande extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;
    public $MarcaEquipo = [];
    public $EquipoComunicacion = [];
    public $VhfAntena = [];
    public $Dependencia_RioGrande = [];
    public $showingModal = false;


    public $codigo_qr,  $comunicacionesrg_id, $dependencia_riogrande_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
        $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
        $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesrg;

    protected $rules = [
        'dependencia_riogrande_id' => 'nullable',
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
        $this->dependencia_riogrande_id = "";
        $this->equipocomunicacion_id = "";
        $this->marcaequipo_id = "";
        $this->vhfantena_id = "";


        $this->MarcaEquipo = Marcaequipo::all();
        $this->VhfAntena = Vhfantena::all();
        $this->Dependencia_RioGrande = DependenciaRioGrande::all();
        $this->EquipoComunicacion = Equipocomunicacion::all(); // Cargar los datos

    }

    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            if ($this->comunicacionesrg_id) {
                // Editar registro existente
                $this->comunicacionesrg = Comunicacionesrg::find($this->comunicacionesrg_id);
                if (!$this->comunicacionesrg) {
                    throw new \Exception('Registro de ComunicacionesRG no encontrado.');
                }
            } else {
                // Crear nuevo registro
                $this->comunicacionesrg = new Comunicacionesrg();
            }

            // Asignar valores, manejando null y vacíos
            $this->comunicacionesrg->dependencia_riogrande_id = $this->dependencia_riogrande_id === null || $this->dependencia_riogrande_id === '' ? null : $this->dependencia_riogrande_id;
            $this->comunicacionesrg->lugar_colocacion = $this->lugar_colocacion === null || $this->lugar_colocacion === '' ? null : $this->lugar_colocacion;
            $this->comunicacionesrg->equipocomunicacion_id = $this->equipocomunicacion_id === null || $this->equipocomunicacion_id === '' ? null : $this->equipocomunicacion_id;
            $this->comunicacionesrg->marcaequipo_id = $this->marcaequipo_id === null || $this->marcaequipo_id === '' ? null : $this->marcaequipo_id;
            $this->comunicacionesrg->vhfantena_id = $this->vhfantena_id === null || $this->vhfantena_id === '' ? null : $this->vhfantena_id;
            $this->comunicacionesrg->modelo = $this->modelo === null || $this->modelo === '' ? null : $this->modelo;
            $this->comunicacionesrg->nro_serie = $this->nro_serie === null || $this->nro_serie === '' ? null : $this->nro_serie;
            $this->comunicacionesrg->condicion_equipo_comunicacion = $this->condicion_equipo_comunicacion === null || $this->condicion_equipo_comunicacion === '' ? null : $this->condicion_equipo_comunicacion;
            $this->comunicacionesrg->fecha_service = $this->fecha_service === null || $this->fecha_service === '' ? null : $this->fecha_service;
            $this->comunicacionesrg->tipo_service = $this->tipo_service === null || $this->tipo_service === '' ? null : $this->tipo_service;
            $this->comunicacionesrg->fecha_inventario = $this->fecha_inventario === null || $this->fecha_inventario === '' ? null : $this->fecha_inventario;
            $this->comunicacionesrg->detalle_inventario = $this->detalle_inventario === null || $this->detalle_inventario === '' ? null : $this->detalle_inventario;

            $this->comunicacionesrg->save();

            // Guardar en el historial de cambios si es una edición
            if ($this->comunicacionesrg_id) {
                $historial = new HistorialTrabajoRiogrande();
                $historial->comunicacionesrg_id = $this->comunicacionesrg_id;
                $historial->detalle_inventario = $this->detalle_inventario;

                // Asignar otros campos según sea necesario
                $historial->save();
            }

            session()->flash('message', 'Datos guardados correctamente.');

            DB::commit();
            //$this->clearForm();

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Error al guardar los datos: ' . $e->getMessage());
        }
    }




    public function render()
    {

        $otrasCount = Comunicacionesrg::where('dependencia_riogrande_id', 1)->count();
        $comisariaRgCount = Comunicacionesrg::where('dependencia_riogrande_id', 3)->count();
        $comisariaGeneroFamiliaRgCount = Comunicacionesrg::where('dependencia_riogrande_id', 4)->count();
        $policiaCientificaRgCount = Comunicacionesrg::where('dependencia_riogrande_id', 5)->count();
        $drzcCount = Comunicacionesrg::where('dependencia_riogrande_id', 6)->count();
        $investigacionesRgCount = Comunicacionesrg::where('dependencia_riogrande_id', 7)->count();
        $brigadaNarcoCriminalidadRgCount = Comunicacionesrg::where('dependencia_riogrande_id', 8)->count();
        $brigadaDelitosComplejosRgCount = Comunicacionesrg::where('dependencia_riogrande_id', 9)->count();
        $brigadaRuralCount = Comunicacionesrg::where('dependencia_riogrande_id', 10)->count();
        $repetidoraCerroMichiCount = Comunicacionesrg::where('dependencia_riogrande_id', 11)->count();
        $repetidoraEstanciaTepiCount = Comunicacionesrg::where('dependencia_riogrande_id', 12)->count();
        $dtoLagoEscondido460Count = Comunicacionesrg::where('dependencia_riogrande_id', 13)->count();
        $dtoControlRuta480Count = Comunicacionesrg::where('dependencia_riogrande_id', 14)->count();
        $HtCount = Comunicacionesrg::where('equipocomunicacion_id', '4')->count();
        $marcaotros = Comunicacionesrg::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 2)
            ->count();
        $marcaMotorola = Comunicacionesrg::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 3)
            ->count();
        $marcaKenwood = Comunicacionesrg::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 4)
            ->count();
        $marcaYaesu = Comunicacionesrg::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 5)
            ->count();
        $marcaHytera = Comunicacionesrg::where('equipocomunicacion_id', 4)
            ->where('marcaequipo_id', 6)
            ->count();

        $BaseCount = Comunicacionesrg::where('equipocomunicacion_id', '3')->count();
        $baseotros = Comunicacionesrg::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 2)
            ->count();
        $baseMotorola = Comunicacionesrg::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 3)
            ->count();
        $baseKenwood = Comunicacionesrg::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 4)
            ->count();
        $baseYaesu = Comunicacionesrg::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 5)
            ->count();
        $baseHytera = Comunicacionesrg::where('equipocomunicacion_id', 3)
            ->where('marcaequipo_id', 6)
            ->count();

        $AntenaCount = Comunicacionesrg::where('equipocomunicacion_id', '8')->count();
        $Otros = Comunicacionesrg::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 1)
            ->count();
        $dipolo2 = Comunicacionesrg::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 3)
            ->count();
        $dipolo4 = Comunicacionesrg::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 4)
            ->count();
        $dipolo8 = Comunicacionesrg::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 5)
            ->count();
        $yagi = Comunicacionesrg::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 6)
            ->count();
        $latigo = Comunicacionesrg::where('equipocomunicacion_id', 8)
            ->where('vhfantena_id', 7)
            ->count();



        $OtrosCount = Comunicacionesrg::where('equipocomunicacion_id', '1')->count();
        $RepetidoraCount = Comunicacionesrg::where('equipocomunicacion_id', '5')->count();
        $FuenteCount = Comunicacionesrg::where('equipocomunicacion_id', '6')->count();
        $BalizaCount = Comunicacionesrg::where('equipocomunicacion_id', '7')->count();
        $PttCount = Comunicacionesrg::where('equipocomunicacion_id', '9')->count();
        $ComandoBalizaCount = Comunicacionesrg::where('equipocomunicacion_id', '10')->count();


        return view('livewire.dcrgcomu.riograndecomu.create-comunicaciones-riogrande
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
            'PttCount',
            'ComandoBalizaCount',

            //---
            'otrasCount',
            'comisariaRgCount',
            'comisariaGeneroFamiliaRgCount',
            'policiaCientificaRgCount',
            'drzcCount',
            'investigacionesRgCount',
            'brigadaNarcoCriminalidadRgCount',
            'brigadaDelitosComplejosRgCount',
            'brigadaRuralCount',
            'repetidoraCerroMichiCount',
            'repetidoraEstanciaTepiCount',
            'dtoLagoEscondido460Count',
            'dtoControlRuta480Count',

        ));
    }
}
