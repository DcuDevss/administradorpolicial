<?php

namespace App\Http\Livewire\Dcrginfo\Riograndeinfo;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;

use Illuminate\Support\Facades\DB;
use App\Models\GeneralInformatica; // Ajusta la ruta del modelo según tu estructura
use App\Models\Investigacionesgenerale; // Ajusta la ruta del modelo según tu estructura
use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\Cientifica;
use App\Models\DependenciaRiogrande;
use App\Models\DependenciaUshuaia;
use App\Models\Riograndegenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Riogrande;
use App\Models\AuditoriaDetalleInventario;
use App\Models\AuditoriaInventarioInvestigaciones;
use App\Models\AuditoriaInventarioRiogrande;
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

class EditRiograndeGeneral extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];
    public $Dependencia_Riogrande = [];

    public $JEfatura = [];
    public $INvestigaciones = [];
    public $CIentifica = [];
    public $Riogrande = [];
    //public $INvestigacione = [];
    //public $ADministracion = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $inve, $codigo_qr, $generalinformatica, $riograndegenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id,$dependencia_riogrande_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
       $riogrande,$cientifica_id, $softwares_instalados,$serviciosespeciale_id, $investigacione_id, $riogrande_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $investigaciones, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,


    protected $rules = [

        'dependencia_riogrande_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',

        'riogrande_id' => 'nullable',
        'cientifica_id'=>'nullable',


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

    public function mount(Riograndegenerale $riogrande)
    {
        $this->Dependencia_Riogrande = DependenciaRiogrande::all();
        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Riogrande = Riogrande::all();
        //$this->CIentifica = Cientifica::all();

        /*$this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
        $this->CUstodiagubernamentale = Custodiagubernamentale::all();
        $this->INvestigaciones = Investigacione::all();*/

        $this->riogrande = $riogrande;
        $this->dependencia_riogrande_id = $riogrande->dependencia_riogrande_id ?? '';
        $this->cantidadram_id = $riogrande->cantidadram_id ?? '';
        $this->tipodeoficina_id = $riogrande->tipodeoficina_id ?? '';
        $this->tipodispositivo_id = $riogrande->tipodispositivo_id ?? '';
        $this->slotmemoria_id = $riogrande->slotmemoria_id ?? '';

       // $this->dependencia_ushuaia_id = $administracion->dependencia_ushuaia_id ?? '';
       // $this->serviciosespeciale_id = $administracion->serviciosespeciale_id ?? '';
        $this->riogrande_id = $riogrande->riogrande_id ?? '';
       // $this->cientifica_id = $general->cientifica_id ?? '';
       // $this->destacamento_id = $administracion->destacamento_id ?? '';


        $this->modelo = $riogrande->modelo ?? '';
        $this->marca = $riogrande->marca ?? '';
        $this->procesador = $riogrande->procesador ?? '';
        $this->cant_almacenamiento = $riogrande->cant_almacenamiento ?? '';
        $this->tipo_ram = $riogrande->tipo_ram ?? '';
        $this->sistema_operativo = $riogrande->sistema_operativo ?? '';
        $this->tipo_disco = $riogrande->tipo_disco ?? '';
        $this->tipo_teclado = $riogrande->tipo_teclado ?? '';
        $this->tipo_mouse = $riogrande->tipo_mouse ?? '';
        $this->fecha_inventario = $riogrande->fecha_inventario  ? Carbon::parse($riogrande->fecha_inventario)->format('Y-m-d') : '';
        $this->fecha_service = $riogrande->fecha_service ? Carbon::parse($riogrande->fecha_service)->format('Y-m-d') : '';
        $this->tipo_service = $riogrande->tipo_service ?? '';
        $this->softwares_instalados = $riogrande->softwares_instalados ?? '';
        $this->detalles_inventario = $riogrande->detalles_inventario ?? '';
        $this->activo = $riogrande->activo ?? '';
    }

    public function edit()
    {
        $this->validate();

        $this->riogrande->dependencia_riogrande_id = $this->dependencia_riogrande_id ?: null;

        $this->riogrande->dependencia_riogrande_id = $this->dependencia_riogrande_id ?: null;
        $this->riogrande->tipodeoficina_id = $this->tipodeoficina_id ?: null;
        $this->riogrande->tipodispositivo_id      = $this->tipodispositivo_id ?: null;
        $this->riogrande->cantidadram_id = $this->cantidadram_id ?: null;
        $this->riogrande->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->riogrande->riogrande_id = $this->riogrande_id ?: null;
        //$this->administracion->cientifica_id = $this->cientifica_id ?: null;

        $this->riogrande->marca = $this->marca ?: null;
        $this->riogrande->modelo= $this->modelo ?: null;
        $this->riogrande->procesador= $this->procesador ?: null;
        $this->riogrande->fecha_service= $this->fecha_service ?: null;
        $this->riogrande->tipo_service= $this->tipo_service ?: null;
        $this->riogrande->fecha_inventario= $this->fecha_inventario ?: null;
        $this->riogrande->detalles_inventario= $this->detalles_inventario ?: null;
        $this->riogrande->tipo_ram= $this->tipo_ram ?: null;
        $this->riogrande->tipo_disco= $this->tipo_disco ?: null;
        $this->riogrande->cant_almacenamiento= $this->cant_almacenamiento ?: null;
        $this->riogrande->tipo_mouse= $this->tipo_mouse ?: null;
        $this->riogrande->tipo_teclado= $this->tipo_teclado ?: null;
        $this->riogrande->softwares_instalados= $this->softwares_instalados ?: null;
/*         AuditoriaInventarioRiogrande::create([
            'riograndegenerale_id' => $this->riogrande->id,
            'detalles_inventario'   => $this->detalles_inventario,
            'user_id'               => auth()->id(),
            'ip_address'            => request()->ip(),
            'user_agent'            => request()->userAgent(),
        ]);
 */
        $this->riogrande->save();

        // Generar el código QR después de guardar los cambios
        /* $this->generateQRCode(); */
        $this->dispatchBrowserEvent('notificacion', [
        'type' => 'success',
        'message' => 'Datos Editados correctamente.'
        ]);
    }

   /*  private function generateQRCode() */
/*{
    $dependencia_riogrande = $this->dependencia_riogrande_id ? Tipodispositivo::find($this->dependencia_riogrande_id)->nombre : null; */
    /* $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
    $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
    $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
    $riogrande_poli = $this->riogrande_id ? Riogrande::find($this->riogrande_id)->nombre : null; */
   // $cientifica_poli = $this->cientifica_id ? Cientifica::find($this->cientifica_id)->nombre : null;

/*
    $codigoQRData = 'Nro de identificacion: ' . $this->riogrande->id . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Riogrande: ' . $riogrande_poli . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram .  ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Softwares Instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
    $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
    $nombreImagenQR = 'codigo_qr_' . $this->riogrande->id . '.png';
    $rutaImagenQR = 'public/codigoQR/Riogrande/' . $nombreImagenQR;
    Storage::put($rutaImagenQR, $codigoQR);

    $this->riogrande->update([
        'codigo_qr' => $nombreImagenQR,
    ]); */

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
    ]);

}*/



    public function render()
    {
        return view('livewire.dcrginfo.riograndeinfo.edit-riogrande-general');
    }
}
