<?php

namespace App\Http\Livewire\Informatica\Especiales;

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

class CreateServiciosespecialesGeneral extends Component
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
    public $CUstodiagubernamentale=[];

    public $codigo_qr, $generalinformatica,$administraciongenerale_id,$investigacionesgenerale_id,$custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $serviciosespeciale_id,$investigacione_id,$administracion_id,$custodiagubernamentale_id,$recurso_humano_id,$destacamento_id,$jefatura_id,$comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado,$admin,$inve,$recursos,$jefa,$servicios,$custodia;
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
        'custodiagubernamentale_id'=>'nullable',


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
        $this->serviciosespeciale_id ='';
        $this->custodiagubernamentale_id='';

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

    public function guardarserviciosespeciales()
    {
        $this->validate();
        DB::beginTransaction();
        try {

            $this->servicios = new Serviciosespecialesgenerale();
           // $this->tipodeoficina_id === null || $this->tipodeoficina_id === '' ? $this->admin->tipodeoficina_id = null : $this->admin->tipodeoficina_id = $this->tipodeoficina_id;
            $this->cantidadram_id === null || $this->cantidadram_id === '' ? $this->servicios->cantidadram_id = null : $this->servicios->cantidadram_id = $this->cantidadram_id;
            $this->slotmemoria_id === null || $this->slotmemoria_id === '' ? $this->servicios->slotmemoria_id = null : $this->servicios->slotmemoria_id = $this->slotmemoria_id;
            $this->tipodispositivo_id === null || $this->tipodispositivo_id === '' ? $this->servicios->tipodispositivo_id = null : $this->servicios->tipodispositivo_id = $this->tipodispositivo_id;

            $this->serviciosespeciale_id === null || $this->serviciosespeciale_id === '' ? $this->servicios->serviciosespeciale_id = null : $this->servicios->serviciosespeciale_id = $this->serviciosespeciale_id;
            $this->servicios->marca = $this->marca;
            $this->servicios->modelo = $this->modelo;
            $this->servicios->procesador = $this->procesador;
            $this->servicios->cant_almacenamiento = $this->cant_almacenamiento;
            $this->servicios->tipo_ram = $this->tipo_ram;
            $this->servicios->sistema_operativo = $this->sistema_operativo;
            $this->servicios->tipo_disco = $this->tipo_disco;
            $this->servicios->tipo_teclado = $this->tipo_teclado;
            $this->servicios->tipo_mouse = $this->tipo_mouse;
            $this->servicios->fecha_inventario = $this->fecha_inventario;
            $this->servicios->fecha_service = $this->fecha_service;
            $this->servicios->tipo_service = $this->tipo_service;
            $this->servicios->detalles_inventario = $this->detalles_inventario;
            $this->servicios->activo = $this->activo;
            $this->servicios->save();


            $servicios_poli = $this->serviciosespeciale_id ? Serviciosespeciale::find($this->serviciosespeciale_id)->nombre : null;
            $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
            $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
            $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;

            $codigoQRData = ' Nro de indentificacion: ' . $this->servicios->id .  ' - Fecha del inventario: ' . $this->fecha_inventario . //' - Tipo de oficina: ' . $tipoOficina .
                ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Investigaciones: ' . $servicios_poli . //  ' Dependencia: ' . $dependenciaUshuaia . ' - Jefatura: ' . $jefatura_poli . ' - Investigaciones: ' . $investigacione_poli . ' - Recursos Humanos: ' . $recurso_humano_poli . ' - Destacamentos: ' . $destacamento_poli . ' - Servicios Especiales: ' . $serviciosespeciale_poli .                                ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' .
                $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' Slot de memoria: ' . $slotMemoria . ' - Tipo de Ram: ' . $this->tipo_ram . ' - Cantidad de Ram: ' . $cantidadRam . ' -tipo de disco ' . $this->tipo_disco . ' -Cantidad de Almacenamiento: ' . $this->cant_almacenamiento .
                ' - Tipo de Teclado: ' . $this->tipo_teclado . ' - Tipo de mouse: ' . $this->tipo_mouse .
                ' - Detalles del inventario: ' . $this->detalles_inventario . ' -La computadora se encuentra: ' . $this->activo . ' -Ultima fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service;

            $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

            $nombreImagenQR = 'codigo_qr_' . $this->servicios->id . '.png';
            $rutaImagenQR = 'public/codigoQR/ServiciosEspeciales/' . $nombreImagenQR;
            Storage::put($rutaImagenQR, $codigoQR);

            //' -Tipo de monitor: ' . $this->monitor .' - Tipo de Impresora: ' . $this->tipo_impresora .

            // Actualizar el campo "codigo_qr" en el modelo ComisariaPrimera
            $this->servicios->codigo_qr = $nombreImagenQR;
            $this->servicios->save();



            session()->flash('message', 'Datos guardados correctamente.');

            DB::commit();
            //$this->clearForm();

       } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
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
        return view('livewire.informatica.especiales.create-serviciosespeciales-general');
    }
}
