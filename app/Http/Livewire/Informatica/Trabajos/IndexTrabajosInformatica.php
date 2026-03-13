<?php

namespace App\Http\Livewire\Informatica\Trabajos;

use Livewire\Component;
use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\DependenciaTolhuin;
use App\Models\DependenciaUshuaia;
use App\Models\Generalinformatica;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Administracion;
use App\Models\Administraciongenerale;
use App\Models\Jefatura;
use App\Models\Destacamento;
use App\Models\RecursoHumano;
use App\Models\Investigacione;
use App\Models\Investigacionesgenerale;
use App\Models\Serviciosespeciale;
use App\Models\TrabajosInformatico;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class IndexTrabajosInformatica extends Component
{
    use WithPagination;
    public $buscar='';
    public $perPage1 = '4';
    public $sort='id';
    public $direction='desc';
    public $arma=null;

    public $search='';
    public $perPage = '4';
    public $sort1='id';
    public $direction1='desc';
    protected $queryString = [
        'perPage'=>['except'=>'4'],
        'perPage1'=>['except'=>'4'],
        'direction'=>['except'=>'desc'],
        'direction1'=>['except'=>'desc'],
        'search'=>['except'=>''],
        'buscar'=>['except'=>''],
        'sort'=>['except'=>'id'],
        'sort1'=>['except'=>'id'],
    ];
    protected $listeners = ['render'=> 'render'];
    public function render()
    {
        $trabajos = TrabajosInformatico::where(function ($query) {
            $query->where('lugar_trabajo', 'like', "%{$this->search}%")
                ->orWhere('fecha_trabajo', 'like', "%{$this->search}%")
                ->orWhere('detalles_trabajo', 'like', "%{$this->search}%");

        })
        ->orWhereHas('dependenciatolhuin', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })
        ->orWhereHas('totaldependencia', function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%");
        })

        ->orderBy($this->sort1, $this->direction1)
        ->paginate($this->perPage);


        return view('livewire.informatica.trabajos.index-trabajos-informatica',compact('trabajos'));
    }

    public function eliminar($id)
    {
        $registro = TrabajosInformatico::findOrFail($id);
        $registro->delete(); // eliminación real

        $this->dispatchBrowserEvent('notificacion', [
            'type' => 'success',
            'message' => 'Registro eliminado correctamente'
        ]);
    }
}
