<?php

namespace App\Http\Livewire\Informatica\General;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;

use App\Models\Cientifica;
use App\Models\Cantidadram;
use App\Models\DependenciaUshuaia;
use App\Models\Generalinformatica;
use App\Models\Administraciongenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Administracion;
use App\Models\Custodiagubernamentale;
use App\Models\Jefatura;
use App\Models\Destacamento;
use App\Models\RecursoHumano;
use App\Models\Investigacione;
use App\Models\Serviciosespeciale;
use App\Models\AuditoriaDetalleInventario;
use App\Models\Riograndegenerale;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CreateInventarioGeneral extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;


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
    public $CIentifica = [];
    //public $ButtonName;


    public $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $cientifica_id, $serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $softwares_instalados, $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $inve, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,
    //public $comisariasegunda;
    //public $button1,$button2;
    //public $

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
        'cientifica_id' => 'nullable',


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
        $this->cientifica_id = '';

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
        $this->CIentifica = Cientifica::all();
        //$this->CIentifica = Custodiagubernamentale::all();
    }



    public function guardar()
    {
        $this->validate();

        $this->generalinformatica = new Generalinformatica();
        $this->generalinformatica->dependencia_ushuaia_id = $this->dependencia_ushuaia_id ?: null;
        $this->generalinformatica->tipodeoficina_id = $this->tipodeoficina_id ?: null;
        $this->generalinformatica->cantidadram_id = $this->cantidadram_id ?: null;
        $this->generalinformatica->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->generalinformatica->tipodispositivo_id = $this->tipodispositivo_id ?: null;
        $this->generalinformatica->custodiagubernamentale_id = $this->custodiagubernamentale_id ?: null;
        $this->generalinformatica->destacamento_id = $this->destacamento_id ?: null;
        $this->generalinformatica->serviciosespeciale_id = $this->serviciosespeciale_id ?: null;
        $this->generalinformatica->marca = $this->marca ?: null;
        $this->generalinformatica->modelo = $this->modelo ?: null;
        $this->generalinformatica->procesador = $this->procesador ?: null;
        $this->generalinformatica->cant_almacenamiento = $this->cant_almacenamiento ?: null;
        $this->generalinformatica->tipo_ram = $this->tipo_ram ?: null;
        $this->generalinformatica->sistema_operativo = $this->sistema_operativo ?: null;
        $this->generalinformatica->tipo_disco = $this->tipo_disco ?: null;
        $this->generalinformatica->tipo_teclado = $this->tipo_teclado ?: null;
        $this->generalinformatica->tipo_mouse = $this->tipo_mouse ?: null;
        $this->generalinformatica->fecha_inventario = $this->fecha_inventario ?: null;
        $this->generalinformatica->fecha_service = $this->fecha_service ?: null;
        $this->generalinformatica->tipo_service = $this->tipo_service ?: null;
        $this->generalinformatica->softwares_instalados = $this->softwares_instalados ?: null;
        $this->generalinformatica->detalles_inventario = $this->detalles_inventario ?: null;
        $this->generalinformatica->activo = $this->activo = $this->activo ? 1 : 0;
        // Guardando la instancia en la base de datos
        $this->generalinformatica->save();

        // Guardar el historial de ediciones si el campo detalles_inventario cambia
        if ($this->generalinformatica->isDirty('detalles_inventario')) {
            AuditoriaDetalleInventario::create([
                'generalinformatica_id' => $this->generalinformatica->id,
                'detalles_inventario' => $this->generalinformatica->detalles_inventario,
            ]);
        }



        $serviciosespeciale_poli = $this->serviciosespeciale_id ? Serviciosespeciale::find($this->serviciosespeciale_id)->nombre : null;
        $destacamento_poli = $this->destacamento_id ? Destacamento::find($this->destacamento_id)->nombre : null;
        $custodiaGubernamentale = $this->custodiagubernamentale_id ? Custodiagubernamentale::find($this->custodiagubernamentale_id)->nombre : null;
        $dependenciaUshuaia = $this->dependencia_ushuaia_id ? DependenciaUshuaia::find($this->dependencia_ushuaia_id)->nombre : null;
        $tipoOficina = $this->tipodeoficina_id ? Tipodeoficina::find($this->tipodeoficina_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;

        $qrFolder = 'public/codigoQR/Dep.operativas/';

        if ($dependenciaUshuaia) {
            if ($custodiaGubernamentale) {
                $qrFolder/* .= 'Custodia-gubernamental/'*/;
                $codigoQRData = 'Nro de identificacion: ' . $this->generalinformatica->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Custodia gubernamental: ' . $custodiaGubernamentale .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento .  ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } elseif ($serviciosespeciale_poli) {
                $qrFolder/* .= 'Servicios-especiales/'*/;
                $codigoQRData = 'Nro de identificacion: ' . $this->generalinformatica->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Servicios especiales: ' . $serviciosespeciale_poli .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } elseif ($destacamento_poli) {
                $qrFolder/* .= 'Destacamentos/'*/;
                $codigoQRData = 'Nro de identificacion: ' . $this->generalinformatica->id . ' -Dependencia policiales: ' . $dependenciaUshuaia . ' - Tipo de oficina: ' . $tipoOficina .  ' -Destacamentos: ' . $destacamento_poli . ' - Fecha del inventario: '  . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } else {
                $codigoQRData = 'Nro de identificacion: ' . $this->generalinformatica->id . ' -Dependencia policiales: ' . $dependenciaUshuaia . ' - Tipo de oficina: ' . $tipoOficina . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            }
        }

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
        $nombreImagenQR = 'codigo_qr_' . $this->generalinformatica->id . '.png';
        $rutaImagenQR = $qrFolder . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);
        $this->generalinformatica->codigo_qr = $nombreImagenQR;
        $this->generalinformatica->save();
    }


    public function showModal($button)
    {

        $this->modalContent = [];

        $this->button = $button;
        $this->showModal = true;

        switch ($button) {
            case 'Comisaria Primera':
                // Código para el caso 'Cria 1'
                break;
            case 'Comisaria Segunda':
                // Código para el caso 'Cria 2'
                break;
            case 'Comisaria Tercera':
                // Código para el caso 'Cria 3'
                break;
            case 'Comisaria Cuarta':
                // Código para el caso 'Cria 4'
                break;
            case 'Comisaria Quinta':
                // Código para el caso 'Cria 5'
                break;
            case 'Comisaria G.F y M.U-1':
                // Código para el caso 'Cria flia1'
                break;
            case 'Comisaria G.F y M.U-2':
                // Código para el caso 'Cria flia 2'
                break;
            case 'Servicios Especiales':
                // Código para el caso serv. especiales
                break;
            case 'Custodia Gubernamental':
                // Código para el caso 'Gobierno'
                break;
            default:
                // Código por defecto si no se cumple ningún caso
                break;
            case 'Otras Dependencias':
                // Código para el caso 'Gobierno'
                break;
        }


        $this->emit('openModal');
    }


    public function closeModal()
    {
        $this->showModal = false;
    }


    public function clearForm()
    {
        $this->comisariaprimera_id = '';
        $this->cantidadram_id = '';
        $this->tipodispositivo_id = '';
        $this->tipodeoficina_id = '';
        $this->slotmemoria_id = '';
    }


    public function render()
    {
        //otras dependencias RG
        $Otras = Generalinformatica::where('dependencia_ushuaia_id', 1)
            ->where('tipodispositivo_id', 3)
            ->count();
        //---------Comisaria Primera-------------//
        $primeraotros = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodispositivo_id', 1)
            ->count();
        $primeraPc = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaser = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo = Generalinformatica::where('dependencia_ushuaia_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $telefonoInalambrico = Generalinformatica::where('tipodispositivo_id', 10)
            ->count();
        $SuboficialesPc = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternosPc = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPc = Generalinformatica::where('dependencia_ushuaia_id', 3)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();


        //---------Comisaria segunda-------------//
        $segundaotros = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 1)
            ->count();
        $segundaPc = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaser2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $telefonoInalambrico2da = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 10)
            ->count();
        $Suboficiales2Pc = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos2Pc = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno2Pc = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria tercera-------------//
        $terceraotros = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodispositivo_id', 1)
            ->count();
        $terceraPc = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcDTO365 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 2)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ImpresorasDTO365 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 2)
            ->where('tipodispositivo_id', 12)
            //->where('tipodispositivo_id', 12)
            ->count();
        $PcDTO350 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ImpresorasDTO350 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 3)
            ->where('tipodispositivo_id', 12)
            ->count();
        $PcDTO352 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ImpresorasDTO352 = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 11)
            ->where('destacamento_id', 4)
            ->where('tipodispositivo_id', 12)
            ->count();
        $impresoraLaser3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();

        $impresoraChorro3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $telefonoInalambrico3da = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodispositivo_id', 10)
            ->count();
        $Suboficiales3Pc = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos3Pc = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno3Pc = Generalinformatica::where('dependencia_ushuaia_id', 5)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();


        //---------Comisaria cuarta-------------//
        $cuartaotros = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodispositivo_id', 1)
            ->count();
        $cuartaPc = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaser4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $telefonoInalambrico4da = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodispositivo_id', 10)
            ->count();
        $Suboficiales4Pc = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos4Pc = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno4Pc = Generalinformatica::where('dependencia_ushuaia_id', 6)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria quinta-------------//
        $quintaotros = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodispositivo_id', 1)
            ->count();
        $quintaPc = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaser5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $telefonoInalambrico5da = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodispositivo_id', 10)
            ->count();
        $Suboficiales5Pc = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos5Pc = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno5Pc = Generalinformatica::where('dependencia_ushuaia_id', 7)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();


        //---------Comisaria familia-------------//
        $flia1otros = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 1)
            ->count();
        $flia1Pc = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcjefeFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsubjefeFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcofservicioFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsumarianteFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcguardiaFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcdediaFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcadministrativaFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcautomotoresFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPCFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternosPCFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPCFlia1 = Generalinformatica::where('dependencia_ushuaia_id', 8)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria familia 2-------------//
        $flia2otros = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 1)
            ->count();
        $flia2Pc = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcjefeFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsubjefeFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcofservicioFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsumarianteFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcguardiaFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcdediaFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcadministrativaFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcautomotoresFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPCFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternosPCFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPCFlia2 = Generalinformatica::where('dependencia_ushuaia_id', 9)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();


        //---------DESEU--------------------------//
        $serviciosotros = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 1)
            ->count();
        $serviciosPc = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcjefeServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsubjefeServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcCanes = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcOpTacticas = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGrupoInfanteria = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcBusquedaRescate = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcSeccionExplosivos = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcAdministrativa = Generalinformatica::where('dependencia_ushuaia_id', 10)
            ->where('serviciosespeciale_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoServicios = Generalinformatica::where('dependencia_ushuaia_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Custodia--Gubernamental
        $custodiaotros = Generalinformatica::where('dependencia_ushuaia_id', 4)
            ->where('tipodispositivo_id', 1)
            ->count();

        $custodiaPc = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcjefeCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsubjefeCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiaGubernamentale = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcVideoVijilancia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcPlantaBaja = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcPrimerPiso = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcSegundoPiso = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcSuperiorTribunal = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcPrecidencia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 11)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcLegislatura = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcCadic = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcCasaGobierno = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('custodiagubernamentale_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoCustodia = Generalinformatica::where('dependencia_ushuaia_id', 12)
            ->where('tipodispositivo_id', 9)
            ->count();


        $sumaTotalPc = GeneralInformatica::where('tipodispositivo_id', 3)
            ->whereIn('dependencia_ushuaia_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12])
            ->count();
        //otras dependencias Ushuaia
        $OtrasPc = Generalinformatica::where('dependencia_ushuaia_id', 1)
            ->where('tipodispositivo_id', 3)
            ->count();

        return view('livewire.informatica.general.create-inventario-general', compact(
            'OtrasPc',
            'primeraotros',
            'primeraPc',
            'Pcjefe',
            'Pcsubjefe',
            'Pcofservicio',
            'Pcsumariante',
            'SuboficialesPc',
            'JefeTurnoPc',
            'ServiciosExternosPc',
            'Pcguardia',
            'Pcdedia',
            'Pcadministrativa',
            'Pcautomotores',
            'impresoraChorro',
            'impresoraLaser',
            'switch',
            'ruter',
            'camaras',
            'servidor',
            'centralTelefonica',
            'telefonoFijo',
            'telefonoInalambrico',


            //-----
            'segundaotros',
            'segundaPc',
            'Pcjefe2da',
            'Pcsubjefe2da',
            'Pcofservicio2da',
            'Pcsumariante2da',
            'Suboficiales2Pc',
            'JefeTurno2Pc',
            'ServiciosExternos2Pc',
            'Pcguardia2da',
            'Pcdedia2da',
            'Pcadministrativa2da',
            'Pcautomotores2da',
            'impresoraChorro2da',
            'impresoraLaser2da',
            'switch2da',
            'ruter2da',
            'camaras2da',
            'servidor2da',
            'centralTelefonica2da',
            'telefonoFijo2da',
            'telefonoInalambrico2da',

            //-----
            'terceraotros',
            'terceraPc',
            'Pcjefe3da',
            'Pcsubjefe3da',
            'Pcofservicio3da',
            'Pcsumariante3da',
            'Suboficiales3Pc',
            'JefeTurno3Pc',
            'ServiciosExternos3Pc',
            'Pcguardia3da',
            'Pcdedia3da',
            'Pcadministrativa3da',
            'Pcautomotores3da',
            'PcDTO365',
            'ImpresorasDTO365',
            'PcDTO350',
            'ImpresorasDTO350',
            'PcDTO352',
            'ImpresorasDTO352',
            'impresoraChorro3da',
            'impresoraLaser3da',
            'switch3da',
            'camaras3da',
            'ruter3da',
            'camaras3da',
            'servidor3da',
            'centralTelefonica3da',
            'telefonoFijo3da',
            'telefonoInalambrico3da',

            //-----
            'cuartaotros',
            'cuartaPc',
            'Pcjefe4da',
            'Pcsubjefe4da',
            'Pcofservicio4da',
            'Pcsumariante4da',
            'Suboficiales4Pc',
            'JefeTurno4Pc',
            'ServiciosExternos4Pc',
            'Pcguardia4da',
            'Pcdedia4da',
            'Pcadministrativa4da',
            'Pcautomotores4da',
            'impresoraChorro4da',
            'impresoraLaser4da',
            'switch4da',
            'ruter4da',
            'camaras4da',
            'servidor4da',
            'centralTelefonica4da',
            'telefonoFijo4da',
            'telefonoInalambrico4da',

            //-----
            'quintaotros',
            'quintaPc',
            'Pcjefe5da',
            'Pcsubjefe5da',
            'Pcofservicio5da',
            'Pcsumariante5da',
            'Suboficiales5Pc',
            'JefeTurno5Pc',
            'ServiciosExternos5Pc',
            'Pcguardia5da',
            'Pcdedia5da',
            'Pcadministrativa5da',
            'Pcautomotores5da',
            'impresoraChorro5da',
            'impresoraLaser5da',
            'switch5da',
            'ruter5da',
            'camaras5da',
            'servidor5da',
            'centralTelefonica5da',
            'telefonoFijo5da',
            'telefonoInalambrico5da',

            //-----
            'flia1otros',
            'flia1Pc',
            'PcjefeFlia1',
            'PcsubjefeFlia1',
            'PcofservicioFlia1',
            'PcsumarianteFlia1',
            'SuboficialesPCFlia1',
            'ServiciosExternosPCFlia1',
            'JefeTurnoPCFlia1',
            'PcguardiaFlia1',
            'PcdediaFlia1',
            'PcadministrativaFlia1',
            'PcautomotoresFlia1',
            'impresoraChorroFlia1',
            'impresoraLaserFlia1',
            'switchFlia1',
            'ruterFlia1',
            'camarasFlia1',
            'servidorFlia1',
            'centralTelefonicaFlia1',
            'telefonoFijoFlia1',

            //-----
            'flia2otros',
            'flia2Pc',
            'PcjefeFlia2',
            'PcsubjefeFlia2',
            'PcofservicioFlia2',
            'PcsumarianteFlia2',
            'SuboficialesPCFlia2',
            'ServiciosExternosPCFlia2',
            'JefeTurnoPCFlia2',
            'PcguardiaFlia2',
            'PcdediaFlia2',
            'PcadministrativaFlia2',
            'PcautomotoresFlia2',
            'impresoraChorroFlia2',
            'impresoraLaserFlia2',
            'switchFlia2',
            'ruterFlia2',
            'camarasFlia2',
            'servidorFlia2',
            'centralTelefonicaFlia2',
            'telefonoFijoFlia2',
            'sumaTotalPc',

            //-----
            'serviciosotros',
            'serviciosPc',
            'PcjefeServicios',
            'PcsubjefeServicios',
            'PcCanes',
            'PcOpTacticas',
            'PcGrupoInfanteria',
            'PcBusquedaRescate',
            'PcSeccionExplosivos',
            'PcAdministrativa',
            'impresoraChorroServicios',
            'impresoraLaserServicios',
            'switchServicios',
            'ruterServicios',
            'camarasServicios',
            'servidorServicios',
            'centralTelefonicaServicios',
            'telefonoFijoServicios',

            //----------
            'custodiaotros',
            'custodiaPc',
            'PcjefeCustodia',
            'PcsubjefeCustodia',
            'PcGuardiaGubernamentale',
            'PcVideoVijilancia',
            'PcPlantaBaja',
            'PcPrimerPiso',
            'PcSegundoPiso',
            'PcSuperiorTribunal',
            'PcPrecidencia',
            'PcLegislatura',
            'PcCadic',
            'PcCasaGobierno',
            'impresoraChorroCustodia',
            'impresoraLaserCustodia',
            'switchCustodia',
            'ruterCustodia',
            'camarasCustodia',
            'servidorCustodia',
            'centralTelefonicaCustodia',
            'telefonoFijoCustodia',


        ));
    }
}
