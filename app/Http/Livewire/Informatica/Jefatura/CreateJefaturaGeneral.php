<?php

namespace App\Http\Livewire\Informatica\Jefatura;

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

class CreateJefaturaGeneral extends Component
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

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

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

    public function guardarjefatura()
    {
        $this->validate();
        // DB::beginTransaction();
        // try {

        $this->jefa = new Jefaturagenerale();
        // $this->tipodeoficina_id === null || $this->tipodeoficina_id === '' ? $this->admin->tipodeoficina_id = null : $this->admin->tipodeoficina_id = $this->tipodeoficina_id;
        $this->cantidadram_id === null || $this->cantidadram_id === '' ? $this->jefa->cantidadram_id = null : $this->jefa->cantidadram_id = $this->cantidadram_id;
        $this->slotmemoria_id === null || $this->slotmemoria_id === '' ? $this->jefa->slotmemoria_id = null : $this->jefa->slotmemoria_id = $this->slotmemoria_id;
        $this->tipodispositivo_id === null || $this->tipodispositivo_id === '' ? $this->jefa->tipodispositivo_id = null : $this->jefa->tipodispositivo_id = $this->tipodispositivo_id;

        $this->jefatura_id === null || $this->jefatura_id === '' ? $this->jefa->jefatura_id = null : $this->jefa->jefatura_id = $this->jefatura_id;
        $this->jefa->marca = $this->marca;
        $this->jefa->modelo = $this->modelo;
        $this->jefa->procesador = $this->procesador;
        $this->jefa->cant_almacenamiento = $this->cant_almacenamiento;
        $this->jefa->tipo_ram = $this->tipo_ram;
        $this->jefa->sistema_operativo = $this->sistema_operativo;
        $this->jefa->tipo_disco = $this->tipo_disco;
        $this->jefa->tipo_teclado = $this->tipo_teclado;
        $this->jefa->tipo_mouse = $this->tipo_mouse;
        $this->jefa->fecha_inventario = $this->fecha_inventario;
        $this->jefa->fecha_service = $this->fecha_service;
        $this->jefa->tipo_service = $this->tipo_service;
        $this->jefa->softwares_instalados = $this->softwares_instalados;
        $this->jefa->detalles_inventario = $this->detalles_inventario;
        $this->jefa->softwares_instalados = $this->softwares_instalados;
        $this->jefa->activo = $this->activo = $this->activo ? 1 : 0;
        $this->jefa->save();


        $jefatura_poli = $this->jefatura_id ? Jefatura::find($this->jefatura_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;

        $codigoQRData = ' Nro de indentificacion: ' . $this->jefa->id .  ' - Fecha del inventario: ' . $this->fecha_inventario . //' - Tipo de oficina: ' . $tipoOficina .
            ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Investigaciones: ' . $jefatura_poli .   ' Softwares : ' . $this->softwares_instalados . //' - Jefatura: ' . $jefatura_poli . ' - Investigaciones: ' . $investigacione_poli . ' - Recursos Humanos: ' . $recurso_humano_poli . ' - Destacamentos: ' . $destacamento_poli . ' - Servicios Especiales: ' . $serviciosespeciale_poli .                                ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' .
            $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' Slot de memoria: ' . $slotMemoria . ' - Tipo de Ram: ' . $this->tipo_ram . ' - Cantidad de Ram: ' . $cantidadRam . ' -tipo de disco ' . $this->tipo_disco . ' -Cantidad de Almacenamiento: ' . $this->cant_almacenamiento .
            ' - Tipo de Teclado: ' . $this->tipo_teclado . ' - Tipo de mouse: ' . $this->tipo_mouse .
            ' - Detalles del inventario: ' . $this->detalles_inventario . ' -La computadora se encuentra: ' . $this->activo . ' -Ultima fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service;

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->jefa->id . '.png';
        $rutaImagenQR = 'public/codigoQR/Jefatura/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        //' -Tipo de monitor: ' . $this->monitor .' - Tipo de Impresora: ' . $this->tipo_impresora .

        // Actualizar el campo "codigo_qr" en el modelo ComisariaPrimera
        $this->jefa->codigo_qr = $nombreImagenQR;
        $this->jefa->save();



        session()->flash('message', 'Datos guardados correctamente.');

        //DB::commit();
        //$this->clearForm();

        // } catch (\Exception $e) {
        //  DB::rollback();
        // return $e->getMessage();
        //}
    }

    public function showModal($button)
    {

        $this->modalContent = [];

        $this->button = $button;
        $this->showModal = true;

        switch ($button) {
            case 'jefatura':
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
        $totalPc = Jefaturagenerale::where('tipodispositivo_id', 3)
            ->count();
        $jefePoliciaPc = Jefaturagenerale::where('jefatura_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $subjefePoliciaPc = Jefaturagenerale::where('jefatura_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $guardiaPc = Jefaturagenerale::where('jefatura_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $asesoriaPc = Jefaturagenerale::where('jefatura_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $analisisPc = Jefaturagenerale::where('jefatura_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $informacionPc = Jefaturagenerale::where('jefatura_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $scretariaPc = Jefaturagenerale::where('jefatura_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $DGRZS_Pc = Jefaturagenerale::where('jefatura_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $URS_Pc = Jefaturagenerale::where('jefatura_id', 11)
            ->where('tipodispositivo_id', 3)
            ->count();
        $subJefaturaPc = Jefaturagenerale::where('jefatura_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitor = Jefaturagenerale::where('tipodispositivo_id', 4)
            ->count();
        $notebook = Jefaturagenerale::where('tipodispositivo_id', 5)
            ->count();
        $netbook = Jefaturagenerale::where('tipodispositivo_id', 6)
            ->count();
        $celular = Jefaturagenerale::where('tipodispositivo_id', 7)
            ->count();
        $tablet = Jefaturagenerale::where('tipodispositivo_id', 8)
            ->count();
        $switch = Jefaturagenerale::where('tipodispositivo_id', 13)
            ->count();
        $ruter = Jefaturagenerale::where('tipodispositivo_id', 14)
            ->count();
        $ups = Jefaturagenerale::where('tipodispositivo_id', 15)
            ->count();
        $camaras = Jefaturagenerale::where('tipodispositivo_id', 16)
            ->count();
        $Estacion_trabajo = Jefaturagenerale::where('tipodispositivo_id', 17)
            ->count();
        $Estabilizador = Jefaturagenerale::where('tipodispositivo_id', 19)
            ->count();
        $Auriculares = Jefaturagenerale::where('tipodispositivo_id', 20)
            ->count();
        $Cable_estructurado = Jefaturagenerale::where('tipodispositivo_id', 21)
            ->count();
        $Tv = Jefaturagenerale::where('tipodispositivo_id', 22)
            ->count();
        $servidor = Jefaturagenerale::where('tipodispositivo_id', 18)
            ->count();
        $centralTelefonica = Jefaturagenerale::where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo = Jefaturagenerale::where('tipodispositivo_id', 9)
            ->count();
        $impresoraLaser = Jefaturagenerale::where('tipodispositivo_id', 11)
            ->count();
        $impresoraTinta = Jefaturagenerale::where('tipodispositivo_id', 12)
            ->count();



        return view('livewire.informatica.jefatura.create-jefatura-general', compact(
            'totalPc',
            'jefePoliciaPc',
            'subjefePoliciaPc',
            'asesoriaPc',
            'analisisPc',
            'informacionPc',
            'scretariaPc',
            'DGRZS_Pc',
            'URS_Pc',
            'subJefaturaPc',
            'guardiaPc',
            'monitor',
            'notebook',
            'netbook',
            'celular',
            'tablet',
            'ups',
            'switch',
            'ruter',
            'servidor',
            'camaras',
            'Estacion_trabajo',
            'Estabilizador',
            'Auriculares',
            'Cable_estructurado',
            'Tv',
            'centralTelefonica',
            'telefonoFijo',
            'impresoraLaser',
            'impresoraTinta'
        ));
    }
}
