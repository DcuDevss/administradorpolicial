<?php

namespace App\Http\Livewire\Comisaria1;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;
use App\Models\Slotmemoria;
use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EditComisariaPrimera extends Component
{
    use WithFileUploads;

    public $comisaria;
    public $tipodeoficina_id;
    public $tipodispositivo_id;
    public $cantidadram_id;
    public $slotmemoria_id;
    public $marca;
    public $modelo;
    public $procesador;
    public $tipo_ram;
    public $cant_almacenamiento;
    public $monitor;
    public $sistema_operativo;
    public $tipo_impresora;
    public $tipo_mouse;
    public $tipo_teclado;
    public $tipo_disco;
    public $fecha_inventario;
    public $activo;
    public $detalles_inventario;
    public $codigo_qr;
    public $isOpen = false;
    public $TipodeOficina;
    public $TipoDispositivo;
    public $CantidadRam;
    public $SlotMemoria;

    protected $rules = [
        'tipodeoficina_id' => 'nullable',
        'tipodispositivo_id' => 'nullable',
        'cantidadram_id' => 'nullable',
        'slotmemoria_id' => 'nullable',
        'marca' => 'nullable',
        'modelo' => 'nullable',
        'procesador' => 'nullable',
        'tipo_ram' => 'nullable',
        'cant_almacenamiento' => 'nullable',
        'monitor' => 'nullable',
        'sistema_operativo' => 'nullable',
        'tipo_impresora' => 'nullable',
        'tipo_teclado' => 'nullable',
        'tipo_mouse' => 'nullable',
        'tipo_disco' => 'nullable',
        'fecha_inventario' => 'nullable',
        'activo' => 'nullable',
        'detalles_inventario' => 'nullable',
    ];

    public function mount(ComisariaPrimera $comisaria)
    {
        $this->TipodeOficina = Tipodeoficina::all();
        $this->TipoDispositivo = Tipodispositivo::all();
        $this->CantidadRam = Cantidadram::all();
        $this->SlotMemoria = Slotmemoria::all();

        $this->comisaria = $comisaria;
        $this->tipodeoficina_id = $comisaria->tipodeoficina_id;
        $this->tipodispositivo_id = $comisaria->tipodispositivo_id;
        $this->cantidadram_id = $comisaria->cantidadram_id;
        $this->slotmemoria_id = $comisaria->slotmemoria_id;
        $this->marca = $comisaria->marca;
        $this->modelo = $comisaria->modelo;
        $this->procesador = $comisaria->procesador;
        $this->tipo_ram = $comisaria->tipo_ram;
        $this->cant_almacenamiento = $comisaria->cant_almacenamiento;
        $this->monitor = $comisaria->monitor;
        $this->sistema_operativo = $comisaria->sistema_operativo;
        $this->tipo_impresora = $comisaria->tipo_impresora;
        $this->tipo_disco = $comisaria->tipo_disco;
        $this->tipo_teclado = $comisaria->tipo_teclado;
        $this->tipo_mouse = $comisaria->tipo_mouse;
        $this->fecha_inventario = $comisaria->fecha_inventario;
        $this->activo = $comisaria->activo;
        $this->detalles_inventario = $comisaria->detalles_inventario;
        $this->codigo_qr = $comisaria->codigo_qr;
    }

    public function render()
    {
        return view('livewire.comisaria1.edit-comisaria-primera');
    }

    public function edit()
    {
        $this->validate();

        $this->comisaria->update([
            'tipodeoficina_id' => $this->tipodeoficina_id,
            'tipodispositivo_id' => $this->tipodispositivo_id,
            'cantidadram_id' => $this->cantidadram_id,
            'slotmemoria_id' => $this->slotmemoria_id,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'procesador' => $this->procesador,
            'tipo_ram' => $this->tipo_ram,
            'cant_almacenamiento' => $this->cant_almacenamiento,
            'monitor' => $this->monitor,
            'sistema_operativo' => $this->sistema_operativo,
            'tipo_impresora' => $this->tipo_impresora,
            'tipo_disco' => $this->tipo_disco,
            'tipo_mouse' => $this->tipo_mouse,
            'tipo_teclado' => $this->tipo_teclado,
            'fecha_inventario' => $this->fecha_inventario,
            'activo' => $this->activo,
            'detalles_inventario' => $this->detalles_inventario,
        ]);

        // Generar el nuevo código QR con los datos editados
        $this->generateQRCode();

        session()->flash('message', 'Datos actualizados correctamente.');
    }

    private function generateQRCode()
    {
        $tipoOficina = Tipodeoficina::find($this->tipodeoficina_id)->nombre;
        $tipoDispositivo = Tipodispositivo::find($this->tipodispositivo_id)->nombre;
        $cantidadRam = Cantidadram::find($this->cantidadram_id)->cantidad;
        $slotMemoria = Slotmemoria::find($this->slotmemoria_id)->cantidad;

        $codigoQRData = 'Nro de identificacion: ' . $this->comisaria->id . ' - Fecha del inventario: ' . $this->fecha_inventario . ' - Tipo de oficina: ' . $tipoOficina . ' - Tipo de dispositivo: ' . $tipoDispositivo . ' - Marca: ' . $this->marca . ' - Modelo: ' . $this->modelo . ' - Procesador: ' . $this->procesador . ' - Tipo de RAM: ' . $this->tipo_ram . ' - Cantidad de RAM: ' . $cantidadRam . ' - Slot de memoria: ' . $slotMemoria . ' - Cantidad de almacenamiento: ' . $this->cant_almacenamiento . ' - Tipo de monitor: ' . $this->monitor . ' - Tipo de impresora: ' . $this->tipo_impresora . ' - Sistema operativo: ' . $this->sistema_operativo . ' - Detalles del inventario: ' . $this->detalles_inventario . ' - La computadora se encuentra: ' . $this->activo;

        $codigoQR = QrCode::format('png')->size(200)->generate($codigoQRData);

        $nombreImagenQR = 'codigo_qr_' . $this->comisaria->id . '.png';
        $rutaImagenQR = 'public/codigoQR/comisariaPrimera/' . $nombreImagenQR;
        Storage::put($rutaImagenQR, $codigoQR);

        $this->comisaria->update([
            'codigo_qr' => $nombreImagenQR,
        ]);
    }
}

