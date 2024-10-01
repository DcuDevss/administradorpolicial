<?php

namespace App\Http\Livewire\Comunicaciones\Dcu;

use App\Models\Categoriacomunicacion;
use Livewire\Component;
use App\Models\Comunicacionesdcu;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;



class CreateComunicacionesDcu extends Component


{

    use WithFileUploads;

    public $CategoriacComunicaciones = [];

    public $codigo_qr, $nombre, $categoriacomunicacion_id, $marca, $modelo, $numero_serie, $fecha_service,
        $tipo_service, $estado, $fecha_inventario, $detalle_inventario, $categoriacomunicacion;

    public $Categoriacomunicaciones;
    public $comunicacionesdcu;


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
        'codigo_qr' => 'nullable',
    ];



    public function mount()
    {

        $this->categoriacomunicacion_id = null;
        $this->Categoriacomunicaciones = Categoriacomunicacion::all();




    }
    public function updatedCategoriacomunicacionId($value)
    {
        $this->categoriacomunicacion_id = $value;

        // Asegúrate de que aquí estés cargando los datos según la categoría seleccionada
        $this->comunicacionesdcu = Comunicacionesdcu::where('categoriacomunicacion_id', $this->categoriacomunicacion_id)
                                                    ->get();


    }




    public function guardar()
    {

        $this->validate();

        DB::beginTransaction();
        try {

            $this->comunicacionesdcu = new Comunicacionesdcu();
            $this->categoriacomunicacion_id === null  || $this->categoriacomunicacion_id === '' ? $this->comunicacionesdcu->categoriacomunicacion_id = null : $this->comunicacionesdcu->categoriacomunicacion_id = $this->categoriacomunicacion_id;
            $this->comunicacionesdcu->nombre = $this->nombre;
            $this->comunicacionesdcu->marca = $this->marca;
            $this->comunicacionesdcu->modelo = $this->modelo;
            $this->comunicacionesdcu->numero_serie = $this->numero_serie;
            $this->comunicacionesdcu->fecha_service = $this->fecha_service;
            $this->comunicacionesdcu->tipo_service = $this->tipo_service;
            $this->comunicacionesdcu->estado = $this->estado;
            $this->comunicacionesdcu->fecha_inventario = $this->fecha_inventario;
            $this->comunicacionesdcu->detalle_inventario = $this->detalle_inventario;
            $this->comunicacionesdcu->save();


            session()->flash('message', 'Datos guardados correctamente.');


            DB::commit();
            //$this->clearForm();

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }



    public function render()
    {


        $HerramientacomunCount =  Comunicacionesdcu::where('categoriacomunicacion_id', '1')->count();
        $HerramientamedicionCount =  Comunicacionesdcu::where('categoriacomunicacion_id', '2')->count();
        $EquipoinformaticoCount =  Comunicacionesdcu::where('categoriacomunicacion_id', '3')->count();
        $EquiporadioCount =  Comunicacionesdcu::where('categoriacomunicacion_id', '4')->count();
        $EquipoguardiaradioCount =  Comunicacionesdcu::where('categoriacomunicacion_id', '5')->count();
        $OtrosCount =  Comunicacionesdcu::where('categoriacomunicacion_id', '6')->count();

        $comunicacionesdcu = !empty($this->categoriacomunicacion_id)
            ? Comunicacionesdcu::where('categoriacomunicacion_id', $this->categoriacomunicacion_id)->get()
            : collect();







        return view('livewire.comunicaciones.dcu.create-comunicaciones-dcu',compact(
            'HerramientacomunCount',
            'HerramientamedicionCount',
            'EquipoinformaticoCount',
            'EquiporadioCount',
            'EquipoguardiaradioCount',
            'OtrosCount',
            'comunicacionesdcu'
        ));



    }



}
