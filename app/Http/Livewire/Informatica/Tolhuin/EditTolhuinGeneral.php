<?php

namespace App\Http\Livewire\Informatica\Tolhuin;

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
use App\Models\Tolhuingenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Tolhuin;
use App\Models\AuditoriaDetalleInventario;
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

class EditTolhuinGeneral extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];
    public $Dependencia_Tolhuin = [];

    public $JEfatura = [];
    public $INvestigaciones = [];
    public $CIentifica = [];
    public $TOlhuin = [];
    //public $INvestigacione = [];
    //public $ADministracion = [];
    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];

    public $inve, $codigo_qr, $generalinformatica, $tolhuingenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id,$dependencia_tolhuin_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
       $tolhuin,$cientifica_id, $softwares_instalados,$serviciosespeciale_id, $investigacione_id, $tolhuin_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $investigaciones, $recursos, $jefa, $servicios, $custodia;
    //$monitor,$tipo_impresora,


    protected $rules = [

        'dependencia_tolhuin_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',

        'tolhuin_id' => 'nullable',
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

    public function mount(Tolhuingenerale $tolhuin)
    {
        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->TOlhuin = Tolhuin::all();
        //$this->CIentifica = Cientifica::all();

        /*$this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
        $this->CUstodiagubernamentale = Custodiagubernamentale::all();
        $this->INvestigaciones = Investigacione::all();*/

        $this->tolhuin = $tolhuin;
        $this->dependencia_tolhuin_id = $tolhuin->dependencia_tolhuin_id ?? '';
        $this->cantidadram_id = $tolhuin->cantidadram_id ?? '';
        $this->tipodeoficina_id = $tolhuin->tipodeoficina_id ?? '';
        $this->tipodispositivo_id = $tolhuin->tipodispositivo_id ?? '';
        $this->slotmemoria_id = $tolhuin->slotmemoria_id ?? '';

       // $this->dependencia_ushuaia_id = $administracion->dependencia_ushuaia_id ?? '';
       // $this->serviciosespeciale_id = $administracion->serviciosespeciale_id ?? '';
        $this->tolhuin_id = $tolhuin->tolhuin_id ?? '';
       // $this->cientifica_id = $general->cientifica_id ?? '';
       // $this->destacamento_id = $administracion->destacamento_id ?? '';


        $this->modelo = $tolhuin->modelo ?? '';
        $this->marca = $tolhuin->marca ?? '';
        $this->procesador = $tolhuin->procesador ?? '';
        $this->cant_almacenamiento = $tolhuin->cant_almacenamiento ?? '';
        $this->tipo_ram = $tolhuin->tipo_ram ?? '';
        $this->sistema_operativo = $tolhuin->sistema_operativo ?? '';
        $this->tipo_disco = $tolhuin->tipo_disco ?? '';
        $this->tipo_teclado = $tolhuin->tipo_teclado ?? '';
        $this->tipo_mouse = $tolhuin->tipo_mouse ?? '';
        $this->fecha_inventario = $tolhuin->fecha_inventario  ? Carbon::parse($tolhuin->fecha_inventario)->format('Y-m-d') : '';
        $this->fecha_service = $tolhuin->fecha_service ? Carbon::parse($tolhuin->fecha_service)->format('Y-m-d') : '';
        $this->tipo_service = $tolhuin->tipo_service ?? '';
        $this->softwares_instalados = $tolhuin->softwares_instalados ?? '';
        //$this->detalles_inventario = $tolhuin->detalles_inventario ?? '';
        $this->activo = $tolhuin->activo ?? '';
    }

    public function edit()
    {
        $this->validate();

        $this->tolhuin->dependencia_tolhuin_id = $this->dependencia_tolhuin_id ?: null;

        $this->tolhuin->dependencia_tolhuin_id = $this->dependencia_tolhuin_id ?: null;
        $this->tolhuin->tipodeoficina_id = $this->tipodeoficina_id ?: null;
        $this->tolhuin->cantidadram_id = $this->cantidadram_id ?: null;
        $this->tolhuin->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->tolhuin->tolhuin_id = $this->tolhuin_id ?: null;
        //$this->administracion->cientifica_id = $this->cientifica_id ?: null;

        $this->tolhuin->marca = $this->marca ?: null;
        $this->tolhuin->modelo= $this->modelo ?: null;
        $this->tolhuin->procesador= $this->procesador ?: null;
        $this->tolhuin->fecha_service= $this->fecha_service ?: null;
        $this->tolhuin->tipo_service= $this->tipo_service ?: null;
        $this->tolhuin->fecha_inventario= $this->fecha_inventario ?: null;
        $this->tolhuin->detalles_inventario= $this->detalles_inventario ?: null;
        $this->tolhuin->tipo_ram= $this->tipo_ram ?: null;
        $this->tolhuin->tipo_disco= $this->tipo_disco ?: null;
        $this->tolhuin->cant_almacenamiento= $this->cant_almacenamiento ?: null;
        $this->tolhuin->tipo_mouse= $this->tipo_mouse ?: null;
        $this->tolhuin->tipo_teclado= $this->tipo_teclado ?: null;
        $this->tolhuin->softwares_instalados= $this->softwares_instalados ?: null;

        AuditoriaDetalleInventario::create([
            'generalinformatica_id' => $this->tolhuin->id,
            'detalles_inventario'   => $this->detalles_inventario,
            'user_id'               => auth()->id(),
            'ip_address'            => request()->ip(),
            'user_agent'            => request()->userAgent(),
        ]);

        $this->tolhuin->save();

        // Generar el código QR después de guardar los cambios
        $this->generateQRCode();

        session()->flash('message', 'Datos actualizados correctamente.');
    }

    private function generateQRCode()
{/*
    $dependencia_tolhuin = $this->dependencia_tolhuin_id ? Tipodispositivo::find($this->dependencia_tolhuin_id)->nombre : null; */
    $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
    $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
    $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
    $tolhuin_poli = $this->tolhuin_id ? Tolhuin::find($this->tolhuin_id)->nombre : null;
   // $cientifica_poli = $this->cientifica_id ? Cientifica::find($this->cientifica_id)->nombre : null;


  /*   $codigoQRData = 'Nro de identificacion: ' . $this->tolhuin->id . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tolhuin: ' . $tolhuin_poli . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram .  ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Softwares Instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
    $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
    $nombreImagenQR = 'codigo_qr_' . $this->tolhuin->id . '.png';
    $rutaImagenQR = 'public/codigoQR/Tolhuin/' . $nombreImagenQR;
    Storage::put($rutaImagenQR, $codigoQR);

    $this->tolhuin->update([
        'codigo_qr' => $nombreImagenQR,
    ]);
 */
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
        return view('livewire.informatica.tolhuin.edit-tolhuin-general');
    }
}
