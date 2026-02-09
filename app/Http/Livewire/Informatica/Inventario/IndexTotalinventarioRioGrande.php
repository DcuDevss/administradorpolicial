<?php

namespace App\Http\Livewire\Informatica\Inventario;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\GeneralInformatica;
use App\Models\Investigacionesgenerale;
use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\DependenciaTolhuin;
use App\Models\DependenciaUshuaia;
use App\Models\Administraciongenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Administracion;
use App\Models\Custodiagubernamentalgenerale;
use App\Models\Custodiagubernamentale;
use App\Models\Jefatura;
use App\Models\Destacamento;
use App\Models\RecursoHumano;
use App\Models\Investigacione;
use App\Models\Bienestare;
use App\Models\Sumario;
use App\Models\Jefaturagenerale;
use App\Models\Recursoshumanosgenerale;
use App\Models\Serviciosespeciale;
use App\Models\Serviciosespecialesgenerale;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

// 👇 agregá tu modelo de dependencias de Río Grande
use App\Models\DependenciaRiogrande;

class IndexTotalinventarioRioGrande extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_RioGrande = [];

    public $JEfatura = [];
    public $ADministracion = [];
    public $INvestigacione = [];
    public $Recurso_Humano = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_riogrande_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $inve, $recursos, $jefa, $servicios, $custodia;

    public function mount()
    {
        $this->cantidadram_id = "";
        $this->tipodeoficina_id = "";
        $this->tipodispositivo_id = "";
        $this->slotmemoria_id = "";
        $this->dependencia_riogrande_id = "";

        $this->CantidadRam      = Cantidadram::all();
        $this->TipodeOficina    = Tipodeoficina::all();
        $this->TipoDispositivo  = Tipodispositivo::all();
        $this->SlotMemoria      = Slotmemoria::all();

        // 🔹 acá cargás las dependencias de Río Grande
        $this->Dependencia_RioGrande = DependenciaRiogrande::all();
    }

    public function render()
    {
        $sumaTotalOtros = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 1)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalNoPosee = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 2)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalPc = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 3)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalMonitor_pc = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 4)
            ->whereNotNull('dependencia_riogrande_id')
            ->count()            ;

        $sumaTotalNotebook = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 5)
            ->whereNotNull('dependencia_riogrande_id')
            ->count()            ;

        $sumaTotalNetbook = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 6)
            ->whereNotNull('dependencia_riogrande_id')
            ->count()            ;

        $sumaTotalCelular = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 7)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();            ;

        $sumaTotalTablet = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 8)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();            ;

        $sumaTotalTelefono_fijo = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 9)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalTelefono_inalambrico = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 10)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalImpresora_laser = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 11)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalImpresora_tinta = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 12)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalSwitch = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 13)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalRuter = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 14)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalUps = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 15)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalCamaras_video = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 16)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalEstacion_trabajo = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 17)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalServidor = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 18)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalEstabilizador_tension = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 19)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalAuriculares = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 20)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalCable_estructurado = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 21)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalTv = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 22)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        $sumaTotalCentral_telefonica = DB::table('riograndegenerales')
            ->where('tipodispositivo_id', 23)
            ->whereNotNull('dependencia_riogrande_id')
            ->count();

        return view('livewire.informatica.inventario.index-totalinventario-rio-grande',compact('sumaTotalOtros', 'sumaTotalNoPosee', 'sumaTotalPc','sumaTotalMonitor_pc','sumaTotalNotebook',
        'sumaTotalNetbook','sumaTotalCelular','sumaTotalTablet','sumaTotalTelefono_fijo','sumaTotalTelefono_inalambrico',
        'sumaTotalImpresora_laser','sumaTotalImpresora_tinta','sumaTotalSwitch','sumaTotalRuter','sumaTotalUps','sumaTotalCamaras_video',
        'sumaTotalEstacion_trabajo','sumaTotalServidor','sumaTotalEstabilizador_tension','sumaTotalAuriculares',
        'sumaTotalCable_estructurado','sumaTotalTv','sumaTotalCentral_telefonica'));
    }
}
