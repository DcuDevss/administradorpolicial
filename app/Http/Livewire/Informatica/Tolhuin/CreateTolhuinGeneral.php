<?php

namespace App\Http\Livewire\Informatica\Tolhuin;

use App\Models\AuditoriaInventarioTolhuin;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;


use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\DependenciaTolhuin;
use App\Models\Tolhuingenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Tolhuin;
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
use App\Models\Serviciosespecialesgenerale;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CreateTolhuinGeneral extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Tolhuin = [];

    public $JEfatura = [];
    public $TOlhuin = [];
    public $INvestigacione = [];
    public $Recurso_Humano = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $codigo_qr,  $tolhuingenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id,  $dependencia_tolhuin_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $softwares_instalados, $serviciosespeciale_id, $investigacione_id, $tolhuin_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $tol, $inve, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,

    protected $rules = [
        'dependencia_tolhuin_id' => 'nullable',
        'tipodeoficina_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',
        'dependencia_tolhuin_id' => 'nullable',

        'destacamento_id' => 'nullable',
        'jefatura_id' => 'nullable',
        'destacamento_id' => 'nullable',
        'investigacione_id' => 'nullable',
        'recurso_humano_id' => 'nullable',
        'serviciosespeciale_id' => 'nullable',
        'custodiagubernamentale_id' => 'nullable',


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
        $this->dependencia_tolhuin_id = "";

        $this->dependencia_tolhuin_id = "";
        $this->jefatura_id = "";
        $this->tolhuin_id = "";
        $this->recurso_humano_id = "";
        $this->destacamento_id = "";
        $this->investigacione_id = "";
        $this->serviciosespeciale_id = '';
        $this->custodiagubernamentale_id = '';

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();

        $this->JEfatura = Jefatura::all();
        $this->TOlhuin = Tolhuin::all();
        $this->INvestigacione = Investigacione::all();
        $this->Recurso_Humano = RecursoHumano::all();
        $this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
        $this->CUstodiagubernamentale = Custodiagubernamentale::all();
    }

    public function guardartolhuin()
    {
        $this->validate();
        // DB::beginTransaction();
        // try {

        $this->tol = new Tolhuingenerale();
        $this->tol->tipodeoficina_id = $this->tipodeoficina_id ?: null;
        $this->tol->cantidadram_id = $this->cantidadram_id ?: null;
        $this->tol->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->tol->tipodispositivo_id = $this->tipodispositivo_id ?: null;
        $this->tol->dependencia_tolhuin_id = $this->dependencia_tolhuin_id ?: null;
        $this->tol->tolhuin_id = $this->tolhuin_id ?: null;
        $this->tol->marca = $this->marca ?: null;
        $this->tol->modelo = $this->modelo ?: null;
        $this->tol->procesador = $this->procesador ?: null;
        $this->tol->cant_almacenamiento = $this->cant_almacenamiento ?: null;
        $this->tol->tipo_ram = $this->tipo_ram ?: null;
        $this->tol->sistema_operativo = $this->sistema_operativo ?: null;
        $this->tol->tipo_disco = $this->tipo_disco ?: null;
        $this->tol->tipo_teclado = $this->tipo_teclado ?: null;
        $this->tol->tipo_mouse = $this->tipo_mouse ?: null;
        $this->tol->fecha_inventario = $this->fecha_inventario ?: null;
        $this->tol->fecha_service = $this->fecha_service ?: null;
        $this->tol->tipo_service = $this->tipo_service ?: null;
        $this->tol->detalles_inventario = $this->detalles_inventario ?: null;
        $this->tol->softwares_instalados = $this->softwares_instalados ?: null;
        $this->tol->activo = $this->activo = $this->activo ? 1 : 0;
        $this->tol->save();


        if ($this->tol->isDirty('detalles_inventario')) {
            AuditoriaInventarioTolhuin::create([
                'tolhuingenerale_id' => $this->tol->id,
                'detalles_inventario' => $this->tol->detalles_inventario,
            ]);
        }

        $dependencia_tolhuin = $this->dependencia_tolhuin_id ? DependenciaTolhuin::find($this->dependencia_tolhuin_id)->nombre : null;
        $tipodeoficina = $this->tipodeoficina_id ? Tipodeoficina::find($this->tipodeoficina_id)->nombre : null;
        $tol_poli = $this->tolhuin_id ? Tolhuin::find($this->tolhuin_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;

        $codigoQRData = ' Nro de indentificacion: ' . $this->tol->id .  ' - Fecha del inventario: ' . $this->fecha_inventario . //' - Tipo de oficina: ' . $tipoOficina .
            ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Tolhuin: ' . $tol_poli . ' Softwares: ' . $this->softwares_instalados .  // ' - Jefatura: ' . $jefatura_poli . ' - Investigaciones: ' . $investigacione_poli . ' - Recursos Humanos: ' . $recurso_humano_poli . ' - Destacamentos: ' . $destacamento_poli . ' - Servicios Especiales: ' . $serviciosespeciale_poli .                                ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' .
            $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' Slot de memoria: ' . $slotMemoria . ' - Tipo de Ram: ' . $this->tipo_ram . ' - Cantidad de Ram: ' . $cantidadRam . ' -tipo de disco ' . $this->tipo_disco . ' -Cantidad de Almacenamiento: ' . $this->cant_almacenamiento .
            ' - Tipo de Teclado: ' . $this->tipo_teclado . ' - Tipo de mouse: ' . $this->tipo_mouse .
            ' - Detalles del inventario: ' . $this->detalles_inventario . ' -La computadora se encuentra: ' . $this->activo . ' -Ultima fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service;

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->tol->id . '.png';
        $rutaImagenQR = 'public/codigoQR/Tolhuin/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        //' -Tipo de monitor: ' . $this->monitor .' - Tipo de Impresora: ' . $this->tipo_impresora .

        // Actualizar el campo "codigo_qr" en el modelo ComisariaPrimera
        $this->tol->codigo_qr = $nombreImagenQR;
        $this->tol->save();



        session()->flash('message', 'Datos guardados correctamente.');

        // DB::commit();
        //$this->clearForm();

        // } catch (\Exception $e) {
        // DB::rollback();
        //return $e->getMessage();
        //}
    }

    public function showModal($button)
    {

        $this->modalContent = [];

        $this->button = $button;
        $this->showModal = true;

        switch ($button) {
            case 'Comisaria Tolhuin':
                // Código para el caso 'Cria 1'
                break;
            case 'Comisaria G.F. y M-T':
                // Código para el caso 'Cria 2'
                break;
            case 'Policia Cientifica Tolhuin':
                // Código para el caso 'Cria 3'
                break;
            case 'D.R.Z.C':
                // Código para el caso 'Cria 4'
                break;
            case 'Investigaciones Tolhuin':
                // Código para el caso 'Cria 5'
                break;
            case 'Brigada Narcocriminalidad Tolhuin':
                // Código para el caso 'Cria flia1'
                break;
            case 'Brigada Delitos Complejos Tolhuin':
                // Código para el caso 'Cria flia 2'
                break;
            case 'Brigada Rural':
                // Código para el caso serv. especiales
                break;
            case 'Repetidora Cerro Michi':
                // Código para el caso 'Gobierno'
                break;
            case 'Repetidora Estancia Tepi':
                // Código para el caso 'Gobierno'
                break;
            case 'Dto. Lago Escondido 460':
                // Código para el caso 'Gobierno'
                break;
            case 'Dto. Control de Ruta 480':
                // Código para el caso 'Gobierno'
                break;
            case 'Otras Dependencias':
                // Código para el caso 'Gobierno'
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
        //otras dependencias tolhuin
        $OtrasPc = Tolhuingenerale::where('dependencia_tolhuin_id', 1)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria Tolhuin-------------//
        $tolhuinotros = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodispositivo_id', 1)
            ->count();
        $tolhuinPc = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaser = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switch = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaras = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidor = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPc = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternosPc = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPc = Tolhuingenerale::where('dependencia_tolhuin_id', 3)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria F y G-t-------------//
        $generootros = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodispositivo_id', 1)
            ->count();
        $generoPc = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefegenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefegenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofserviciogenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariantegenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardiagenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdediagenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativagenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotoresgenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLasergenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrogenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchgenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $rutergenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasgenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorgenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicagenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijogenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPcgenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternosPcgenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPcgenero = Tolhuingenerale::where('dependencia_tolhuin_id', 4)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Policia Cientifica Tolhuin-------------//
        $cientotros = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodispositivo_id', 1)
            ->count();
        $cientPc = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefecient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefecient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofserviciocient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariantecient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardiacient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativacient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLasercient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrocient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchcient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $rutercient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarascient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorcient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicacient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijocient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPccient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPccient = Tolhuingenerale::where('dependencia_tolhuin_id', 5)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------D.R.Z.C-------------//
        $direccionotros = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodispositivo_id', 1)
            ->count();
        $direccionPc = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefedireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefedireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofserviciodireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardiadireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativadireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserdireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrodireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchdireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterdireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasdireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidordireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicadireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijodireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPcdireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPcdireccion = Tolhuingenerale::where('dependencia_tolhuin_id', 6)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Investigaciones Tolhuin-------------//
        $invesotros = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodispositivo_id', 1)
            ->count();
        $invesPc = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefeinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefeinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicioinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardiainves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativainves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicainves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPcinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPcinves = Tolhuingenerale::where('dependencia_tolhuin_id', 7)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();


        //---------Brigada Narcocriminalidad Tolhuin-------------//
        $narcootros = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodispositivo_id', 1)
            ->count();
        $narcoPc = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefenarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefenarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicionarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariantenarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();

        $Pcguardianarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativanarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLasernarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorronarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchnarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruternarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasnarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidornarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicanarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijonarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPcnarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPcnarco = Tolhuingenerale::where('dependencia_tolhuin_id', 8)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Brigada Delitos Complejos Tolhuin-------------//
        $compotros = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodispositivo_id', 1)
            ->count();
        $compPc = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefecomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefecomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofserviciocomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariantecomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();

        $Pcguardiacomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativacomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLasercomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrocomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchcomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $rutercomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarascomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorcomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicacomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijocomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPccomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPccomp = Tolhuingenerale::where('dependencia_tolhuin_id', 9)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Brigada Rural Tolhuin-------------//
        $ruralotros = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodispositivo_id', 1)
            ->count();
        $ruralPc = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjeferural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjeferural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofserviciorural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumarianterural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();

        $Pcguardiarural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativarural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserrural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrorural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchrural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterrural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasrural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorrural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicarural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijorural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPcrural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPcrural = Tolhuingenerale::where('dependencia_tolhuin_id', 10)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();


        //---------Repetidora Estancia Tepi-------------//
        $tepiotros = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            ->where('tipodispositivo_id', 1)
            ->count();
        $tepiPc = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardiatepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLasertepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrotepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchtepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $rutertepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarastepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidortepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicatepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijotepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPctepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPctepi = Tolhuingenerale::where('dependencia_tolhuin_id', 11)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Repetidora Cerro Michi-------------//
        $michiotros = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            ->where('tipodispositivo_id', 1)
            ->count();
        $michiPc = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardiamichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLasermichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorromichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchmichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $rutermichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasmichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidormichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicamichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijomichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPcmichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPcmichi = Tolhuingenerale::where('dependencia_tolhuin_id', 12)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Dto.Lago Escondido 460-------------//
        $lagootros = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            ->where('tipodispositivo_id', 1)
            ->count();
        $lagoPc = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardialago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserlago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrolago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchlago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterlago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camaraslago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorlago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicalago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijolago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPclago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPclago = Tolhuingenerale::where('dependencia_tolhuin_id', 13)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Dto.Control de Ruta 480-------------//
        $rutaotros = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            ->where('tipodispositivo_id', 1)
            ->count();
        $rutaPc = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardiaruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaserruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->count();
        $switchruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $camarasruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $servidorruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonicaruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPcruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            ->where('tipodeoficina_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPcruta = Tolhuingenerale::where('dependencia_tolhuin_id', 14)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();
        $sumaTotalPc = Tolhuingenerale::where('tipodispositivo_id', 3)
            ->whereIn('dependencia_tolhuin_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14])
            ->count();

        return view('livewire.informatica.tolhuin.create-tolhuin-general', compact(
            //---
            'OtrasPc',
            'sumaTotalPc',
            'tolhuinotros',
            'tolhuinPc',
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

            //------
            'generootros',
            'generoPc',
            'Pcjefegenero',
            'Pcsubjefegenero',
            'Pcofserviciogenero',
            'Pcsumariantegenero',
            'SuboficialesPcgenero',
            'JefeTurnoPcgenero',
            'ServiciosExternosPcgenero',
            'Pcguardiagenero',
            'Pcdediagenero',
            'Pcadministrativagenero',
            'Pcautomotoresgenero',
            'impresoraChorrogenero',
            'impresoraLasergenero',
            'switchgenero',
            'rutergenero',
            'camarasgenero',
            'servidorgenero',
            'centralTelefonicagenero',
            'telefonoFijogenero',

            //----
            'cientotros',
            'cientPc',
            'Pcjefecient',
            'Pcsubjefecient',
            'Pcofserviciocient',
            'Pcsumariantecient',
            'SuboficialesPccient',
            'JefeTurnoPccient',
            'Pcguardiacient',
            'Pcadministrativacient',
            'impresoraChorrocient',
            'impresoraLasercient',
            'switchcient',
            'rutercient',
            'camarascient',
            'servidorcient',
            'centralTelefonicacient',
            'telefonoFijocient',

            //----
            'direccionotros',
            'direccionPc',
            'Pcjefedireccion',
            'Pcofserviciodireccion',
            'SuboficialesPcdireccion',
            'JefeTurnoPcdireccion',
            'Pcadministrativadireccion',
            'impresoraChorrodireccion',
            'impresoraLaserdireccion',
            'switchdireccion',
            'ruterdireccion',
            'camarasdireccion',
            'servidordireccion',
            'centralTelefonicadireccion',
            'telefonoFijodireccion',

            //----
            'invesotros',
            'invesPc',
            'Pcjefeinves',
            'Pcsubjefeinves',
            'Pcofservicioinves',
            'SuboficialesPcinves',
            'JefeTurnoPcinves',
            'Pcguardiainves',
            'Pcadministrativainves',
            'impresoraChorroinves',
            'impresoraLaserinves',
            'switchinves',
            'ruterinves',
            'camarasinves',
            'servidorinves',
            'centralTelefonicainves',
            'telefonoFijoinves',

            //----
            'narcootros',
            'narcoPc',
            'Pcjefenarco',
            'Pcsubjefenarco',
            'Pcofservicionarco',
            'Pcsumariantenarco',
            'SuboficialesPcnarco',
            'JefeTurnoPcnarco',
            'Pcguardianarco',
            'Pcadministrativanarco',
            'impresoraChorronarco',
            'impresoraLasernarco',
            'switchnarco',
            'ruternarco',
            'camarasnarco',
            'servidornarco',
            'centralTelefonicanarco',
            'telefonoFijonarco',


            //----
            'compotros',
            'compPc',
            'Pcjefecomp',
            'Pcsubjefecomp',
            'Pcofserviciocomp',
            'Pcsumariantecomp',
            'SuboficialesPccomp',
            'JefeTurnoPccomp',
            'Pcguardiacomp',
            'Pcadministrativacomp',
            'impresoraChorrocomp',
            'impresoraLasercomp',
            'switchcomp',
            'rutercomp',
            'camarascomp',
            'servidorcomp',
            'centralTelefonicacomp',
            'telefonoFijocomp',


            //----
            'ruralotros',
            'ruralPc',
            'Pcjeferural',
            'Pcsubjeferural',
            'Pcofserviciorural',
            'Pcsumarianterural',
            'SuboficialesPcrural',
            'JefeTurnoPcrural',
            'Pcguardiarural',
            'Pcadministrativarural',
            'impresoraChorrorural',
            'impresoraLaserrural',
            'switchrural',
            'ruterrural',
            'camarasrural',
            'servidorrural',
            'centralTelefonicarural',
            'telefonoFijorural',


            //----
            'tepiotros',
            'tepiPc',
            'Pcguardiatepi',
            'impresoraChorrotepi',
            'impresoraLasertepi',
            'switchtepi',
            'rutertepi',
            'camarastepi',
            'servidortepi',
            'centralTelefonicatepi',
            'telefonoFijotepi',


            //----
            'michiotros',
            'michiPc',
            'Pcguardiamichi',
            'impresoraChorromichi',
            'impresoraLasermichi',
            'switchmichi',
            'rutermichi',
            'camarasmichi',
            'servidormichi',
            'centralTelefonicamichi',
            'telefonoFijomichi',


            //----
            'lagootros',
            'lagoPc',
            'Pcguardialago',
            'impresoraChorrolago',
            'impresoraLaserlago',
            'switchlago',
            'ruterlago',
            'camaraslago',
            'servidorlago',
            'centralTelefonicalago',
            'telefonoFijolago',

            //----
            'rutaotros',
            'rutaPc',
            'Pcguardiaruta',
            'impresoraChorroruta',
            'impresoraLaserruta',
            'switchruta',
            'ruterruta',
            'camarasruta',
            'servidorruta',
            'centralTelefonicaruta',
            'telefonoFijoruta',
        ));
    }
}
