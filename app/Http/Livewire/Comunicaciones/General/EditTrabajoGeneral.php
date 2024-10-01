<?php

namespace App\Http\Livewire\Comunicaciones\General;

use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Tecnicocomunicacione;
use App\Models\DependenciaUshuaia;
use App\Models\DependenciaRiogrande;
use App\Models\DependenciaTolhuin;
use App\Models\OtrasInstitucione;
use App\Models\TrabajosGenerale;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Metadata\DependsOnClass;


class EditTrabajoGeneral extends Component
{
    use WithFileUploads;

    public $Tecnico_Comunicacione = [];
    public $Dependencia_Ushuaia = [];
    public $Dependencia_Riogrande = [];
    public $Dependencia_Tolhuin = [];
    public $Otras_Institucione = [];
    public $showingModal = false;


    public $trabajos_generale_id, $dependencia_ushuaia_id, $dependencia_riogrande_id, $dependencia_tolhuin_id, $otras_institucione_id, $tecnicocomunicacione_id,
        $lugar_trabajo, $fecha_trabajo, $detalle_trabajo, $trabajogeneral, $trabajo;

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
    // ...

    public function mount(TrabajosGenerale $trabajo)
    {
        $this->Tecnico_Comunicacione = Tecnicocomunicacione::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();
        $this->Dependencia_Riogrande = DependenciaRiogrande::all();
        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->Otras_Institucione = OtrasInstitucione::all();

        $this->trabajo = $trabajo;
        $this->dependencia_ushuaia_id = $trabajo->dependencia_ushuaia_id ?? '';
        $this->dependencia_riogrande_id = $trabajo->dependencia_riogrande_id ?? '';
        $this->dependencia_tolhuin_id = $trabajo->dependencia_tolhuin_id ?? '';
        $this->otras_institucione_id = $trabajo->otras_institucione_id ?? '';
        $this->tecnicocomunicacione_id = $trabajo->tecnicocomunicacione_id ?? '';
        $this->lugar_trabajo = $trabajo->lugar_trabajo ?? '';
        $this->fecha_trabajo = $trabajo->fecha_trabajo ? Carbon::parse($trabajo->fecha_trabajo)->format('Y-m-d') : '';
        /* $this->detalle_trabajo = $trabajo->detalle_trabajo ?? ''; */
    }

    // ...


    /*public function mount(TrabajosGenerale $trabajo)
    {

        $this->Tecnico_Comunicacione = Tecnicocomunicacione::all();
        $this->Dependencia_Ushuaia = DependenciaUshuaia::all();
        $this->Dependencia_Riogrande = DependenciaRiogrande::all();
        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->Otras_Institucione = OtrasInstitucione::all();

        $this->trabajo = $trabajo;
        $this->dependencia_ushuaia_id = $trabajo->dependencia_ushuaia_id;
        $this->dependencia_riogrande_id = $trabajo->dependencia_riogrande_id;
        $this->dependencia_tolhuin_id = $trabajo->dependencia_tolhuin_id;
        $this->otras_institucione_id = $trabajo->otras_institucione_id;
        $this->tecnicocomunicacione_id = $trabajo->tecnicocomunicacione_id;
        $this->lugar_trabajo = $trabajo->lugar_trabajo;
        $this->fecha_trabajo = $trabajo->fecha_trabajo ? Carbon::parse($trabajo->fecha_trabajo)->format('Y-m-d') : null;
        $this->detalle_trabajo = $trabajo->detalle_trabajo;

    }*/


    public function render()
    {
        return view('livewire.comunicaciones.general.edit-trabajo-general');
    }

    public function edit()
    {
        $this->validate();

        $this->trabajo->dependencia_ushuaia_id = $this->dependencia_ushuaia_id ?: null;
        $this->trabajo->dependencia_riogrande_id = $this->dependencia_riogrande_id ?: null;
        $this->trabajo->dependencia_tolhuin_id = $this->dependencia_tolhuin_id ?: null;
        $this->trabajo->otras_institucione_id = $this->otras_institucione_id ?: null;
        $this->trabajo->tecnicocomunicacione_id = $this->tecnicocomunicacione_id ?: null;
        $this->trabajo->lugar_trabajo = $this->lugar_trabajo ?: null;
        $this->trabajo->fecha_trabajo = $this->fecha_trabajo ?: null;
        /* $this->trabajo->detalle_trabajo = $this->detalle_trabajo ?: null; */

        $this->trabajo->save();

        session()->flash('message', 'Datos actualizados correctamente.');
    }


    /* public function edit()
    {
        $this->validate();

        $this->trabajo->update([
            'dependencia_ushuaia_id' => $this->dependencia_ushuaia_id,
            'dependencia_riogrande_id' => $this->dependencia_riogrande_id,
            'dependencia_tolhuin_id' => $this->dependencia_tolhuin_id,
            'otras_institucione_id' => $this->otras_institucione_id,
            'tecnicocomunicacione_id' => $this->tecnicocomunicacione_id,
            'lugar_trabajo' => $this->lugar_trabajo,
            'fecha_trabajo' => $this->fecha_trabajo,
            'detalle_trabajo' => $this->detalle_trabajo,
        ]);

        session()->flash('message', 'Datos actualizados correctamente.');
    }*/
}
