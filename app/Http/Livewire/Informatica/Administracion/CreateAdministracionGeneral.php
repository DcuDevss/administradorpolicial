<?php

namespace App\Http\Livewire\Informatica\Administracion;

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

class CreateAdministracionGeneral extends Component
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

    public $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $softwares_instalados, $serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $inve, $recursos, $jefa, $servicios, $custodia;
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

    public function guardaradministracion()
    {
        $this->validate();
        // DB::beginTransaction();
        // try {

        $this->admin = new Administraciongenerale();
        // $this->tipodeoficina_id === null || $this->tipodeoficina_id === '' ? $this->admin->tipodeoficina_id = null : $this->admin->tipodeoficina_id = $this->tipodeoficina_id;
        $this->cantidadram_id === null || $this->cantidadram_id === '' ? $this->admin->cantidadram_id = null : $this->admin->cantidadram_id = $this->cantidadram_id;
        $this->slotmemoria_id === null || $this->slotmemoria_id === '' ? $this->admin->slotmemoria_id = null : $this->admin->slotmemoria_id = $this->slotmemoria_id;
        $this->tipodispositivo_id === null || $this->tipodispositivo_id === '' ? $this->admin->tipodispositivo_id = null : $this->admin->tipodispositivo_id = $this->tipodispositivo_id;

        $this->administracion_id === null || $this->administracion_id === '' ? $this->admin->administracion_id = null : $this->admin->administracion_id = $this->administracion_id;
        $this->admin->marca = $this->marca;
        $this->admin->modelo = $this->modelo;
        $this->admin->procesador = $this->procesador;
        $this->admin->cant_almacenamiento = $this->cant_almacenamiento;
        $this->admin->tipo_ram = $this->tipo_ram;
        $this->admin->sistema_operativo = $this->sistema_operativo;
        $this->admin->tipo_disco = $this->tipo_disco;
        $this->admin->tipo_teclado = $this->tipo_teclado;
        $this->admin->tipo_mouse = $this->tipo_mouse;
        $this->admin->fecha_inventario = $this->fecha_inventario;
        $this->admin->fecha_service = $this->fecha_service;
        $this->admin->tipo_service = $this->tipo_service;
        $this->admin->detalles_inventario = $this->detalles_inventario;
        $this->admin->softwares_instalados = $this->softwares_instalados;
        $this->admin->activo = $this->activo;
        $this->admin->save();


        $admin_poli = $this->administracion_id ? Administracion::find($this->administracion_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;

        $codigoQRData = ' Nro de indentificacion: ' . $this->admin->id .  ' - Fecha del inventario: ' . $this->fecha_inventario . //' - Tipo de oficina: ' . $tipoOficina .
            ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Administracion: ' . $admin_poli . ' Softwares: ' . $this->softwares_instalados .  // ' - Jefatura: ' . $jefatura_poli . ' - Investigaciones: ' . $investigacione_poli . ' - Recursos Humanos: ' . $recurso_humano_poli . ' - Destacamentos: ' . $destacamento_poli . ' - Servicios Especiales: ' . $serviciosespeciale_poli .                                ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' .
            $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' Slot de memoria: ' . $slotMemoria . ' - Tipo de Ram: ' . $this->tipo_ram . ' - Cantidad de Ram: ' . $cantidadRam . ' -tipo de disco ' . $this->tipo_disco . ' -Cantidad de Almacenamiento: ' . $this->cant_almacenamiento .
            ' - Tipo de Teclado: ' . $this->tipo_teclado . ' - Tipo de mouse: ' . $this->tipo_mouse .
            ' - Detalles del inventario: ' . $this->detalles_inventario . ' -La computadora se encuentra: ' . $this->activo . ' -Ultima fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service;

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->admin->id . '.png';
        $rutaImagenQR = 'public/codigoQR/Administracion/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        //' -Tipo de monitor: ' . $this->monitor .' - Tipo de Impresora: ' . $this->tipo_impresora .

        // Actualizar el campo "codigo_qr" en el modelo ComisariaPrimera
        $this->admin->codigo_qr = $nombreImagenQR;
        $this->admin->save();



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
            case 'administracion':
                // Código para el caso 'Cria 1'
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

        $totalPc = Administraciongenerale::where('tipodispositivo_id', 3)
            ->count();
        $directorPc = Administraciongenerale::where('administracion_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $subjefePc = Administraciongenerale::where('administracion_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $segurosPc = Administraciongenerale::where('administracion_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $adicionalPc = Administraciongenerale::where('administracion_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $comprasPc = Administraciongenerale::where('administracion_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $combustiblePc = Administraciongenerale::where('administracion_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $patrimonioPc = Administraciongenerale::where('administracion_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $juridicoPc = Administraciongenerale::where('administracion_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $tesoreriaPc = Administraciongenerale::where('administracion_id', 11)
            ->where('tipodispositivo_id', 3)
            ->count();
        $automotoresPc = Administraciongenerale::where('administracion_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $verificacionautomotoresPc = Administraciongenerale::where('administracion_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $armeriaPc = Administraciongenerale::where('administracion_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();
        $switch = Administraciongenerale::where('tipodispositivo_id', 13)
            ->count();
        $ruter = Administraciongenerale::where('tipodispositivo_id', 14)
            ->count();
        $camaras = Administraciongenerale::where('tipodispositivo_id', 16)
            ->count();
        $servidor = Administraciongenerale::where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica = Administraciongenerale::where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo = Administraciongenerale::where('tipodispositivo_id', 9)
            ->count();
        $telefonoInalambrico = Administraciongenerale::where('tipodispositivo_id', 10)
            ->count();

        $impresoraLaser = Administraciongenerale::where('tipodispositivo_id', 11)
            ->count();
        $impresoraTinta = Administraciongenerale::where('tipodispositivo_id', 12)
            ->count();



        return view('livewire.informatica.administracion.create-administracion-general', compact(
            'totalPc',
            'directorPc',
            'subjefePc',
            'segurosPc',
            'adicionalPc',
            'comprasPc',
            'combustiblePc',
            'patrimonioPc',
            'juridicoPc',
            'tesoreriaPc',
            'automotoresPc',
            'verificacionautomotoresPc',
            'armeriaPc',
            'switch',
            'ruter',
            'servidor',
            'camaras',
            'centralTelefonica',
            'telefonoFijo',
            'telefonoInalambrico',
            'impresoraLaser',
            'impresoraTinta'
        ));
    }
}
