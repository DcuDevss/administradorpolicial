<?php

namespace App\Http\Livewire\Informatica\General;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;
use App\Models\Cientifica;
use App\Models\Cantidadram;
use App\Models\DependenciaUshuaia;
use App\Models\Generalinformatica;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Custodiagubernamentale;
use App\Models\Destacamento;
use App\Models\Serviciosespeciale;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EditInventarioGeneral extends Component
{
    public $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $cientifica_id, $serviciosespeciale_id, $investigacione_id, $administracion_id, $custodiagubernamentale_id, $recurso_humano_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $general, $softwares_instalados, $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $inve, $recursos, $jefa, $servicios, $custodia;


    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Dependencia_Ushuaia = [];

    public $DEstacamento = [];
    public $SErviciosespeciale = [];
    public $CUstodiagubernamentale = [];
    //public $CIentifica = [];

    protected $rules = [
        'tipodeoficina_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',
        'dependencia_ushuaia_id' => 'nullable',

        'destacamento_id' => 'nullable',
        'serviciosespeciale_id' => 'nullable',
        'custodiagubernamentale_id' => 'nullable',
       // 'cientifica_id' => 'nullable',


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

    public function mount(Generalinformatica $general)
    {

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();

        $this->DEstacamento = Destacamento::all();
        $this->SErviciosespeciale = Serviciosespeciale::all();
        $this->CUstodiagubernamentale = Custodiagubernamentale::all();
        //$this->CIentifica = Cientifica::all();

        $this->general = $general;
        $this->cantidadram_id = $general->cantidadram_id ?? '';
        $this->tipodeoficina_id = $general->tipodeoficina_id ?? '';
        $this->tipodispositivo_id = $general->tipodispositivo_id ?? '';
        $this->slotmemoria_id = $general->slotmemoria_id ?? '';

        $this->dependencia_ushuaia_id = $general->dependencia_ushuaia_id ?? '';
        $this->serviciosespeciale_id = $general->serviciosespeciale_id ?? '';
        $this->custodiagubernamentale_id = $general->custodiagubernamentale_id ?? '';
       // $this->cientifica_id = $general->cientifica_id ?? '';
        $this->destacamento_id = $general->destacamento_id ?? '';


        $this->modelo = $general->modelo ?? '';
        $this->marca = $general->marca ?? '';
        $this->procesador = $general->procesador ?? '';
        $this->cant_almacenamiento = $general->cant_almacenamiento ?? '';
        $this->tipo_ram = $general->tipo_ram ?? '';
        $this->sistema_operativo = $general->sistema_operativo ?? '';
        $this->tipo_disco = $general->tipo_disco ?? '';
        $this->tipo_teclado = $general->tipo_teclado ?? '';
        $this->tipo_mouse = $general->tipo_mouse ?? '';
        $this->fecha_inventario = $general->fecha_inventario  ? Carbon::parse($general->fecha_inventario)->format('Y-m-d') : '';
        $this->fecha_service = $general->fecha_service ? Carbon::parse($general->fecha_service)->format('Y-m-d') : '';
        $this->tipo_service = $general->tipo_service ?? '';
        $this->softwares_instalados = $general->softwares_instalados ?? '';
        //$this->detalles_inventario = $general->detalles_inventario ?? '';
        $this->activo = $general->activo ?? '';
    }

    public function render()
    {
        return view('livewire.informatica.general.edit-inventario-general');
    }

   /* public function edit()
    {
        $this->validate();

        $this->general->dependencia_ushuaia_id = $this->dependencia_ushuaia_id ?: null;
        $this->general->tipodispositivo_id = $this->tipodispositivo_id ?: null;
        $this->general->cantidadram_id = $this->cantidadram_id ?: null;
        $this->general->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->general->destacamento_id = $this->destacamento_id ?: null;
        $this->general->serviciosespeciale_id = $this->serviciosespeciale_id ?: null;
        $this->general->custodiagubernamentale_id = $this->custodiagubernamentale_id ?: null;
        $this->general->cientifica_id = $this->cientifica_id ?: null;

        $this->general->marca = $this->marca ?: null;
        $this->general->modelo= $this->modelo ?: null;
        $this->general->procesador= $this->procesador ?: null;
        //$this->general->procesador=
        $this->general->fecha_service= $this->fecha_service ?: null;
        $this->general->tipo_service= $this->tipo_service ?: null;
        $this->general->fecha_inventario= $this->fecha_inventario ?: null;
        $this->general->detalles_inventario= $this->detalles_inventario ?: null;
        $this->general->tipo_ram= $this->tipo_ram ?: null;
        $this->general->tipo_disco= $this->tipo_disco ?: null;
        $this->general->cant_almacenamiento= $this->cant_almacenamiento ?: null;
        $this->general->tipo_mouse= $this->tipo_mouse ?: null;
        $this->general->tipo_teclado= $this->tipo_teclado ?: null;
        $this->general->softwares_instalados= $this->softwares_instalados ?: null;

        $this->general->save();

        $this->generateQRCode();

        session()->flash('message', 'Datos actualizados correctamente.');
    }*/

    public function edit()
{
    $this->validate();

    $this->general->dependencia_ushuaia_id = $this->dependencia_ushuaia_id ?: null;
    $this->general->tipodispositivo_id = $this->tipodispositivo_id ?: null;
    $this->general->cantidadram_id = $this->cantidadram_id ?: null;
    $this->general->slotmemoria_id = $this->slotmemoria_id ?: null;
    $this->general->destacamento_id = $this->destacamento_id ?: null;
    $this->general->serviciosespeciale_id = $this->serviciosespeciale_id ?: null;
    $this->general->custodiagubernamentale_id = $this->custodiagubernamentale_id ?: null;
   // $this->general->cientifica_id = $this->cientifica_id ?: null;

    $this->general->marca = $this->marca ?: null;
    $this->general->modelo= $this->modelo ?: null;
    $this->general->procesador= $this->procesador ?: null;
    $this->general->fecha_service= $this->fecha_service ?: null;
    $this->general->tipo_service= $this->tipo_service ?: null;
    $this->general->fecha_inventario= $this->fecha_inventario ?: null;
    $this->general->detalles_inventario= $this->detalles_inventario ?: null;
    $this->general->tipo_ram= $this->tipo_ram ?: null;
    $this->general->tipo_disco= $this->tipo_disco ?: null;
    $this->general->cant_almacenamiento= $this->cant_almacenamiento ?: null;
    $this->general->tipo_mouse= $this->tipo_mouse ?: null;
    $this->general->tipo_teclado= $this->tipo_teclado ?: null;
    $this->general->softwares_instalados= $this->softwares_instalados ?: null;

    $this->general->save();

    // Generar el código QR después de guardar los cambios
    $this->generateQRCode();

    session()->flash('message', 'Datos actualizados correctamente.');
}


    private function generateQRCode()
    {

        $tipoOficina = $this->tipodeoficina_id ? Tipodeoficina::find($this->tipodeoficina_id)->nombre : null;
        $custodiaGubernamentale = $this->custodiagubernamentale_id ? Custodiagubernamentale::find($this->custodiagubernamentale_id)->nombre : null;
       // $cienTifica = $this->cientifica_id ? Cientifica::find($this->cientifica_id)->nombre : null;
        $dependenciaUshuaia = $this->dependencia_ushuaia_id ? DependenciaUshuaia::find($this->dependencia_ushuaia_id)->nombre : null;
        $destacamento_poli = $this->destacamento_id ? Destacamento::find($this->destacamento_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;
        $serviciosespeciale_poli = $this->serviciosespeciale_id ? Serviciosespeciale::find($this->serviciosespeciale_id)->nombre : null;

        $qrFolder = 'public/codigoQR/Dep.operativas/';

        if ($dependenciaUshuaia) {
             if ($custodiaGubernamentale) {
                $qrFolder/* .= 'Custodia-gubernamental/'*/;
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Custodia gubernamental: ' . $custodiaGubernamentale .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento .  ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } elseif ($serviciosespeciale_poli) {
                $qrFolder/* .= 'Servicios-especiales/'*/;
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Servicios especiales: ' . $serviciosespeciale_poli .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            }elseif($destacamento_poli){
                $qrFolder/* .= 'Destacamentos/'*/;
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia . ' - Tipo de oficina: ' . $tipoOficina . ' -Destacamentos: ' . $destacamento_poli . ' - Fecha del inventario: '  . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            } else {
                $codigoQRData = 'Nro de identificacion: ' . $this->general->id . ' -Dependencia policiales: ' . $dependenciaUshuaia . ' - Tipo de oficina: ' . $tipoOficina . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' -Fecha de service: ' . $this->fecha_service . ' -Tipo de service: ' . $this->tipo_service . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
            }
        }

        //$codigoQRData = 'Nro de identificacion: ' . $this->generalinformatica->id . ' -Dependencia policiales: ' . $dependenciaUshuaia .  ' -Cientifica: ' . $cienTifica .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Tipo de monitor: ' . $this->monitor . ' - Tipo de impresora: ' . $this->tipo_impresora . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;

       /*  $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
        $nombreImagenQR = 'codigo_qr_' . $this->general->id . '.png';
        $rutaImagenQR = $qrFolder . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);
 */
        // Actualiza el campo "codigo_qr" en el modelo Generalinformatica
/*         $this->general->update([
            'codigo_qr' => $nombreImagenQR,
        ]);
 */
    }
}
