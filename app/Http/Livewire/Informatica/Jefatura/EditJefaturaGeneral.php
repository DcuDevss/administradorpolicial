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
use App\Models\AuditoriaInventarioJefatura;
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

class EditJefaturaGeneral extends Component
{

    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];

    public $JEfA = [];
    public $ADministracion = [];
    public $INvestigacione = [];
    public $Recurso_Humano = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale=[];

    public $jefatura,$codigo_qr, $generalinformatica,$administraciongenerale_id,$investigacionesgenerale_id,$custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $softwares_instalados,$serviciosespeciale_id,$investigacione_id,$administracion_id,$custodiagubernamentale_id,$recurso_humano_id,$destacamento_id,$jefatura_id,$comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
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
        'softwares_instalados' => 'nullable',
    ];

    public function mount(JefaturaGenerale $jefatura)
    {
       /* $this->cantidadram_id = "";
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
        $this->custodiagubernamentale_id='';*/

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();

        $this->JEfA = Jefatura::all();
       // $this->ADministracion = Administracion::all();
        //$this->INvestigacione = Investigacione::all();
        //$this->Recurso_Humano = RecursoHumano::all();
        //$this->DEstacamento = Destacamento::all();
        //$this->SErviciosespeciale = Serviciosespeciale::all();
        //$this->CUstodiagubernamentale = Custodiagubernamentale::all();
        //------------------------------------

       /* $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->ADministracion = Administracion::all();*/


        $this->jefatura = $jefatura;
        $this->cantidadram_id = $jefatura->cantidadram_id ?? '';
        $this->tipodeoficina_id = $jefatura->tipodeoficina_id ?? '';
        $this->tipodispositivo_id = $jefatura->tipodispositivo_id ?? '';
        $this->slotmemoria_id = $jefatura->slotmemoria_id ?? '';

        //$this->dependencia_ushuaia_id = $jefatura->dependencia_ushuaia_id ?? '';
        //$this->serviciosespeciale_id = $jefatura->serviciosespeciale_id ?? '';
        //$this->custodiagubernamentale_id = $jefatura->custodiagubernamentale_id ?? '';
        $this->jefatura_id = $jefatura->jefatura_id ?? '';
       // $this->destacamento_id = $jefatura->destacamento_id ?? '';


        $this->modelo = $jefatura->modelo ?? '';
        $this->marca = $jefatura->marca ?? '';
        $this->procesador = $jefatura->procesador ?? '';
        $this->cant_almacenamiento = $jefatura->cant_almacenamiento ?? '';
        $this->tipo_ram = $jefatura->tipo_ram ?? '';
        $this->sistema_operativo = $jefatura->sistema_operativo ?? '';
        $this->tipo_disco = $jefatura->tipo_disco ?? '';
        $this->tipo_teclado = $jefatura->tipo_teclado ?? '';
        $this->tipo_mouse = $jefatura->tipo_mouse ?? '';
        $this->fecha_inventario = $jefatura->fecha_inventario  ? Carbon::parse($jefatura->fecha_inventario)->format('Y-m-d') : '';
        $this->fecha_service = $jefatura->fecha_service ? Carbon::parse($jefatura->fecha_service)->format('Y-m-d') : '';
        $this->tipo_service = $jefatura->tipo_service ?? '';
        $this->softwares_instalados = $jefatura->softwares_instalados ?? '';
        $this->detalles_inventario = $jefatura->detalles_inventario ?? '';
        $this->activo = $jefatura->activo ?? '';


    }

    public function edit()
    {
        $this->validate();

        $this->jefatura->tipodispositivo_id = $this->tipodispositivo_id ?: null;
        $this->jefatura->cantidadram_id = $this->cantidadram_id ?: null;
        $this->jefatura->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->jefatura->jefatura_id = $this->jefatura_id ?: null;
        //$this->administracion->cientifica_id = $this->cientifica_id ?: null;

        $this->jefatura->marca = $this->marca ?: null;
        $this->jefatura->modelo= $this->modelo ?: null;
        $this->jefatura->procesador= $this->procesador ?: null;
        $this->jefatura->fecha_service= $this->fecha_service ?: null;
        $this->jefatura->tipo_service= $this->tipo_service ?: null;
        $this->jefatura->fecha_inventario= $this->fecha_inventario ?: null;
        $this->jefatura->detalles_inventario= $this->detalles_inventario ?: null;
        $this->jefatura->tipo_ram= $this->tipo_ram ?: null;
        $this->jefatura->tipo_disco= $this->tipo_disco ?: null;
        $this->jefatura->cant_almacenamiento= $this->cant_almacenamiento ?: null;
        $this->jefatura->tipo_mouse= $this->tipo_mouse ?: null;
        $this->jefatura->tipo_teclado= $this->tipo_teclado ?: null;
        $this->jefatura->softwares_instalados= $this->softwares_instalados ?: null;
        AuditoriaInventarioJefatura::create([
        'jefaturagenerale_id' => $this->jefatura->id,
        'detalles_inventario'   => $this->detalles_inventario,
        'user_id'               => auth()->id(),
        'ip_address'            => request()->ip(),
        'user_agent'            => request()->userAgent(),
        ]);

        $this->jefatura->save();

        // Generar el código QR después de guardar los cambios
        $this->generateQRCode();

        session()->flash('message', 'Datos actualizados correctamente.');
    }

    private function generateQRCode()
    {
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
        $jefatura_poli = $this->jefatura_id ? Jefatura::find($this->jefatura_id)->nombre : null;
       // $cientifica_poli = $this->cientifica_id ? Cientifica::find($this->cientifica_id)->nombre : null;


        $codigoQRData = 'Nro de identificacion: ' . $this->jefatura->id . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Jefatura: ' . $jefatura_poli . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram .  ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Softwares Instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
        $nombreImagenQR = 'codigo_qr_' . $this->jefatura->id . '.png';
        $rutaImagenQR = 'public/codigoQR/Jefatura/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        $this->jefatura->update([
            'codigo_qr' => $nombreImagenQR,
        ]);

       // $qrFolder = 'public/codigoQR/Dep.operativas/';

       /* if ($dependenciaUshuaia) {
             if ($custodiaGubernamentale) {
                $qrFolder;
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Custodia gubernamental: ' . $custodiaGubernamentale .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento .  ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } elseif ($serviciosespeciale_poli) {
                $qrFolder;
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Servicios especiales: ' . $serviciosespeciale_poli .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            }elseif($destacamento_poli){
                $qrFolder;
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia . ' - Tipo de oficina: ' . $tipoOficina . ' -Destacamentos: ' . $destacamento_poli . ' - Fecha del inventario: '  . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } else {
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia . ' - Tipo de oficina: ' . $tipoOficina . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            }
        }*/

        //$codigoQRData = 'Nro de identificacion: ' . $this->generalinformatica->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Cientifica: ' . $cienTifica .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Tipo de monitor: ' . $this->monitor . ' - Tipo de impresora: ' . $this->tipo_impresora . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;

       /* $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
        $nombreImagenQR = 'codigo_qr_' . $this->general->id . '.png';
        $rutaImagenQR = $qrFolder . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);*/

        // Actualiza el campo "codigo_qr" en el modelo Generalinformatica
       /* $this->general->update([
            'codigo_qr' => $nombreImagenQR,
        ]);*/

    }







    public function render()
    {
        return view('livewire.informatica.jefatura.edit-jefatura-general');
    }
}
