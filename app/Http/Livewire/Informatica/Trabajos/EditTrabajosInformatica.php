<?php

namespace App\Http\Livewire\Informatica\Trabajos;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;
use App\Models\Totaldependencia;
use App\Models\DependenciaTolhuin;
use App\Models\TrabajosInformatico;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EditTrabajosInformatica extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $TOtaldependencia = [];
    public $Dependencia_Tolhuin = [];



    public $dependencia_tolhuin_id, $trabajosinformatico, $totaldependencia_id, $detalles_trabajo, $fecha_trabajo, $lugar_trabajo, $informatico;


    protected $rules = [
        'totaldependencia_id' => 'nullable',
        'dependencia_tolhuin_id' => 'nullable',

        'detalles_trabajo' => 'nullable',
        'fecha_trabajo' => 'nullable',
        'lugar_trabajo' => 'nullable',
    ];


    public function mount(TrabajosInformatico $informatico)
    {


        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->TOtaldependencia = Totaldependencia::all();

        $this->informatico = $informatico;
        $this->totaldependencia_id = $informatico->totaldependencia_id ?? '';
        $this->dependencia_tolhuin_id = $informatico->dependencia_tolhuin_id ?? '';


        $this->detalles_trabajo = $informatico->detalles_trabajo ?? '';
        $this->fecha_trabajo = $informatico->fecha_trabajo ? Carbon::parse($informatico->fecha_trabajo)->format('Y-m-d') : '';
        $this->lugar_trabajo = $informatico->lugar_trabajo ?? '';
    }
    public function edit()
    {
        $this->validate();

        $this->informatico->dependencia_tolhuin_id = $this->dependencia_tolhuin_id ?: null;
        $this->informatico->totaldependencia_id = $this->totaldependencia_id ?: null;


        $this->informatico->detalles_trabajo = $this->detalles_trabajo ?: null;
        $this->informatico->fecha_trabajo = $this->fecha_trabajo ?: null;
        $this->informatico->lugar_trabajo = $this->lugar_trabajo ?: null;

        $this->informatico->save();

        // Generar el código QR después de guardar los cambios
        // $this->generateQRCode();
        $this->dispatchBrowserEvent('notificacion', [
        'type' => 'success',
        'message' => 'Datos Editados correctamente.'
        ]);
    }


    public function render()
    {
        return view('livewire.informatica.trabajos.edit-trabajos-informatica');
    }
}
