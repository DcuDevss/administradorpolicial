<?php

namespace App\Http\Livewire\Comunicaciones\General;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Tecnicocomunicacione;
//use Livewire\WithAttributes; WithAttributes
use App\Models\DependenciaUshuaia;
use App\Models\DependenciaRiogrande;
use App\Models\DependenciaTolhuin;
use App\Models\OtrasInstitucione;
use App\Models\TrabajosGenerale;
use App\Models\HistorialDetalleTrabajo;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Metadata\DependsOnClass;

class CreateTrabajoGeneral extends Component
{
    use WithFileUploads;

    public $Tecnico_Comunicacione = [];
    public $Dependencia_Ushuaia = [];
    public $Dependencia_Riogrande = [];
    public $Dependencia_Tolhuin = [];
    public $Otras_Institucione = [];
    public $showingModal = false;


    public $trabajos_generale_id, $dependencia_ushuaia_id, $dependencia_riogrande_id, $dependencia_tolhuin_id, $otras_institucione_id, $tecnicocomunicacione_id,
        $lugar_trabajo, $fecha_trabajo, $detalle_trabajo, $trabajogeneral;

    protected $rules = [
        'dependencia_ushuaia_id' => 'nullable',
        'dependencia_riogrande_id' => 'nullable',
        'dependencia_tolhuin_id' => 'nullable',
        'otras_institucione_id' => 'nullable',
        'tecnicocomunicacione_id' => 'nullable',
        'lugar_trabajo' => 'nullable',
        'fecha_trabajo' => 'nullable',
        'detalle_trabajo' => 'nullable',

    ];
    public function showModal()
    {
        $this->showingModal = true;
    }

    public function closeModal()
    {
        $this->showingModal = false;
    }


    public function mount()
    {
        $this->dependencia_ushuaia_id = '';
        $this->dependencia_riogrande_id = '';
        $this->dependencia_tolhuin_id = '';
        $this->otras_institucione_id = '';
        $this->tecnicocomunicacione_id = '';


        $this->Tecnico_Comunicacione = Tecnicocomunicacione::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();
        $this->Dependencia_Riogrande = DependenciaRiogrande::all();
        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->Otras_Institucione = OtrasInstitucione::all();
    }


    public function guardar()
    {
        $this->validate();
        DB::beginTransaction();
        try {

            // Si el ID del trabajo es nulo, estamos creando un nuevo trabajo
        if ($this->trabajos_generale_id) {
            // Actualizar el trabajo existente
            $this->trabajogeneral = TrabajosGenerale::find($this->trabajos_generale_id);
            if (!$this->trabajogeneral) {
                throw new Exception('Trabajo no encontrado.');
            }


        } else {
            // Crear un nuevo trabajo

            $this->trabajogeneral = new TrabajosGenerale();
        }
            $this->dependencia_ushuaia_id === null || $this->dependencia_ushuaia_id === '' ? $this->trabajogeneral->dependencia_ushuaia_id = null : $this->trabajogeneral->dependencia_ushuaia_id = $this->dependencia_ushuaia_id;
            $this->dependencia_riogrande_id === null || $this->dependencia_riogrande_id === '' ? $this->trabajogeneral->dependencia_riogrande_id = null : $this->trabajogeneral->dependencia_riogrande_id = $this->dependencia_riogrande_id;
            $this->dependencia_tolhuin_id === null || $this->dependencia_tolhuin_id === '' ? $this->trabajogeneral->dependencia_tolhuin_id = null : $this->trabajogeneral->dependencia_tolhuin_id = $this->dependencia_tolhuin_id;
            $this->tecnicocomunicacione_id === null || $this->tecnicocomunicacione_id === '' ? $this->trabajogeneral->tecnicocomunicacione_id = null : $this->trabajogeneral->tecnicocomunicacione_id = $this->tecnicocomunicacione_id;
            //$this->trabajogeneral->tecnicocomunicacione_id = $this->tecnicocomunicacione_id;
            $this->otras_institucione_id === null || $this->otras_institucione_id === '' ? $this->trabajogeneral->otras_institucione_id = null : $this->trabajogeneral->otras_institucione_id = $this->otras_institucione_id;
            //$this->trabajogeneral->otras_institucione_id = $this->otras_institucione_id;
            $this->lugar_trabajo === null || $this->lugar_trabajo === '' ? $this->trabajogeneral->lugar_trabajo = null : $this->trabajogeneral->lugar_trabajo = $this->lugar_trabajo;
            $this->fecha_trabajo === null || $this->fecha_trabajo === '' ? $this->trabajogeneral->fecha_trabajo = null : $this->trabajogeneral->fecha_trabajo = $this->fecha_trabajo;
            $this->detalle_trabajo === null || $this->detalle_trabajo === '' ? $this->trabajogeneral->detalle_trabajo = null : $this->trabajogeneral->detalle_trabajo = $this->detalle_trabajo;

            $this->trabajogeneral->save();

            if ($this->trabajos_generale_id) {
                $historial = new HistorialDetalleTrabajo();
                $historial->trabajos_generale_id = $this->trabajos_generale_id;
                $historial->detalle_trabajo = $this->detalle_trabajo;
                $historial->save();
            }

            $this->dispatchBrowserEvent('notificacion', [
                'type' => 'success',
                'message' => 'Datos guardados correctamente.'
            ]);



            DB::commit();
            //$this->clearForm();


        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Error al guardar los datos: ' . $e->getMessage());
        }
    }




    public function render()
    {

        return view('livewire.comunicaciones.general.create-trabajo-general');
    }
}
