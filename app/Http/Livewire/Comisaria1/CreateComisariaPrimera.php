<?php

namespace App\Http\Livewire\Comisaria1;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;


use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CreateComisariaPrimera extends Component
{
    use WithFileUploads;

    public $TipoDispositivo = [];
    public $CantidadRam = [];
    public $TipodeOficina = [];
    public $SlotMemoria = [];
    

    public $codigo_qr, $comisariaprimera_id, $tipodispositivo_id, $tipodeoficina_id, $cantidadram_id, $slotmemoria_id,
        $comisariaprimera, $marca, $modelo, $procesador, $monitor, $sistema_operativo, $tipo_impresora,
        $fecha_inventario, $activo, $detalles_inventario, $tipo_ram, $tipo_disco, $cant_almacenamiento, $tipo_mouse, $tipo_teclado;


        /*protected $listeners = ['marcarComoLeida'];

        public function marcarComoLeida($notificacionId)
        {
            $notificacion = auth()->user()->notifications->where('id', $notificacionId)->first();
            if ($notificacion) {
                $notificacion->markAsRead();
            }
        }*/

        protected $rules = [
            'tipodeoficina_id' => 'nullable',
            'tipodispositivo_id' => 'nullable',
            'cantidadram_id' => 'nullable',
            'slotmemoria_id' => 'nullable',
        ];


        public function mount()
        {
            $this->cantidadram_id = "";
            $this->tipodeoficina_id = "";
            $this->tipodispositivo_id = "";
            $this->slotmemoria_id = "";

            $this->CantidadRam = Cantidadram::all();
            $this->TipodeOficina = Tipodeoficina::all(); // Cargar los datos de tipo de oficina
            $this->TipoDispositivo = Tipodispositivo::all();
            $this->SlotMemoria = Slotmemoria::all();
        }


    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        //try {

            $this->comisariaprimera = new ComisariaPrimera();
            $this->comisariaprimera->tipodeoficina_id = $this->tipodeoficina_id;
            $this->comisariaprimera->tipodispositivo_id = $this->tipodispositivo_id;
            $this->comisariaprimera->cantidadram_id = $this->cantidadram_id;
            $this->comisariaprimera->slotmemoria_id = $this->slotmemoria_id;
            $this->comisariaprimera->marca = $this->marca;
            $this->comisariaprimera->modelo = $this->modelo;
            $this->comisariaprimera->procesador = $this->procesador;
            $this->comisariaprimera->cant_almacenamiento = $this->cant_almacenamiento;
            $this->comisariaprimera->tipo_ram = $this->tipo_ram;
            $this->comisariaprimera->monitor = $this->monitor;
            $this->comisariaprimera->sistema_operativo = $this->sistema_operativo;
            $this->comisariaprimera->tipo_disco = $this->tipo_disco;
            $this->comisariaprimera->tipo_teclado = $this->tipo_teclado;
            $this->comisariaprimera->tipo_mouse = $this->tipo_mouse;
            $this->comisariaprimera->tipo_impresora = $this->tipo_impresora;
            $this->comisariaprimera->fecha_inventario = $this->fecha_inventario;
            $this->comisariaprimera->activo = $this->activo;
            $this->comisariaprimera->detalles_inventario = $this->detalles_inventario;
            $this->comisariaprimera->save();

         // Obtengo el nombre del tipo de oficina
         $tipoOficina = Tipodeoficina::find($this->tipodeoficina_id)->nombre;

         // Obtengo el nombre del tipo de dispositivo
         $tipoDispositivo = Tipodispositivo::find($this->tipodispositivo_id)->nombre;

         // Obtengo la cantidad desde cantidadram
         $cantidadRam = Cantidadram::find($this->cantidadram_id)->cantidad;

         // Obtengo la cantidad de slot de memoria
         $slotMemoria = Slotmemoria::find($this->slotmemoria_id)->cantidad;

        $codigoQRData = ' Nro de identificacion: ' . $this->comisariaprimera->id . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de oficina: ' .
        $tipoOficina . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' .
        $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' Slot de memoria: ' . $slotMemoria . ' - Tipo de Ram: ' . $this->tipo_ram . ' - Cantidad de Ram: ' . $cantidadRam . ' -Tipo de monitor: ' . $this->monitor . ' -tipo de disco ' . $this->tipo_disco . ' -Cantidad de Almacenamiento: ' . $this->cant_almacenamiento .
        ' - Tipo de Teclado: ' . $this->tipo_teclado . ' - Tipo de mouse: ' . $this->tipo_mouse . ' - Tipo de Impresora: ' . $this->tipo_impresora .
        ' - Detalles del inventario: ' . $this->detalles_inventario . ' -La computadora se encuentra: ' . $this->activo;

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->comisariaprimera->id . '.png';
        $rutaImagenQR = 'public/codigoQR/comisariaPrimera/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        // Actualizar el campo "codigo_qr" en el modelo ComisariaPrimera
        $this->comisariaprimera->codigo_qr = $nombreImagenQR;
        $this->comisariaprimera->save();

        session()->flash('message', 'Datos guardados correctamente.');
        /*$codigoQRData = ' Nro de identificacion: ' .  $this->comisariaprimera->id . ' - Fecha del servicio: ' . $this->fecha_servicio . ' - Tipo de oficina: ' . $tipoOficina . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Sistema operativo: ' . $this->sistema_operativo . ' - Cantidad de Ram: ' . $cantidadRam . ' - Tipo de servicio: ' . $this->tipo_servicio . ' - Detalle del servicio: ' . $this->detalles_servicios;
        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->comisariaprimera_id . '.png';
        $rutaImagenQR = 'public/storage/codigoQR/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);*/

        DB::commit();
        //$this->clearForm();

        /* } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        } */
    }

    public function clearForm()
    {
        $this->comisariaprimera_id = '';
        $this->cantidadram_id = '';
        $this->tipodispositivo_id = '';
        $this->tipodeoficina_id = '';
        $this->slotmemoria_id='';
    }

    public function render()
    {
        return view('livewire.comisaria1.create-comisaria-primera');
    }
}
