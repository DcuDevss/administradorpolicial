<?php

namespace App\Http\Livewire\Comunicaciones\Dcu;

use Illuminate\Http\Request;
use App\Models\Comunicacionesdcu;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Categoriacomunicacion;
use Carbon\Carbon;

class EditComunicacionesdcu extends Component
{

    public $codigo_qr, $Categoriacomunicaciones, $comunicacionesdcu_id, $categoriacomunicacion_id, $nombre, $categoria, $marca, $modelo, $estado, $numero_serie, $fecha_service,
        $tipo_service, $fecha_inventario, $detalle_inventario, $Comunicacionesdcu, $comunicaciones;


    protected $rules = [
        'nombre' => 'nullable',
        'categoriacomunicacion_id' => 'nullable',
        'marca' => 'nullable',
        'modelo' => 'nullable',
        'numero_serie' => 'nullable',
        'fecha_service' => 'nullable',
        'tipo_service' => 'nullable',
        'estado' => 'nullable',
        'fecha_inventario' => 'nullable',
        'detalle_inventario' => 'nullable',
    ];


    public function mount(Comunicacionesdcu $comunicaciones)
    {
        $this->Categoriacomunicaciones = Categoriacomunicacion::all();

        $this->comunicaciones = $comunicaciones;
        $this->categoriacomunicacion_id = $comunicaciones->categoriacomunicacion_id;
        $this->nombre = $comunicaciones->nombre;
        $this->marca = $comunicaciones->marca;
        $this->modelo = $comunicaciones->modelo;
        $this->estado = $comunicaciones->estado;
        $this->tipo_service = $comunicaciones->tipo_service;
        $this->numero_serie = $comunicaciones->numero_serie;
        $this->fecha_service = $comunicaciones->fecha_service ? Carbon::parse($comunicaciones->fecha_service)->format('Y-m-d') : null;
        $this->fecha_inventario = $comunicaciones->fecha_inventario ? Carbon::parse($comunicaciones->fecha_inventario)->format('Y-m-d') : null;
        $this->detalle_inventario = $comunicaciones->detalle_inventario;
    }

    public function edit()
    {
        $this->validate();


        $this->comunicaciones->update([
            'nombre' => $this->nombre,
            'categoriacomunicacion_id' => $this->categoriacomunicacion_id,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'estado' => $this->estado,
            'tipo_service' => $this->tipo_service,
            'numero_serie' => $this->numero_serie,
            'fecha_service' => $this->fecha_service,
            'fecha_inventario' => $this->fecha_inventario,
            'detalle_inventario' => $this->detalle_inventario,
        ]);


        session()->flash('message', 'Datos actualizados correctamente.');
    }

    public function render()
    {

        return view('livewire.comunicaciones.dcu.edit-comunicaciones-dcu');
    }
}
