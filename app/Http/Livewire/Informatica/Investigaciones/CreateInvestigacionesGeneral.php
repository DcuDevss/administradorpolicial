<?php

namespace App\Http\Livewire\Informatica\Investigaciones;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\GeneralInformatica; // Ajusta la ruta del modelo según tu estructura
use App\Models\Investigacionesgenerale; // Ajusta la ruta del modelo según tu estructura
use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\Cientifica;
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

class CreateInvestigacionesGeneral extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];

    public $JEfatura = [];
    public $CIentifica = [];
    public $ADministracion = [];
    public $INvestigacione = [];
    public $Recurso_Humano = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $inve, $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $cientifica_id, $softwares_instalados, $serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $investigaciones, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,

    protected $rules = [
        //'tipodeoficina_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',
        //'dependencia_ushuaia_id' => 'nullable',

        //'destacamento_id' => 'nullable',
        // 'jefatura_id' => 'nullable',
        //'destacamento_id' => 'nullable',
        'investigacione_id' => 'nullable',
        //'recurso_humano_id' => 'nullable',
        //'serviciosespeciale_id' => 'nullable',
        //'custodiagubernamentale_id' => 'nullable',
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
        //$this->tipodeoficina_id = "";
        $this->tipodispositivo_id = "";
        $this->slotmemoria_id = "";
        // $this->dependencia_ushuaia_id = "";

        //$this->jefatura_id = "";
        $this->cientifica_id = "";
        //$this->administracion_id = "";
        //$this->recurso_humano_id = "";
        //$this->destacamento_id = "";
        $this->investigacione_id = "";
        //$this->serviciosespeciale_id = '';
        //$this->custodiagubernamentale_id = '';

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();

        $this->JEfatura = Jefatura::all();
        $this->CIentifica = Cientifica::all();
        $this->ADministracion = Administracion::all();
        $this->INvestigacione = Investigacione::all();
        $this->Recurso_Humano = RecursoHumano::all();
        $this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
        $this->CUstodiagubernamentale = Custodiagubernamentale::all();
    }

    public function guardarinvestigaciones()
    {
        $this->validate();
        // DB::beginTransaction();
        //try {

        $this->investigaciones = new Investigacionesgenerale();
        // $this->tipodeoficina_id === null || $this->tipodeoficina_id === '' ? $this->admin->tipodeoficina_id = null : $this->admin->tipodeoficina_id = $this->tipodeoficina_id;
        $this->cantidadram_id === null || $this->cantidadram_id === '' ? $this->investigaciones->cantidadram_id = null : $this->investigaciones->cantidadram_id = $this->cantidadram_id;
        $this->slotmemoria_id === null || $this->slotmemoria_id === '' ? $this->investigaciones->slotmemoria_id = null : $this->investigaciones->slotmemoria_id = $this->slotmemoria_id;
        $this->tipodispositivo_id === null || $this->tipodispositivo_id === '' ? $this->investigaciones->tipodispositivo_id = null : $this->investigaciones->tipodispositivo_id = $this->tipodispositivo_id;
        $this->cientifica_id === null || $this->cientifica_id === '' ? $this->investigaciones->cientifica_id = null : $this->investigaciones->cientifica_id = $this->cientifica_id;
        $this->investigacione_id === null || $this->investigacione_id === '' ? $this->investigaciones->investigacione_id = null : $this->investigaciones->investigacione_id = $this->investigacione_id;
        $this->investigaciones->marca = $this->marca;
        $this->investigaciones->modelo = $this->modelo;
        $this->investigaciones->procesador = $this->procesador;
        $this->investigaciones->cant_almacenamiento = $this->cant_almacenamiento;
        $this->investigaciones->tipo_ram = $this->tipo_ram;
        $this->investigaciones->sistema_operativo = $this->sistema_operativo;
        $this->investigaciones->tipo_disco = $this->tipo_disco;
        $this->investigaciones->tipo_teclado = $this->tipo_teclado;
        $this->investigaciones->tipo_mouse = $this->tipo_mouse;
        $this->investigaciones->fecha_inventario = $this->fecha_inventario;
        $this->investigaciones->fecha_service = $this->fecha_service;
        $this->investigaciones->tipo_service = $this->tipo_service;
        $this->investigaciones->softwares_instalados = $this->softwares_instalados;
        $this->investigaciones->detalles_inventario = $this->detalles_inventario;
        /* $this->investigaciones->activo = $this->activo; */
        $this->investigaciones->activo = $this->activo = $this->activo ? 1 : 0;

        $this->investigaciones->save();


        $investigaciones_poli = $this->investigacione_id ? Investigacione::find($this->investigacione_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
        $cientifica_poli = $this->cientifica_id ? Cientifica::find($this->cientifica_id)->nombre : null;
        // $sumario_poli = $this->sumario_id ? Sumario::find($this->sumario_id)->nombre : null;

        $codigoQRData = ' Nro de indentificacion: ' . $this->investigaciones->id .  ' - Fecha del inventario: ' . $this->fecha_inventario . //' - Tipo de oficina: ' . $tipoOficina .
            ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Investigaciones: ' . $investigaciones_poli .   ' Of. Cientifica: '
            . $cientifica_poli . //' - Sumario: ' . $sumario_poli . ' - Investigaciones: ' . $investigacione_poli . ' - Recursos Humanos: ' . $recurso_humano_poli . ' - Destacamentos: ' . $destacamento_poli . ' - Servicios Especiales: ' . $serviciosespeciale_poli .                                ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' .
            $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' Slot de memoria: ' . $slotMemoria .
            ' - Tipo de Ram: ' . $this->tipo_ram . ' - Cantidad de Ram: ' . $cantidadRam . ' -tipo de disco ' . $this->tipo_disco . ' -Cantidad de Almacenamiento: ' . $this->cant_almacenamiento .
            //' - Tipo de Teclado: ' . $this->tipo_teclado . ' - Tipo de mouse: ' . $this->tipo_mouse .
            ' - Detalles del inventario: ' . $this->detalles_inventario . ' -La computadora se encuentra: ' . $this->activo . ' -Ultima fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service;

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->investigaciones->id . '.png';
        $rutaImagenQR = 'public/codigoQR/Investigaciones/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        //' -Tipo de monitor: ' . $this->monitor .' - Tipo de Impresora: ' . $this->tipo_impresora .
        // Actualizar el campo "codigo_qr" en el modelo ComisariaPrimera
        $this->investigaciones->codigo_qr = $nombreImagenQR;
        $this->investigaciones->save();





        session()->flash('message', 'Datos guardados correctamente.');

        // DB::commit();
        //$this->clearForm();

        /* } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }*/
    }

    public function showModal($button)
    {

        $this->modalContent = [];

        $this->button = $button;
        $this->showModal = true;

        switch ($button) {
            case 'Investigaciones':
                // Código para el caso 'Cria 1'
                break;
            case 'Cientifica':
                // Código para el caso 'Cria 2'
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
        $directorPc = Investigacionesgenerale::where('investigacione_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $segundoJefePc = Investigacionesgenerale::where('investigacione_id', 4)
            // ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $prontuarioPc = Investigacionesgenerale::where('investigacione_id', 5)
            //->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $reparPc = Investigacionesgenerale::where('investigacione_id', 6)
            // ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $judicialPc = Investigacionesgenerale::where('investigacione_id', 7)
            //->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $convenioPc = Investigacionesgenerale::where('investigacione_id', 8)
            // ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $guardiaPc = Investigacionesgenerale::where('investigacione_id', 9)
            // ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ciudadaniaPc = Investigacionesgenerale::where('investigacione_id', 10)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $delitoscomplejosPc = Investigacionesgenerale::where('investigacione_id', 11)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $narcocriminalidadPc = Investigacionesgenerale::where('investigacione_id', 12)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        /*$cientificaPc = Investigacionesgenerale::where('investigacione_id', 13)
        //->where('tipodeoficina_id', 10)
        ->where('tipodispositivo_id', 3)
        ->count();*/
        $detalprontuarioPc = Investigacionesgenerale::where('investigacione_id', 14)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $impresoraLaser = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 11)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $impresoraChorro = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 12)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $switch = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 13)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $ruter = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 14)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $camaras = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 16)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $servidor = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 18)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $centralTelefonica = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('tipodispositivo_id', 23)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $telefonoFijo = Investigacionesgenerale::
            //->where('tipodeoficina_id', 10)
            where('investigacione_id', 9)
            ->count();
        $SuboficialesPc = Investigacionesgenerale::
            //->where('tipodeoficina_id', 12)
            where('tipodispositivo_id', 3)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $ServiciosExternosPc = Investigacionesgenerale::
            //->where('tipodeoficina_id', 13)
            where('tipodispositivo_id', 3)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();
        $JefeTurnoPc = Investigacionesgenerale::
            //->where('tipodeoficina_id', 14)
            where('tipodispositivo_id', 3)
            ->whereIn('investigacione_id', [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 14])
            ->count();


        //-------- sumario-------------//
        $cientificaPc = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('recurso_humano_id',4)
            ->where('tipodispositivo_id', 3)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $impresoraLaserCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 11)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $impresoraChorroCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 12)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $switchCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 13)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $ruterCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 14)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $camarasCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 16)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $servidorCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 18)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $centralTelefonicaCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 23)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();
        $telefonoFijoCientifica = Investigacionesgenerale::where('investigacione_id', 13)
            //->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 9)
            ->whereIn('cientifica_id', [1, 3, 4, 5, 6, 7, 8])
            ->count();

        /* $sumaTotalPc = DB::table('generalinformaticas')
            ->where('tipodispositivo_id', 3)
            ->count() + DB::table('investigacionesgenerales')
            ->where('tipodispositivo_id', 3)
            ->count() + DB::table('administraciongenerales')
            ->where('tipodispositivo_id', 3)sumaTotalPc
            ->count();*/
        return view('livewire.informatica.investigaciones.create-investigaciones-general', compact(
            'directorPc',
            'segundoJefePc',
            'prontuarioPc',
            'reparPc',
            'judicialPc',
            'convenioPc',
            'guardiaPc',
            'ciudadaniaPc',
            'delitoscomplejosPc',
            'narcocriminalidadPc',
            'detalprontuarioPc',
            'impresoraLaser',
            'impresoraChorro',
            'switch',
            'ruter',
            'camaras',
            'servidor',
            'centralTelefonica',
            'telefonoFijo',
            'cientificaPc',
            'impresoraLaserCientifica',
            'impresoraChorroCientifica',
            'switchCientifica',
            'ruterCientifica',
            'camarasCientifica',
            'servidorCientifica',
            'centralTelefonicaCientifica',
            'telefonoFijoCientifica'
        ));
    }
}
