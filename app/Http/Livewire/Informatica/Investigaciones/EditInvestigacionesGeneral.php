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
use App\Models\AuditoriaDetalleInventario;
use App\Models\AuditoriaInventarioInvestigaciones;
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

class EditInvestigacionesGeneral extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];

    public $JEfatura = [];
    public $INVESTIGACIONE = [];
    public $CIentifica = [];
    public $ADministracion = [];
    //public $INvestigacione = [];
    public $Recurso_Humano = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $inve, $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
       $cientifica_id, $softwares_instalados,$serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $investigaciones, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,

    protected $rules = [

        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',

        'investigacione_id' => 'nullable',
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

    public function mount(Investigacionesgenerale $investigaciones)
    {

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();
        $this->CIentifica = Cientifica::all();

       // $this->DEstacamento = Destacamento::all();
       // $this->SErviciosespeciale = Serviciosespeciale::all();
       // $this->CUstodiagubernamentale = Custodiagubernamentale::all();
        $this->INVESTIGACIONE = Investigacione::all();

        $this->investigaciones = $investigaciones;
        $this->cantidadram_id = $investigaciones->cantidadram_id ?? '';
        $this->tipodeoficina_id = $investigaciones->tipodeoficina_id ?? '';
        $this->tipodispositivo_id = $investigaciones->tipodispositivo_id ?? '';
        $this->slotmemoria_id = $investigaciones->slotmemoria_id ?? '';

        $this->investigacione_id = $investigaciones->investigacione_id ?? '';
        //$this->serviciosespeciale_id = $investigaciones->serviciosespeciale_id ?? '';
       // $this->custodiagubernamentale_id = $investigaciones->custodiagubernamentale_id ?? '';
        $this->cientifica_id = $investigaciones->cientifica_id ?? '';
       // $this->destacamento_id = $investigaciones->destacamento_id ?? '';


        $this->modelo = $investigaciones->modelo ?? '';
        $this->marca = $investigaciones->marca ?? '';
        $this->procesador = $investigaciones->procesador ?? '';
        $this->cant_almacenamiento = $investigaciones->cant_almacenamiento ?? '';
        $this->tipo_ram = $investigaciones->tipo_ram ?? '';
        $this->sistema_operativo = $investigaciones->sistema_operativo ?? '';
        $this->tipo_disco = $investigaciones->tipo_disco ?? '';
        $this->tipo_teclado = $investigaciones->tipo_teclado ?? '';
        $this->tipo_mouse = $investigaciones->tipo_mouse ?? '';
        $this->fecha_inventario = $investigaciones->fecha_inventario  ? Carbon::parse($investigaciones->fecha_inventario)->format('Y-m-d') : '';
        $this->fecha_service = $investigaciones->fecha_service ? Carbon::parse($investigaciones->fecha_service)->format('Y-m-d') : '';
        $this->tipo_service = $investigaciones->tipo_service ?? '';
        $this->softwares_instalados = $investigaciones->softwares_instalados ?? '';
        $this->detalles_inventario = $investigaciones->detalles_inventario ?? '';
        $this->activo = $investigaciones->activo ?? '';
    }

    public function edit()
{
    $this->validate();

    $this->investigaciones->tipodispositivo_id = $this->tipodispositivo_id ?: null;
    $this->investigaciones->cantidadram_id = $this->cantidadram_id ?: null;
    $this->investigaciones->slotmemoria_id = $this->slotmemoria_id ?: null;
    $this->investigaciones->investigacione_id = $this->investigacione_id ?: null;
    $this->investigaciones->cientifica_id = $this->cientifica_id ?: null;

    $this->investigaciones->marca = $this->marca ?: null;
    $this->investigaciones->modelo= $this->modelo ?: null;
    $this->investigaciones->procesador= $this->procesador ?: null;
    $this->investigaciones->fecha_service= $this->fecha_service ?: null;
    $this->investigaciones->tipo_service= $this->tipo_service ?: null;
    $this->investigaciones->fecha_inventario= $this->fecha_inventario ?: null;
    $this->investigaciones->detalles_inventario= $this->detalles_inventario ?: null;
    $this->investigaciones->tipo_ram= $this->tipo_ram ?: null;
    $this->investigaciones->tipo_disco= $this->tipo_disco ?: null;
    $this->investigaciones->cant_almacenamiento= $this->cant_almacenamiento ?: null;
    $this->investigaciones->tipo_mouse= $this->tipo_mouse ?: null;
    $this->investigaciones->tipo_teclado= $this->tipo_teclado ?: null;
    $this->investigaciones->softwares_instalados= $this->softwares_instalados ?: null;
    AuditoriaInventarioInvestigaciones::create([
        'investigacionegenerale_id' => $this->investigaciones->id,
        'detalles_inventario'   => $this->detalles_inventario,
        'user_id'               => auth()->id(),
        'ip_address'            => request()->ip(),
        'user_agent'            => request()->userAgent(),
    ]);


    $this->investigaciones->save();

    // Generar el código QR después de guardar los cambioos
    $this->generateQRCode();

    session()->flash('message', 'Datos actualizados correctamente.');
}

private function generateQRCode()
{
    $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
    $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
    $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
    $investigaciones_poli = $this->investigacione_id ? Investigacione::find($this->investigacione_id)->nombre : null;
    $cientifica_poli = $this->cientifica_id ? Cientifica::find($this->cientifica_id)->nombre : null;


    $codigoQRData = 'Nro de identificacion: ' . $this->investigaciones->id . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Investigaciones: ' . $investigaciones_poli . ' -Of. Policia cientifica: ' . $cientifica_poli . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram .  ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Softwares Instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
    $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
    $nombreImagenQR = 'codigo_qr_' . $this->investigaciones->id . '.png';
    $rutaImagenQR = 'public/codigoQR/Investigaciones/' . $nombreImagenQR;
    Storage::put($rutaImagenQR, $codigoQR);

    $this->investigaciones->update([
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
        return view('livewire.informatica.investigaciones.edit-investigaciones-general');
    }
}
