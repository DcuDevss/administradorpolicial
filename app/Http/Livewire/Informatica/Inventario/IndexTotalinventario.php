<?php

namespace App\Http\Livewire\Informatica\Inventario;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\GeneralInformatica; // Ajusta la ruta del modelo según tu estructura
use App\Models\Investigacionesgenerale; // Ajusta la ruta del modelo según tu estructura
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

class IndexTotalinventario extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];

    public $JEfatura = [];
    public $ADministracion = [];
    public $INvestigacione = [];
    public $Recurso_Humano = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $inve, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,


    public function mount()
    {
        $this->cantidadram_id = "";
        $this->tipodeoficina_id = "";
        $this->tipodispositivo_id = "";
        $this->slotmemoria_id = "";
        $this->dependencia_ushuaia_id = "";

        $this->jefatura_id = "";
        $this->administracion_id = "";
        $this->recurso_humano_id = "";
        $this->destacamento_id = "";
        $this->investigacione_id = "";
        $this->serviciosespeciale_id = '';
        $this->custodiagubernamentale_id = '';

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();

        $this->JEfatura = Jefatura::all();
        $this->ADministracion = Administracion::all();
        $this->INvestigacione = Investigacione::all();
        $this->Recurso_Humano = RecursoHumano::all();
        $this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
        $this->CUstodiagubernamentale = Custodiagubernamentale::all();
    }



    public function render()
    {
        $sumaTotalPc = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 3)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 3)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 3)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 3)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 3)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalMonitor_pc = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 4)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 4)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 4)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 4)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 4)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalNotebook = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 5)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 5)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 5)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 5)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 5)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalNetbook = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 6)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 6)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 6)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 6)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 6)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalCelular = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 7)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 7)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 7)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 7)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 7)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalTablet = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 8)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 8)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 8)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 8)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 8)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalTelefono_fijo = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 9)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 9)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 9)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 9)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 9)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalTelefono_inalambrico = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 10)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 10)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 10)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 10)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 10)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalImpresora_laser = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 11)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 11)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 11)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 11)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 11)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalImpresora_tinta = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 12)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 12)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 12)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 12)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 12)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalSwitch = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 13)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 13)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 13)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 13)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 13)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalRuter = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 14)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 14)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 14)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 14)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 14)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalUps = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 15)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 15)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 15)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 15)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 15)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalCamaras_video = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 16)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 16)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 16)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 16)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 16)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalEstacion_trabajo = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 17)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 17)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 17)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 17)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 17)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalServidor = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 18)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 18)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 18)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 18)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 18)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalEstabilizador_tension = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 19)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 19)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 19)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 19)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 19)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalAuriculares = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 20)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 20)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 20)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 20)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 20)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalCable_estructurado = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 21)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 21)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 21)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 21)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 21)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalTv = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 22)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 22)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 22)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 22)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 22)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();

            $sumaTotalCentral_telefonica = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 23)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 23)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 23)
            ->count() + DB::table('jefaturagenerales')
            ->where('tipodispositivo_id', 23)
            ->count() + DB::table('recursoshumanosgenerales')
            ->where('tipodispositivo_id', 23)
           /* ->count() + DB::table('serviciosespecialesgenerales')
            ->where('tipodispositivo_id', 3)*/
            ->count();



        return view('livewire.informatica.inventario.index-totalinventario',compact('sumaTotalPc','sumaTotalMonitor_pc','sumaTotalNotebook',
        'sumaTotalNetbook','sumaTotalCelular','sumaTotalTablet','sumaTotalTelefono_fijo','sumaTotalTelefono_inalambrico',
        'sumaTotalImpresora_laser','sumaTotalImpresora_tinta','sumaTotalSwitch','sumaTotalRuter','sumaTotalUps','sumaTotalCamaras_video',
        'sumaTotalEstacion_trabajo','sumaTotalServidor','sumaTotalEstabilizador_tension','sumaTotalAuriculares',
        'sumaTotalCable_estructurado','sumaTotalTv','sumaTotalCentral_telefonica'));
    }
}
