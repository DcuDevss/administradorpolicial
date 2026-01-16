<?php

namespace App\Http\Livewire\Informatica\Recursos;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;


use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\DependenciaTolhuin;
use App\Models\DependenciaUshuaia;
use App\Models\Generalinformatica;
use App\Models\Administraciongenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Administracion;
use App\Models\Bienestare;
use App\Models\Custodiagubernamentalgenerale;
use App\Models\Custodiagubernamentale;
use App\Models\Jefatura;
use App\Models\Destacamento;
use App\Models\RecursoHumano;
use App\Models\Investigacione;
use App\Models\Investigacionesgenerale;
use App\Models\Jefaturagenerale;
use App\Models\Recursoshumanosgenerale;
use App\Models\Serviciosespeciale;
use App\Models\Sumario;
use App\Models\Serviciosespecialesgenerale;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CreateRecursosGeneral extends Component
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
    public $BIenestare = [];
    public $SUmario = [];

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $sumario_id, $bienestare_id, $serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $softwares_instalados, $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $inve, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,

    protected $rules = [
        'tipodeoficina_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',
        'dependencia_ushuaia_id' => 'nullable',

        'destacamento_id' => 'nullable',
        'jefatura_id' => 'nullable',
        'destacamento_id' => 'nullable',
        'investigacione_id' => 'nullable',
        'recurso_humano_id' => 'nullable',
        'serviciosespeciale_id' => 'nullable',
        'custodiagubernamentale_id' => 'nullable',
        'bienestare_id' => 'nullable',
        'sumario_id' => 'nullable',


        'marca' => 'nullable',
        'modelo' => 'nullable',
        'procesador' => 'nullable',
        'sistema_operativo' => 'nullable',
        'fecha_service' => 'nullable',
        'tipo_service' => 'nullable',
        'fecha_inventario' => 'nullable',
        'detalles_inventario' => 'nullable',
        'tipo_ram' => 'nullable',
        'tipo_disco' => 'nullable',
        'cant_almacenamiento' => 'nullable',
        'tipo_mouse' => 'nullable',
        'tipo_teclado' => 'nullable',
        'softwares_instalados' => 'nullable',
    ];


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
        $this->bienestare_id = '';
        $this->sumario_id = '';

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
        $this->BIenestare = Bienestare::all();
        $this->SUmario = Sumario::all();
    }

    public function guardarrecursoshumanos()
    {
        $this->validate();
        //DB::beginTransaction();
        // try {

        $this->recursos = new Recursoshumanosgenerale();
        // $this->tipodeoficina_id === null || $this->tipodeoficina_id === '' ? $this->admin->tipodeoficina_id = null : $this->admin->tipodeoficina_id = $this->tipodeoficina_id;
        $this->cantidadram_id === null || $this->cantidadram_id === '' ? $this->recursos->cantidadram_id = null : $this->recursos->cantidadram_id = $this->cantidadram_id;
        $this->slotmemoria_id === null || $this->slotmemoria_id === '' ? $this->recursos->slotmemoria_id = null : $this->recursos->slotmemoria_id = $this->slotmemoria_id;
        $this->tipodispositivo_id === null || $this->tipodispositivo_id === '' ? $this->recursos->tipodispositivo_id = null : $this->recursos->tipodispositivo_id = $this->tipodispositivo_id;
        $this->bienestare_id === null || $this->bienestare_id === '' ? $this->recursos->bienestare_id = null : $this->recursos->bienestare_id = $this->bienestare_id;
        $this->recurso_humano_id === null || $this->recurso_humano_id === '' ? $this->recursos->recurso_humano_id = null : $this->recursos->recurso_humano_id = $this->recurso_humano_id;
        $this->sumario_id === null || $this->sumario_id === '' ? $this->recursos->sumario_id = null : $this->recursos->sumario_id = $this->sumario_id;
        $this->recursos->marca = $this->marca;
        $this->recursos->modelo = $this->modelo;
        $this->recursos->procesador = $this->procesador;
        $this->recursos->cant_almacenamiento = $this->cant_almacenamiento;
        $this->recursos->tipo_ram = $this->tipo_ram;
        $this->recursos->sistema_operativo = $this->sistema_operativo;
        $this->recursos->tipo_disco = $this->tipo_disco;
        $this->recursos->tipo_teclado = $this->tipo_teclado;
        $this->recursos->tipo_mouse = $this->tipo_mouse;
        $this->recursos->fecha_inventario = $this->fecha_inventario;
        $this->recursos->fecha_service = $this->fecha_service;
        $this->recursos->tipo_service = $this->tipo_service;
        $this->recursos->detalles_inventario = $this->detalles_inventario;
        $this->recursos->softwares_instalados = $this->softwares_instalados;
        $this->recursos->activo = $this->activo = $this->activo ? 1 : 0;
        $this->recursos->save();


        $recursos_poli = $this->recurso_humano_id ? RecursoHumano::find($this->recurso_humano_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
        $bienestare_poli = $this->bienestare_id ? Bienestare::find($this->bienestare_id)->nombre : null;
        $sumario_poli = $this->sumario_id ? Sumario::find($this->sumario_id)->nombre : null;


        $qrFolder = 'public/codigoQR/RecursosHumanos/';

        if ($recursos_poli) {
            if ($bienestare_poli) {
                $qrFolder;
                $codigoQRData = 'Nro de identificacion: ' . $this->recursos->id . ' -Recursos Humanos: ' . $recursos_poli .  ' - Oficina de: ' . $bienestare_poli .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento .  ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } elseif ($sumario_poli) {
                $qrFolder;
                $codigoQRData = 'Nro de identificacion: ' . $this->recursos->id . ' -Recusros Humanos: ' . $recursos_poli .  ' - Oficina de: ' . $sumario_poli .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } else {
                $codigoQRData = 'Nro de identificacion: ' . $this->recursos->id . ' - Oficinas de Recursos Humanos: ' . $recursos_poli . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            }
        }

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
        $nombreImagenQR = 'codigo_qr_' . $this->recursos->id . '.png';
        $rutaImagenQR = $qrFolder . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);
        $this->recursos->codigo_qr = $nombreImagenQR;
        $this->recursos->save();


        session()->flash('message', 'Datos guardados correctamente.');

        //  DB::commit();
        //$this->clearForm();

        //} catch (\Exception $e) {
        //  DB::rollback();
        //  return $e->getMessage();
        //}
    }


    public function showModal($button)
    {

        $this->modalContent = [];

        $this->button = $button;
        $this->showModal = true;

        switch ($button) {
            case 'Recursos':
                // Código para el caso 'Cria 1'
                break;
            case 'Bienestar':
                // Código para el caso 'Cria 2'
                break;
            case 'Sumario':
                // Código para el caso 'Cria 3'
                break;
            default:
                // Código por defecto si no se cumple ningún caso
                break;
        }


        $this->emit('openModal');
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        //---------Rcursos humanos-------------//
        $directorPc = Recursoshumanosgenerale::where('recurso_humano_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $segundoJefePc = Recursoshumanosgenerale::where('recurso_humano_id', 4)
            // ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $segurosPc = Recursoshumanosgenerale::where('recurso_humano_id', 5)
            //->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $haberesPc = Recursoshumanosgenerale::where('recurso_humano_id', 6)
            // ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $archivoPc = Recursoshumanosgenerale::where('recurso_humano_id', 7)
            //->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $informaticaPc = Recursoshumanosgenerale::where('recurso_humano_id', 8)
            // ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $retirosPc = Recursoshumanosgenerale::where('recurso_humano_id', 9)
            // ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $juntaPc = Recursoshumanosgenerale::where('recurso_humano_id', 10)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $asignacionesPc = Recursoshumanosgenerale::where('recurso_humano_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $guardiaPc = Recursoshumanosgenerale::where('recurso_humano_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $secretariaPc = Recursoshumanosgenerale::where('recurso_humano_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $servidorPc = Recursoshumanosgenerale::where('recurso_humano_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaser = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 11)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $impresoraChorro = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 12)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $switch = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 13)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $ruter = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 14)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $camaras = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 16)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $servidor = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 18)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $centralTelefonica = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 23)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $telefonoFijo = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPc = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 12)
            where('tipodispositivo_id', 3)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $ServiciosExternosPc = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 13)
            where('tipodispositivo_id', 3)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();
        $JefeTurnoPc = Recursoshumanosgenerale::
            //->where('tipodeoficina_id', 14)
            where('tipodispositivo_id', 3)
            ->whereIn('recurso_humano_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();


        //-------- sumario-------------//
        $sumariosPc = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('recurso_humano_id',4)
            ->where('tipodispositivo_id', 3)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $impresoraLaserSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $impresoraChorroSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $switchSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $ruterSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $camarasSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $servidorSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $centralTelefonicaSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();
        $telefonoFijoSumario = Recursoshumanosgenerale::where('recurso_humano_id', 15)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->whereIn('sumario_id', [2, 3, 4])
            ->count();


        //---------bienestar-------------//
        $bienestarPc = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            ->where('tipodispositivo_id', 3)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();
        $impresoraLaserBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();
        $impresoraChorroBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();
        $switchBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();
        $ruterBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();
        $camarasBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();
        $servidorBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            ->where('tipodispositivo_id', 18)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();

        $centralTelefonicaBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();
        $telefonoFijoBienestar = Recursoshumanosgenerale::where('recurso_humano_id', 16)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->whereIn('bienestare_id', [2, 3, 4])
            ->count();




        return view('livewire.informatica.recursos.create-recursos-general', compact(
            'directorPc',
            'segundoJefePc',
            'segurosPc',
            'haberesPc',
            'archivoPc',
            'informaticaPc',
            'juntaPc',
            'asignacionesPc',
            'guardiaPc',
            'secretariaPc',
            'switch',
            'ruter',
            'servidor',
            'camaras',
            'centralTelefonica',
            'telefonoFijo',
            'impresoraLaser',
            'impresoraChorro',
            'servidorPc',
            'retirosPc',
            'sumariosPc',
            'impresoraLaserSumario',
            'impresoraChorroSumario',
            'switchSumario',
            'ruterSumario',
            'camarasSumario',
            'servidorSumario',
            'centralTelefonicaSumario',
            'telefonoFijoSumario',
            'bienestarPc',
            'impresoraLaserBienestar',
            'impresoraChorroBienestar',
            'switchBienestar',
            'ruterBienestar',
            'camarasBienestar',
            'servidorBienestar',
            'centralTelefonicaBienestar',
            'telefonoFijoBienestar'
        ));
    }
    public function clearForm()
    {
        $this->comisariaprimera_id = '';
        $this->cantidadram_id = '';
        $this->tipodispositivo_id = '';
        $this->tipodeoficina_id = '';
        $this->slotmemoria_id = '';
    }
}
