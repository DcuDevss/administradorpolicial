<?php

namespace App\Http\Livewire\Informatica\Recursos;

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
use App\Models\Recursoshumanosgenerale;
use App\Models\Sumario;
use App\Models\Bienestare;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class IndexRecursosGeneral extends Component
{
    use WithPagination;
    public $buscar = '';
    public $perPage1 = '4';
    public $sort = 'id';
    public $direction = 'desc';
    public $arma = null;

    public $search = '';
    public $perPage = '4';
    public $sort1 = 'id';
    public $direction1 = 'desc';
    protected $queryString = [
        'perPage' => ['except' => '4'],
        'perPage1' => ['except' => '4'],
        'direction' => ['except' => 'desc'],
        'direction1' => ['except' => 'desc'],
        'search' => ['except' => ''],
        'buscar' => ['except' => ''],
        'sort' => ['except' => 'id'],
        'sort1' => ['except' => 'id'],
    ];
    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $recurso = Recursoshumanosgenerale::where(function ($query) {
            $query->where('marca', 'like', "%{$this->search}%")
                ->orWhere('modelo', 'like', "%{$this->search}%")
                ->orWhere('procesador', 'like', "%{$this->search}%")
                // ->orWhere('monitor', 'like', "%{$this->search}%")
                ->orWhere('sistema_operativo', 'like', "%{$this->search}%")
                //->orWhere('tipo_impresora', 'like', "%{$this->search}%")
                ->orWhere('fecha_service', 'like', "%{$this->search}%")
                ->orWhere('tipo_service', 'like', "%{$this->search}%")
                ->orWhere('fecha_inventario', 'like', "%{$this->search}%")
                ->orWhere('tipo_ram', 'like', "%{$this->search}%")
                ->orWhere('tipo_disco', 'like', "%{$this->search}%")
                ->orWhere('cant_almacenamiento', 'like', "%{$this->search}%")
                ->orWhere('tipo_mouse', 'like', "%{$this->search}%")
                ->orWhere('tipo_teclado', 'like', "%{$this->search}%")
                ->orWhere('activo', 'like', "%{$this->search}%")
                ->orWhere('softwares_instalados', 'like', "%{$this->search}%")
                ->orWhere('detalles_inventario', 'like', "%{$this->search}%");
        })
            ->orWhereHas('recursohumano', function ($query) {
                $query->where('nombre', 'like', "%{$this->search}%");
            })
            ->orWhereHas('sumario', function ($query) {
                $query->where('nombre', 'like', "%{$this->search}%");
            })
            ->orWhereHas('bienestare', function ($query) {
                $query->where('nombre', 'like', "%{$this->search}%");
            })
            ->orWhereHas('tipodispositivo', function ($query) {
                $query->where('nombre', 'like', "%{$this->search}%");
            })
            ->orWhereHas('cantidadram', function ($query) {
                $query->where('cantidad', 'like', "%{$this->search}%");
            })
            ->orWhereHas('slotmemoria', function ($query) {
                $query->where('cantidad', 'like', "%{$this->search}%");
            })
            ->with([
                'recursohumano',
                'bienestare',
                'sumario',
                'tipodispositivo',
                'cantidadram',
                'slotmemoria',
            ])
            ->orderBy($this->sort1, $this->direction1)
            ->paginate($this->perPage);



        return view('livewire.informatica.recursos.index-recursos-general', compact('recurso'));
    }

    public function order1($sort1)
    {
        if ($this->sort1 == $sort1) {
            if ($this->direction1 == 'desc') {
                $this->direction1 = 'asc';
            } else {
                $this->direction1 = 'desc';
            }
        } else {
            $this->sort1 = $sort1;
            $this->direction1 = 'asc';
        }
    }

    public function clear()
    {
        $this->page = 1;
        // $this->orde = null;
        // $this->camp = null;
        // $this->icon = '-circle';
        $this->search = '';
        $this->perPage = 4;
        $this->perPage1 = 4;

        $this->buscar = '';
        $this->sort = 'id';
        $this->direction = 'desc';
        $this->sort1 = 'id';
        $this->direction1 = 'desc';
        /*$this->order='desc';
        $this->order1='desc';*/
    }

    public function updatingSearch()
    {

        $this->resetPage();
    }

    public function eliminar($id)
    {
        $registro = Recursoshumanosgenerale::findOrFail($id);
        $registro->delete(); // eliminación real

        $this->dispatchBrowserEvent('notificacion', [
            'type' => 'success',
            'message' => 'Registro eliminado correctamente'
        ]);
    }
}
