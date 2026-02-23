<?php

namespace App\Http\Livewire\Dcrginfo\Riograndeinfo;

use App\Models\AuditoriaInventarioRiogrande;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;


use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\DependenciaRiogrande;
use App\Models\Riograndegenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Riogrande;

use App\Models\gubernamentalgenerale;
use App\Models\gubernamentale;
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

class CreateRiograndeGeneral extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Riogrande = [];

    public $JEfatura = [];
    public $Riogrande = [];
    public $INvestigacione = [];
    public $Recurso_Humano = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];


    public $codigo_qr, $riogrRiograndegenerale, $investigacionesgenerale_id, $gubernamentalgenerale_id, $dependencia_riogrande_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $softwares_instalados, $serviciosespeciale_id, $investigacione_id, $riogrande_id, $gubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $rg, $inve, $recursos, $jefa, $servicios;
    //$monitor,$tipo_impresora,

    protected $rules = [
        'dependencia_riogrande_id' => 'nullable',
        'tipodeoficina_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',
        'dependencia_riogrande_id' => 'nullable',

        'destacamento_id' => 'nullable',
        'jefatura_id' => 'nullable',
        'destacamento_id' => 'nullable',
        'investigacione_id' => 'nullable',
        'recurso_humano_id' => 'nullable',
        'serviciosespeciale_id' => 'nullable',
        'gubernamentale_id' => 'nullable',


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

        $this->dependencia_riogrande_id = "";
        $this->jefatura_id = "";
        $this->riogrande_id = "";
        $this->recurso_humano_id = "";
        $this->destacamento_id = "";
        $this->investigacione_id = "";
        $this->serviciosespeciale_id = '';
        $this->gubernamentale_id = '';

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Dependencia_Riogrande = DependenciaRiogrande::all();
        $this->Dependencia_Riogrande = DependenciaRiogrande::all();

        $this->JEfatura = Jefatura::all();
        $this->Riogrande = Riogrande::all();
        $this->INvestigacione = Investigacione::all();
        $this->Recurso_Humano = RecursoHumano::all();
        $this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
    }

    public function guardarriogrande()
    {
        $this->validate();
        // DB::beginTransaction();
        // try {

        $this->rg = new Riograndegenerale();
        $this->rg->tipodeoficina_id = ($this->tipodeoficina_id === null || $this->tipodeoficina_id === '') ? null : $this->tipodeoficina_id;
        $this->rg->cantidadram_id = ($this->cantidadram_id === null || $this->cantidadram_id === '') ? null : $this->cantidadram_id;
        $this->rg->slotmemoria_id = ($this->slotmemoria_id === null || $this->slotmemoria_id === '') ? null : $this->slotmemoria_id;
        $this->rg->tipodispositivo_id = ($this->tipodispositivo_id === null || $this->tipodispositivo_id === '') ? null : $this->tipodispositivo_id;
        $this->rg->dependencia_riogrande_id = ($this->dependencia_riogrande_id === null || $this->dependencia_riogrande_id === '') ? null : $this->dependencia_riogrande_id;
        $this->rg->riogrande_id = ($this->riogrande_id === null || $this->riogrande_id === '') ? null : $this->riogrande_id;
        $this->rg->marca = ($this->marca === null || $this->marca === '') ? null : $this->marca;
        $this->rg->modelo = ($this->modelo === null || $this->modelo === '') ? null : $this->modelo;
        $this->rg->procesador = ($this->procesador === null || $this->procesador === '') ? null : $this->procesador;
        $this->rg->cant_almacenamiento = ($this->cant_almacenamiento === null || $this->cant_almacenamiento === '') ? null : $this->cant_almacenamiento;
        $this->rg->tipo_ram = ($this->tipo_ram === null || $this->tipo_ram === '') ? null : $this->tipo_ram;
        $this->rg->sistema_operativo = ($this->sistema_operativo === null || $this->sistema_operativo === '') ? null : $this->sistema_operativo;
        $this->rg->tipo_disco = ($this->tipo_disco === null || $this->tipo_disco === '') ? null : $this->tipo_disco;
        $this->rg->tipo_teclado = ($this->tipo_teclado === null || $this->tipo_teclado === '') ? null : $this->tipo_teclado;
        $this->rg->tipo_mouse = ($this->tipo_mouse === null || $this->tipo_mouse === '') ? null : $this->tipo_mouse;
        $this->rg->fecha_inventario = ($this->fecha_inventario === null || $this->fecha_inventario === '') ? null : $this->fecha_inventario;
        $this->rg->fecha_service = ($this->fecha_service === null || $this->fecha_service === '') ? null : $this->fecha_service;
        $this->rg->tipo_service = ($this->tipo_service === null || $this->tipo_service === '') ? null : $this->tipo_service;
        $this->rg->detalles_inventario = ($this->detalles_inventario === null || $this->detalles_inventario === '') ? null : $this->detalles_inventario;
        $this->rg->softwares_instalados = ($this->softwares_instalados === null || $this->softwares_instalados === '') ? null : $this->softwares_instalados;
        $this->rg->activo = $this->activo = $this->activo ? 1 : 0;
        $this->rg->save();

        // Guardar el historial de ediciones si el campo detalles_inventario cambia
        if ($this->rg->isDirty('detalles_inventario')) {
            AuditoriaInventarioRiogrande::create([
                'riogrRiograndegenerale_id' => $this->rg->id,
                'detalles_inventario' => $this->rg->detalles_inventario,
            ]);
        }

        $dependencia_riogrande = $this->dependencia_riogrande_id ? DependenciaRiogrande::find($this->dependencia_riogrande_id)->nombre : null;
        $tipodeoficina = $this->tipodeoficina_id ? Tipodeoficina::find($this->tipodeoficina_id)->nombre : null;
        $rg_poli = $this->riogrande_id ? Riogrande::find($this->riogrande_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;

        $codigoQRData = ' Nro de indentificacion: ' . $this->rg->id .  ' - Fecha del inventario: ' . $this->fecha_inventario . //' - Tipo de oficina: ' . $tipoOficina .
            ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Riogrande: ' . $rg_poli . ' Softwares: ' . $this->softwares_instalados .  // ' - Jefatura: ' . $jefatura_poli . ' - Investigaciones: ' . $investigacione_poli . ' - Recursos Humanos: ' . $recurso_humano_poli . ' - Destacamentos: ' . $destacamento_poli . ' - Servicios Especiales: ' . $serviciosespeciale_poli .                                ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' .
            $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' Slot de memoria: ' . $slotMemoria . ' - Tipo de Ram: ' . $this->tipo_ram . ' - Cantidad de Ram: ' . $cantidadRam . ' -tipo de disco ' . $this->tipo_disco . ' -Cantidad de Almacenamiento: ' . $this->cant_almacenamiento .
            ' - Tipo de Teclado: ' . $this->tipo_teclado . ' - Tipo de mouse: ' . $this->tipo_mouse .
            ' - Detalles del inventario: ' . $this->detalles_inventario . ' -La computadora se encuentra: ' . $this->activo . ' -Ultima fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service;

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->rg->id . '.png';
        $rutaImagenQR = 'public/codigoQR/Riogrande/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        //' -Tipo de monitor: ' . $this->monitor .' - Tipo de Impresora: ' . $this->tipo_impresora .

        // Actualizar el campo "codigo_qr" en el modelo ComisariaPrimera
        $this->rg->codigo_qr = $nombreImagenQR;
        $this->rg->save();



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
            case 'Comisairia Primera R.G':
                // Código para el caso 'Cria 1'
                break;
            case 'Comisairia Segunda R.G':
                // Código para el caso 'Cria 2'
                break;
            case 'Comisairia Tercera R.G':
                // Código para el caso 'Cria 3'
                break;
            case 'Comisairia Cuarta R.G':
                // Código para el caso 'Cria 4'
                break;
            case 'Comisairia Quinta R.G':
                // Código para el caso 'Cria 5'
                break;
            case 'Comisaria de Genero y Familia R.G':
                // Código para el caso 'Cria GF'
                break;
            case 'D.S.E.R.G':
                // Código para el caso 'DSERG'
                break;
            case 'D.R.Z.N':
                // Código para el caso 'DRZN'
                break;
            case 'Escuela de Policia':
                // Código para el caso 'Escuela'
                break;
            case 'Repetidora Cerro Laucha':
                // Código para el caso 'Repetidora'
                break;
            case 'D.C.R.G':
                // Código para el caso 'Central Comunicaciones'
                break;
            case 'Investigaciones R.G':
                // Código para el caso 'Investigaciones'
                break;
            case 'Bienestar R.G':
                // Código para el caso 'Bienestar'
                break;
            case 'Brigada Narcocriminalidad R.G':
                // Código para el caso 'Narco'
                break;
            case 'Brigada Delitos Complejos R.G':
                // Código para el caso 'Complejos'
                break;
            case 'Automotores R.G':
                // Código para el caso 'Automotores'
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

        //---------Comisaria Primera R.G-------------//
        $primeraotros = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodispositivo_id', 1)
            ->count();
        $primeraPc = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitor = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebook = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbook = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celular = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tablet = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaser = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switch = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 14)
            ->count();
        $ups = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camaras = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacion = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidor = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizador = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auriculares = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cable = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tv = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonica = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo = Riograndegenerale::where('dependencia_riogrande_id', 3)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPc = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternosPc = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPc = Riograndegenerale::where('dependencia_riogrande_id', 3)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria segunda R.G-------------//
        $segundaotros = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodispositivo_id', 1)
            ->count();
        $segundaPc = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitor2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebook2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbook2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celular2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tablet2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaser2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switch2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 14)
            ->count();
        $ups2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camaras2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacion2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidor2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizador2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auriculares2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cable2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tv2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonica2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo2da = Riograndegenerale::where('dependencia_riogrande_id', 4)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 9)
            ->count();
        $Suboficiales2Pc = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos2Pc = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno2Pc = Riograndegenerale::where('dependencia_riogrande_id', 4)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria tercera R.G-------------//
        $terceraotros = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodispositivo_id', 1)
            ->count();
        $terceraPc = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitor3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebook3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbook3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celular3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tablet3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaser3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switch3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 14)
            ->count();
        $ups3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camaras3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacion3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidor3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizador3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auriculares3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cable3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tv3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonica3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo3da = Riograndegenerale::where('dependencia_riogrande_id', 5)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 9)
            ->count();
        $Suboficiales3Pc = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos3Pc = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno3Pc = Riograndegenerale::where('dependencia_riogrande_id', 5)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria cuarta R.G-------------//
        $cuartaotros = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodispositivo_id', 1)
            ->count();
        $cuartaPc = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitor4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebook4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbook4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celular4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tablet4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaser4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switch4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 14)
            ->count();
        $ups4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camaras4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacion4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidor4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizador4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auriculares4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cable4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tv4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonica4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo4da = Riograndegenerale::where('dependencia_riogrande_id', 6)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 9)
            ->count();
        $Suboficiales4Pc = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos4Pc = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno4Pc = Riograndegenerale::where('dependencia_riogrande_id', 6)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();


        //---------Comisaria quinta R.G-------------//
        $quintaotros = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodispositivo_id', 1)
            ->count();
        $quintaPc = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefe5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefe5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcofservicio5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsumariante5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcguardia5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcdedia5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcadministrativa5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcautomotores5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitor5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebook5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbook5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celular5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tablet5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaser5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorro5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switch5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruter5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 14)
            ->count();
        $ups5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camaras5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacion5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidor5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizador5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auriculares5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cable5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tv5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonica5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijo5da = Riograndegenerale::where('dependencia_riogrande_id', 7)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 9)
            ->count();
        $Suboficiales5Pc = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternos5Pc = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurno5Pc = Riograndegenerale::where('dependencia_riogrande_id', 7)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------Comisaria familia R.G-------------//
        $fliaotros = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodispositivo_id', 1)
            ->count();
        $fliaPc = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcjefeFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsubjefeFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcofservicioFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 5)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsumarianteFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 6)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcguardiaFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcdediaFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 8)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcadministrativaFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcautomotoresFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switchFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacionFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cableFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicaFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 9)
            ->count();
        $SuboficialesPCFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $ServiciosExternosPCFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $JefeTurnoPCFlia = Riograndegenerale::where('dependencia_riogrande_id', 8)
            ->where('tipodeoficina_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();

        //---------DSERG--------------------------//
        $serviciosotros = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 1)
            ->count();
        $serviciosPc = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcjefeServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcsubjefeServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcCanes = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcOpTacticas = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGrupoInfanteria = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcBusquedaRescate = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcSeccionExplosivos = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcAdministrativa = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switchServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacionServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cableServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicaServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoServicios = Riograndegenerale::where('dependencia_riogrande_id', 9)
            //->where('tipodeoficina_id', 9)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----DRZN
        $direccionotros = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 1)
            ->count();

        $direccionPc = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefedireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefedireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiadireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitordireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celulardireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabledireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrodireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 10)
            ->count();
        $switchdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estaciondireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidordireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadordireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cabledireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvdireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicadireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijodireccion = Riograndegenerale::where('dependencia_riogrande_id', 10)
            ->where('tipodispositivo_id', 9)
            ->count();
        $sumaTotalPcdireccion = Riograndegenerale::where('tipodispositivo_id', 3)
            ->whereIn('dependencia_riogrande_id', [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18])
            ->count();

        //-----Escuela de Policia
        $escuelaotros = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 1)
            ->count();

        $escuelaPc = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefeescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefeescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiaescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacionescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cableescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicaescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoescuela = Riograndegenerale::where('dependencia_riogrande_id', 11)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Repetidora Cerro Laucha
        $repetidoraotros = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 1)
            ->count();

        $repetidoraPc = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrorepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacionrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cablerepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvrepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicarepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijorepetidora = Riograndegenerale::where('dependencia_riogrande_id', 12)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Central R.G
        $centralotros = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 1)
            ->count();
        $centralPc = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefecentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefecentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiacentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLasercentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrocentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 13)
            ->count();
        $rutercentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upscentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarascentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacioncentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularescentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cablecentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvcentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicacentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijocentral = Riograndegenerale::where('dependencia_riogrande_id', 13)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Invertigaciones R.G
        $invesotros = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 1)
            ->count();

        $invesPc = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefeinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefeinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiainves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacioninves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cableinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicainves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoinves = Riograndegenerale::where('dependencia_riogrande_id', 14)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Bienestar R.G
        $bienestarotros = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 1)
            ->count();

        $bienestarPc = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefebienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefebienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiabienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrobienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacionbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cablebienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvbienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicabienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijobienestar = Riograndegenerale::where('dependencia_riogrande_id', 15)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Narco R.G
        $narcootros = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 1)
            ->count();

        $narcoPc = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefenarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefenarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardianarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitornarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebooknarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbooknarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLasernarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorronarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruternarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacionnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidornarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadornarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cablenarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvnarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicanarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijonarco = Riograndegenerale::where('dependencia_riogrande_id', 16)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Complejos R.G
        $delitootros = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 1)
            ->count();

        $delitoPc = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefedelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefedelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiadelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitordelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celulardelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorrodelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estaciondelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidordelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadordelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cabledelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvdelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicadelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijodelito = Riograndegenerale::where('dependencia_riogrande_id', 17)
            ->where('tipodispositivo_id', 9)
            ->count();

        //-----Automotores
        $autootros = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 1)
            ->count();

        $autoPc = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcjefeauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodeoficina_id', 3)
            ->where('tipodispositivo_id', 3)
            ->count();
        $Pcsubjefeauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodeoficina_id', 4)
            ->where('tipodispositivo_id', 3)
            ->count();
        $PcGuardiaauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodeoficina_id', 7)
            ->where('tipodispositivo_id', 3)
            ->count();
        $monitorauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 4)
            ->count();
        $notebookauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 5)
            ->count();
        $netbookauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 6)
            ->count();
        $celularauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 7)
            ->count();
        $tabletauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 8)
            ->count();
        $impresoraLaserauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 11)
            ->count();
        $impresoraChorroauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 11)
            ->count();
        $switchauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 13)
            ->count();
        $ruterauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 14)
            ->count();
        $upsauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 15)
            ->count();
        $camarasauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 16)
            ->count();
        $estacionauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 17)
            ->count();
        $servidorauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 18)
            ->count();
        $estabilizadorauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 19)
            ->count();
        $auricularesauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 20)
            ->count();
        $cableauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 21)
            ->count();
        $tvauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 22)
            ->count();
        $centralTelefonicaauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 23)
            ->count();
        $telefonoFijoauto = Riograndegenerale::where('dependencia_riogrande_id', 18)
            ->where('tipodispositivo_id', 9)
            ->count();

        //otras dependencias rg
        $OtrasPc = Riograndegenerale::where('dependencia_riogrande_id', 1)
            ->where('tipodispositivo_id', 3)
            ->count();

        $sumaTotalPc = Riograndegenerale::where('tipodispositivo_id', 3)
            ->whereIn('dependencia_riogrande_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18])
            ->count();


        return view('livewire.dcrginfo.riograndeinfo.create-riogrande-general', compact(
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
            'monitor',
            'notebook',
            'netbook',
            'celular',
            'tablet',
            'impresoraChorro',
            'impresoraLaser',
            'switch',
            'ruter',
            'ups',
            'camaras',
            'estacion',
            'servidor',
            'estabilizador',
            'auriculares',
            'cable',
            'tv',
            'centralTelefonica',
            'telefonoFijo',


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
            'monitor2da',
            'notebook2da',
            'netbook2da',
            'celular2da',
            'tablet2da',
            'impresoraChorro2da',
            'impresoraLaser2da',
            'switch2da',
            'ruter2da',
            'ups2da',
            'camaras2da',
            'estacion2da',
            'servidor2da',
            'estabilizador2da',
            'auriculares2da',
            'cable2da',
            'tv2da',
            'centralTelefonica2da',
            'telefonoFijo2da',

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
            'monitor3da',
            'notebook3da',
            'netbook3da',
            'celular3da',
            'tablet3da',
            'impresoraChorro3da',
            'impresoraLaser3da',
            'switch3da',
            'camaras3da',
            'ruter3da',
            'ups3da',
            'camaras3da',
            'estacion3da',
            'servidor3da',
            'estabilizador3da',
            'auriculares3da',
            'cable3da',
            'tv3da',
            'centralTelefonica3da',
            'telefonoFijo3da',

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
            'monitor4da',
            'notebook4da',
            'netbook4da',
            'celular4da',
            'tablet4da',
            'Pcautomotores4da',
            'impresoraChorro4da',
            'impresoraLaser4da',
            'switch4da',
            'ruter4da',
            'ups4da',
            'camaras4da',
            'estacion4da',
            'servidor4da',
            'estabilizador4da',
            'auriculares4da',
            'cable4da',
            'tv4da',
            'centralTelefonica4da',
            'telefonoFijo4da',

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
            'monitor5da',
            'notebook5da',
            'netbook5da',
            'celular5da',
            'tablet5da',
            'impresoraChorro5da',
            'impresoraLaser5da',
            'switch5da',
            'ruter5da',
            'ups5da',
            'camaras5da',
            'estacion5da',
            'servidor5da',
            'estabilizador5da',
            'auriculares5da',
            'cable5da',
            'tv5da',
            'centralTelefonica5da',
            'telefonoFijo5da',

            //-----
            'fliaotros',
            'fliaPc',
            'PcjefeFlia',
            'PcsubjefeFlia',
            'PcofservicioFlia',
            'PcsumarianteFlia',
            'SuboficialesPCFlia',
            'ServiciosExternosPCFlia',
            'JefeTurnoPCFlia',
            'PcguardiaFlia',
            'PcdediaFlia',
            'PcadministrativaFlia',
            'PcautomotoresFlia',
            'monitorFlia',
            'notebookFlia',
            'netbookFlia',
            'celularFlia',
            'tabletFlia',
            'impresoraChorroFlia',
            'impresoraLaserFlia',
            'switchFlia',
            'ruterFlia',
            'upsFlia',
            'camarasFlia',
            'estacionFlia',
            'servidorFlia',
            'estabilizadorFlia',
            'auricularesFlia',
            'cableFlia',
            'tvFlia',
            'centralTelefonicaFlia',
            'telefonoFijoFlia',


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
            'monitorServicios',
            'notebookServicios',
            'netbookServicios',
            'celularServicios',
            'tabletServicios',
            'impresoraChorroServicios',
            'impresoraLaserServicios',
            'switchServicios',
            'ruterServicios',
            'upsServicios',
            'camarasServicios',
            'estacionServicios',
            'servidorServicios',
            'estabilizadorServicios',
            'auricularesServicios',
            'cableServicios',
            'tvServicios',
            'centralTelefonicaServicios',
            'telefonoFijoServicios',

            //----------
            'direccionotros',
            'direccionPc',
            'Pcjefedireccion',
            'Pcsubjefedireccion',
            'PcGuardiadireccion',
            'monitordireccion',
            'notebookdireccion',
            'netbookdireccion',
            'celulardireccion',
            'tabledireccion',
            'impresoraChorrodireccion',
            'impresoraLaserdireccion',
            'switchdireccion',
            'ruterdireccion',
            'camarasdireccion',
            'upsdireccion',
            'estaciondireccion',
            'servidordireccion',
            'estabilizadordireccion',
            'auricularesdireccion',
            'cabledireccion',
            'tvdireccion',
            'centralTelefonicadireccion',
            'telefonoFijodireccion',
            'sumaTotalPcdireccion',

            //----------
            'escuelaotros',
            'escuelaPc',
            'Pcjefeescuela',
            'Pcsubjefeescuela',
            'PcGuardiaescuela',
            'monitorescuela',
            'notebookescuela',
            'netbookescuela',
            'celularescuela',
            'tabletescuela',
            'impresoraChorroescuela',
            'impresoraLaserescuela',
            'switchescuela',
            'ruterescuela',
            'upsescuela',
            'camarasescuela',
            'estacionescuela',
            'servidorescuela',
            'estabilizadorescuela',
            'auricularesescuela',
            'cableescuela',
            'tvescuela',
            'centralTelefonicaescuela',
            'telefonoFijoescuela',

            //-----
            'repetidoraotros',
            'repetidoraPc',
            'monitorrepetidora',
            'notebookrepetidora',
            'netbookrepetidora',
            'celularrepetidora',
            'tabletrepetidora',
            'impresoraChorrorepetidora',
            'impresoraLaserrepetidora',
            'switchrepetidora',
            'ruterrepetidora',
            'upsrepetidora',
            'camarasrepetidora',
            'estacionrepetidora',
            'servidorrepetidora',
            'estabilizadorrepetidora',
            'auricularesrepetidora',
            'cablerepetidora',
            'tvrepetidora',
            'centralTelefonicarepetidora',
            'telefonoFijorepetidora',

            //-----
            'centralotros',
            'centralPc',
            'Pcjefecentral',
            'Pcsubjefecentral',
            'PcGuardiacentral',
            'monitorcentral',
            'notebookcentral',
            'netbookcentral',
            'celularcentral',
            'tabletcentral',
            'impresoraChorrocentral',
            'impresoraLasercentral',
            'switchcentral',
            'rutercentral',
            'upscentral',
            'camarascentral',
            'estacioncentral',
            'servidorcentral',
            'estabilizadorcentral',
            'auricularescentral',
            'cablecentral',
            'tvcentral',
            'centralTelefonicacentral',
            'telefonoFijocentral',

            //-----
            'invesotros',
            'invesPc',
            'Pcjefeinves',
            'Pcsubjefeinves',
            'PcGuardiainves',
            'impresoraChorroinves',
            'impresoraLaserinves',
            'monitorinves',
            'notebookinves',
            'netbookinves',
            'celularinves',
            'tabletinves',
            'switchinves',
            'ruterinves',
            'upsinves',
            'camarasinves',
            'estacioninves',
            'servidorinves',
            'estabilizadorinves',
            'auricularesinves',
            'cableinves',
            'tvinves',
            'centralTelefonicainves',
            'telefonoFijoinves',

            //-----
            'bienestarotros',
            'bienestarPc',
            'Pcjefebienestar',
            'Pcsubjefebienestar',
            'PcGuardiabienestar',
            'monitorbienestar',
            'notebookbienestar',
            'netbookbienestar',
            'celularbienestar',
            'tabletbienestar',
            'impresoraChorrobienestar',
            'impresoraLaserbienestar',
            'switchbienestar',
            'ruterbienestar',
            'upsbienestar',
            'camarasbienestar',
            'estacionbienestar',
            'servidorbienestar',
            'estabilizadorbienestar',
            'auricularesbienestar',
            'cablebienestar',
            'tvbienestar',
            'centralTelefonicabienestar',
            'telefonoFijobienestar',

            //-----
            'narcootros',
            'narcoPc',
            'Pcjefenarco',
            'Pcsubjefenarco',
            'PcGuardianarco',
            'monitornarco',
            'notebooknarco',
            'netbooknarco',
            'celularnarco',
            'tabletnarco',
            'impresoraChorronarco',
            'impresoraLasernarco',
            'switchnarco',
            'ruternarco',
            'upsnarco',
            'camarasnarco',
            'estacionnarco',
            'servidornarco',
            'estabilizadornarco',
            'auricularesnarco',
            'cablenarco',
            'tvnarco',
            'centralTelefonicanarco',
            'telefonoFijonarco',

            //-----
            'delitootros',
            'delitoPc',
            'Pcjefedelito',
            'Pcsubjefedelito',
            'PcGuardiadelito',
            'monitordelito',
            'notebookdelito',
            'netbookdelito',
            'celulardelito',
            'tabletdelito',
            'impresoraChorrodelito',
            'impresoraLaserdelito',
            'switchdelito',
            'ruterdelito',
            'upsdelito',
            'camarasdelito',
            'estaciondelito',
            'servidordelito',
            'estabilizadordelito',
            'auricularesdelito',
            'cabledelito',
            'tvdelito',
            'centralTelefonicadelito',
            'telefonoFijodelito',

            //-----
            'autootros',
            'autoPc',
            'Pcjefeauto',
            'Pcsubjefeauto',
            'PcGuardiaauto',
            'monitorauto',
            'notebookauto',
            'netbookauto',
            'celularauto',
            'tabletauto',
            'impresoraChorroauto',
            'impresoraLaserauto',
            'switchauto',
            'ruterauto',
            'upsauto',
            'camarasauto',
            'estacionauto',
            'servidorauto',
            'estabilizadorauto',
            'auricularesauto',
            'cableauto',
            'tvauto',
            'centralTelefonicaauto',
            'telefonoFijoauto',

            //----
            'sumaTotalPc',
        ));
    }
}
