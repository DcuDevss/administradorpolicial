<?php

namespace App\Http\Livewire\Informatica\Administracion;

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
use App\Models\AuditoriaInventarioAdministracion;
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

class EditAdministracionGeneral extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];

    public $JEfatura = [];
    public $INvestigaciones = [];
    public $CIentifica = [];
    public $ADministracion = [];
    //public $INvestigacione = [];
    //public $ADministracion = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $inve, $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
       $administracion,$cientifica_id, $softwares_instalados,$serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $investigaciones, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,


    protected $rules = [

        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',

        'administracion_id' => 'nullable',
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

    public function mount(Administraciongenerale $administracion)
    {

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->ADministracion = Administracion::all();
        //$this->CIentifica = Cientifica::all();

        /*$this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
        $this->CUstodiagubernamentale = Custodiagubernamentale::all();
        $this->INvestigaciones = Investigacione::all();*/

        $this->administracion = $administracion;
        $this->cantidadram_id = $administracion->cantidadram_id ?? '';
        $this->tipodeoficina_id = $administracion->tipodeoficina_id ?? '';
        $this->tipodispositivo_id = $administracion->tipodispositivo_id ?? '';
        $this->slotmemoria_id = $administracion->slotmemoria_id ?? '';

       // $this->dependencia_ushuaia_id = $administracion->dependencia_ushuaia_id ?? '';
       // $this->serviciosespeciale_id = $administracion->serviciosespeciale_id ?? '';
        $this->administracion_id = $administracion->administracion_id ?? '';
       // $this->cientifica_id = $general->cientifica_id ?? '';
       // $this->destacamento_id = $administracion->destacamento_id ?? '';


        $this->modelo = $administracion->modelo ?? '';
        $this->marca = $administracion->marca ?? '';
        $this->procesador = $administracion->procesador ?? '';
        $this->cant_almacenamiento = $administracion->cant_almacenamiento ?? '';
        $this->tipo_ram = $administracion->tipo_ram ?? '';
        $this->sistema_operativo = $administracion->sistema_operativo ?? '';
        $this->tipo_disco = $administracion->tipo_disco ?? '';
        $this->tipo_teclado = $administracion->tipo_teclado ?? '';
        $this->tipo_mouse = $administracion->tipo_mouse ?? '';
        $this->fecha_inventario = $administracion->fecha_inventario  ? Carbon::parse($administracion->fecha_inventario)->format('Y-m-d') : '';
        $this->fecha_service = $administracion->fecha_service ? Carbon::parse($administracion->fecha_service)->format('Y-m-d') : '';
        $this->tipo_service = $administracion->tipo_service ?? '';
        $this->softwares_instalados = $administracion->softwares_instalados ?? '';
        $this->detalles_inventario = $administracion->detalles_inventario ?? '';
        $this->activo = $administracion->activo ?? '';
    }

    public function edit()
    {
        $this->validate();

        $this->administracion->tipodispositivo_id = $this->tipodispositivo_id ?: null;
        $this->administracion->cantidadram_id = $this->cantidadram_id ?: null;
        $this->administracion->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->administracion->administracion_id = $this->administracion_id ?: null;
        //$this->administracion->cientifica_id = $this->cientifica_id ?: null;

        $this->administracion->marca = $this->marca ?: null;
        $this->administracion->modelo= $this->modelo ?: null;
        $this->administracion->procesador= $this->procesador ?: null;
        $this->administracion->fecha_service= $this->fecha_service ?: null;
        $this->administracion->tipo_service= $this->tipo_service ?: null;
        $this->administracion->fecha_inventario= $this->fecha_inventario ?: null;
        $this->administracion->detalles_inventario= $this->detalles_inventario ?: null;
        $this->administracion->tipo_ram= $this->tipo_ram ?: null;
        $this->administracion->tipo_disco= $this->tipo_disco ?: null;
        $this->administracion->cant_almacenamiento= $this->cant_almacenamiento ?: null;
        $this->administracion->tipo_mouse= $this->tipo_mouse ?: null;
        $this->administracion->tipo_teclado= $this->tipo_teclado ?: null;
        $this->administracion->softwares_instalados= $this->softwares_instalados ?: null;
        AuditoriaInventarioAdministracion::create([
        'administraciongenerale_id' => $this->administracion->id,
        'detalles_inventario'   => $this->detalles_inventario,
        'user_id'               => auth()->id(),
        'ip_address'            => request()->ip(),
        'user_agent'            => request()->userAgent(),
        ]);

        $this->administracion->save();

        // Generar el código QR después de guardar los cambios
        $this->generateQRCode();
        $this->dispatchBrowserEvent('notificacion', [
        'type' => 'success',
        'message' => 'Datos Editados correctamente.'
        ]);
    }

    private function generateQRCode()
{
    $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
    $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
    $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
    $administracion_poli = $this->administracion_id ? Administracion::find($this->administracion_id)->nombre : null;
   // $cientifica_poli = $this->cientifica_id ? Cientifica::find($this->cientifica_id)->nombre : null;


    $codigoQRData = 'Nro de identificacion: ' . $this->administracion->id . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Administracion: ' . $administracion_poli . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram .  ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Softwares Instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
    $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
    $nombreImagenQR = 'codigo_qr_' . $this->administracion->id . '.png';
    $rutaImagenQR = 'public/codigoQR/Administracion/' . $nombreImagenQR;
    Storage::put($rutaImagenQR, $codigoQR);

    $this->administracion->update([
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
        return view('livewire.informatica.administracion.edit-administracion-general');
    }
}
