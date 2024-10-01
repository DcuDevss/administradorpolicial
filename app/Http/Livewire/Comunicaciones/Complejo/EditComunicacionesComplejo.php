<?php

namespace App\Http\Livewire\Comunicaciones\Complejo;

use App\Models\Comunicacionescomplejo;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Marcaequipo;
use App\Models\Equipocomunicacion;
use App\Models\Comunicacionesprimera;
use App\Models\Comunicacionesquinta;
use App\Models\Comunicacionessegunda;
use App\Models\Comunicacionestercera;
use App\Models\Vhfantena;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EditComunicacionesComplejo extends Component
{
    public $codigo_qr, $comunicacionesdesu_id, $equipocomunicacion_id, $marcaequipo_id, $vhfantena_id, $lugar_colocacion, $modelo,
    $nro_serie, $condicion_equipo_comunicacion, $condicion_fuente, $condicion_baliza,
    $fecha_inventario, $fecha_service, $tipo_service, $detalle_inventario, $comunicacionesdesu,$comunicaciones;
    public $MarcaEquipo;
    public $VhfAntena;
    public $EquipoComunicacion;

protected $rules = [
    'equipocomunicacion_id' => 'nullable',
    'marcaequipo_id' => 'nullable',
    'lugar_colocacion' => 'nullable',
    'vhfantena_id'=>'nullable',
    'modelo' => 'nullable',
    'nro_serie' => 'nullable',
    'condicion_equipo_comunicacion' => 'nullable',
    //'condicion_fuente' => 'nullable',
    //'condicion_baliza' => 'nullable',
    'fecha_service' => 'nullable',
    'tipo_service' => 'nullable',
    'fecha_inventario' => 'nullable',
    'detalle_inventario' => 'nullable',

];

public function mount(Comunicacionescomplejo$comunicaciones)
{

    $this->MarcaEquipo = Marcaequipo::all();
    $this->VhfAntena = Vhfantena::all();
    $this->EquipoComunicacion = Equipocomunicacion::all();

    $this->comunicaciones = $comunicaciones;
    $this->lugar_colocacion = $comunicaciones->lugar_colocacion;
    $this->equipocomunicacion_id = $comunicaciones->equipocomunicacion_id;
    $this->marcaequipo_id = $comunicaciones->marcaequipo_id;
    $this->vhfantena_id = $comunicaciones->vhfantena_id;
    $this->modelo = $comunicaciones->modelo;
    $this->nro_serie = $comunicaciones->nro_serie;
    $this->condicion_equipo_comunicacion = $comunicaciones->condicion_equipo_comunicacion;
   // $this->vhfantena_id = $comunicaciones->vhfantena_id;
    //$this->comunicacionesprimera->condicion_baliza = $this->condicion_baliza;
    $this->fecha_service = $comunicaciones->fecha_service ? Carbon::parse($comunicaciones->fecha_service)->format('Y-m-d') : null;
    $this->fecha_inventario = $comunicaciones->fecha_inventario ? Carbon::parse($comunicaciones->fecha_inventario)->format('Y-m-d') : null;
   // $this->fecha_service = $comunicaciones->fecha_service;
    $this->tipo_service = $comunicaciones->tipo_service;
   // $this->fecha_inventario = $comunicaciones->fecha_inventario;
    $this->detalle_inventario = $comunicaciones->detalle_inventario;


}

public function edit()
{
    $this->validate();

    $this->comunicaciones->update([
        'marcaequipo_id' => $this->marcaequipo_id,
        'vhfantena_id' => $this->vhfantena_id,
        'equipocomunicacion_id' => $this->equipocomunicacion_id,
        'lugar_colocacion' => $this->lugar_colocacion,
        'nro_serie' => $this->nro_serie,
        'modelo' => $this->modelo,
        'condicion_equipo_comunicacion' => $this->condicion_equipo_comunicacion,
        'fecha_service' => $this->fecha_service,
        'tipo_service' => $this->tipo_service,
        'fecha_inventario' => $this->fecha_inventario,
        'detalle_inventario' => $this->detalle_inventario,
    ]);



    session()->flash('message', 'Datos actualizados correctamente.');
}



    public function render()
    {
        return view('livewire.comunicaciones.complejo.edit-comunicaciones-complejo');
    }
}
