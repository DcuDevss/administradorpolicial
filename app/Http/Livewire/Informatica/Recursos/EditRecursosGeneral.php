<?php

namespace App\Http\Livewire\Informatica\Recursos;

use App\Models\AuditoriaInventarioRecursos;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;
use App\Models\Cientifica;
use App\Models\Cantidadram;
use App\Models\DependenciaUshuaia;
use App\Models\Generalinformatica;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Sumario;
use App\Models\Bienestare;
use App\Models\Custodiagubernamentale;
use App\Models\Destacamento;
use App\Models\RecursoHumano;
use App\Models\Recursoshumanosgenerale;
use App\Models\Serviciosespeciale;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EditRecursosGeneral extends Component
{

    public $codigo_qr, $generalinformatica, $administraciongenerale_id, $investigacionesgenerale_id, $custodiagubernamentalgenerale_id, $dependencia_ushuaia_id, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $bienestare_id, $sumario_id, $recurso_humano_id, $administracion_id, $custodiagubernamentale_id, $destacamento_id, $jefatura_id, $comisariaprimera, $marca, $modelo, $procesador,  $sistema_operativo,  $fecha_service, $tipo_service,
        $recursos, $softwares_instalados, $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado, $admin, $inve, $jefa, $servicios, $custodia;


    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    public $Recurso_Humano = [];
    public $BIenestare = [];
    public $SUmario = [];
    public $CUstodiagubernamentale = [];
    //public $CIentifica = [];

    protected $rules = [
        'tipodeoficina_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',
        'recurso_humano_id' => 'nullable',

        'sumario_id' => 'nullable',
        'bienestare_id' => 'nullable',
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

    public function mount(Recursoshumanosgenerale $recursos)
    {

        $this->CantidadRam = Cantidadram::all();
        $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->SlotMemoria = Slotmemoria::all();
        $this->Recurso_Humano = RecursoHumano::all();

        $this->BIenestare = Bienestare::all();
        $this->SUmario = Sumario::all();


        $this->recursos = $recursos;
        $this->cantidadram_id = $recursos ->cantidadram_id ?? '';
        $this->tipodispositivo_id = $recursos ->tipodispositivo_id ?? '';
        $this->slotmemoria_id = $recursos ->slotmemoria_id ?? '';

        $this->recurso_humano_id = $recursos ->recurso_humano_id?? '';
        $this->sumario_id = $recursos ->sumario_id ?? '';
        $this->bienestare_id = $recursos ->bienestare_id ?? '';



        $this->modelo = $recursos ->modelo ?? '';
        $this->marca = $recursos ->marca ?? '';
        $this->procesador = $recursos ->procesador ?? '';
        $this->cant_almacenamiento = $recursos ->cant_almacenamiento ?? '';
        $this->tipo_ram = $recursos ->tipo_ram ?? '';
        $this->sistema_operativo = $recursos->sistema_operativo ?? '';
        $this->tipo_disco = $recursos ->tipo_disco ?? '';
        $this->tipo_teclado = $recursos ->tipo_teclado ?? '';
        $this->tipo_mouse = $recursos ->tipo_mouse ?? '';
        $this->fecha_inventario = $recursos ->fecha_inventario  ? Carbon::parse($recursos ->fecha_inventario)->format('Y-m-d') : '';
        $this->fecha_service = $recursos ->fecha_service ? Carbon::parse($recursos ->fecha_service)->format('Y-m-d') : '';
        $this->tipo_service = $recursos ->tipo_service ?? '';
        $this->softwares_instalados = $recursos ->softwares_instalados ?? '';
        $this->detalles_inventario = $recursos ->detalles_inventario ?? '';
        $this->activo = $recursos ->activo ?? '';
    }

    public function edit()
    {
        $this->validate();

        $this->recursos->recurso_humano_id = $this->recurso_humano_id ?: null;
        $this->recursos->sumario_id = $this->sumario_id ?: null;
        $this->recursos->cantidadram_id = $this->cantidadram_id ?: null;
        $this->recursos->slotmemoria_id = $this->slotmemoria_id ?: null;
        $this->recursos->bienestare_id = $this->bienestare_id ?: null;
        $this->recursos->tipodispositivo_id = $this->tipodispositivo_id ?: null;
       // $this->recursos->custodiagubernamentale_id = $this->custodiagubernamentale_id ?: null;
       // $this->general->cientifica_id = $this->cientifica_id ?: null;

        $this->recursos->marca = $this->marca ?: null;
        $this->recursos->modelo= $this->modelo ?: null;
        $this->recursos->procesador= $this->procesador ?: null;
        $this->recursos->fecha_service= $this->fecha_service ?: null;
        $this->recursos->tipo_service= $this->tipo_service ?: null;
        $this->recursos->fecha_inventario= $this->fecha_inventario ?: null;
        $this->recursos->detalles_inventario= $this->detalles_inventario ?: null;
        $this->recursos->tipo_ram= $this->tipo_ram ?: null;
        $this->recursos->tipo_disco= $this->tipo_disco ?: null;
        $this->recursos->cant_almacenamiento= $this->cant_almacenamiento ?: null;
        $this->recursos->tipo_mouse= $this->tipo_mouse ?: null;
        $this->recursos->tipo_teclado= $this->tipo_teclado ?: null;
        $this->recursos->softwares_instalados= $this->softwares_instalados ?: null;
        AuditoriaInventarioRecursos::create([
        'recursoshumanosgenerale_id' => $this->recursos->id,
        'detalles_inventario'   => $this->detalles_inventario,
        'user_id'               => auth()->id(),
        'ip_address'            => request()->ip(),
        'user_agent'            => request()->userAgent(),
        ]);
        $this->recursos->save();
        $this->generateQRCode();
        $this->dispatchBrowserEvent('notificacion', [
        'type' => 'success',
        'message' => 'Datos Editados correctamente.'
        ]);
    }

    private function generateQRCode()
    {

        $sumario_poli = $this->sumario_id ? Sumario::find($this->sumario_id)->nombre : null;
        $bienestare_poli = $this->bienestare_id ? Bienestare::find($this->bienestare_id)->nombre : null;
        $recursos_poli = $this->recurso_humano_id ? RecursoHumano::find($this->recurso_humano_id)->nombre : null;
        $tipoDispositivo = $this->tipodispositivo_id ? Tipodispositivo::find($this->tipodispositivo_id)->nombre : null;
        $cantidadRam = $this->cantidadram_id ? Cantidadram::find($this->cantidadram_id)->cantidad : null;
        $slotMemoria = $this->slotmemoria_id ? Slotmemoria::find($this->slotmemoria_id)->cantidad : null;

        $qrFolder = 'public/codigoQR/RecursosHumanos/';

            if ($recursos_poli) {
                if ($bienestare_poli) {
                    $qrFolder;
                    $codigoQRData = 'Nro de identificacion: ' . $this->recursos->id . ' -Recursos Humanos: ' . $recursos_poli .  ' - Oficina de: ' . $bienestare_poli .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento .  ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
                } elseif ($sumario_poli) {
                    $qrFolder;
                    $codigoQRData = 'Nro de identificacion: ' . $this->recursos->id . ' -Recusros Humanos: ' . $recursos_poli .  ' - Oficina de: ' . $sumario_poli .  ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
                } else {
                    $codigoQRData = 'Nro de identificacion: ' . $this->recursos->id . ' - Oficinas de Recursos Humanos: ' . $recursos_poli . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' -Tipo de disco: ' . $this->tipo_disco . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Sistema operativo: ' . $this->sistema_operativo . ' -Software instalados: ' . $this->softwares_instalados . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;
                }
            }

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);
        $nombreImagenQR = 'codigo_qr_' . $this->recursos->id . '.png';
        $rutaImagenQR = $qrFolder . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        // Actualiza el campo "codigo_qr" en el modelo Generalinformatica
        $this->recursos->update([
            'codigo_qr' => $nombreImagenQR,
        ]);

    }


    public function render()
    {
        return view('livewire.informatica.recursos.edit-recursos-general');
    }
}
