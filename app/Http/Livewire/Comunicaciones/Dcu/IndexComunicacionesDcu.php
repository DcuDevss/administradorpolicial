<?php
namespace App\Http\Livewire\Comunicaciones\Dcu;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comunicacionesdcu;

class IndexComunicacionesDcu extends Component
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

    protected $listeners = ['render' => 'render', 'deleteConfirmed' => 'delete'];

    protected $comunicacionesdcu;

    public function render()
    {
        $this->comunicacionesdcu = Comunicacionesdcu::with('categoriacomunicacions')
        ->where(function ($query) {
            $query->where('nombre', 'like', "%{$this->search}%")
                ->orWhereHas('categoriacomunicacions', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%");
                })
                ->orWhere('marca', 'like', "%{$this->search}%")
                ->orWhere('modelo', 'like', "%{$this->search}%")
                ->orWhere('numero_serie', 'like', "%{$this->search}%")
                ->orWhere('fecha_service', 'like', "%{$this->search}%")
                ->orWhere('tipo_service', 'like', "%{$this->search}%")
                ->orWhere('estado', 'like', "%{$this->search}%")
                ->orWhere('fecha_inventario', 'like', "%{$this->search}%")
                ->orWhere('detalle_inventario', 'like', "%{$this->search}%");
        })
        ->orderBy($this->sort1, $this->direction1)
        ->paginate($this->perPage);

        return view('livewire.comunicaciones.dcu.index-comunicaciones-dcu', [
            'comunicacionesdcu' => $this->comunicacionesdcu,
        ]);
    }

    public function order1($sort1)
    {
        if ($this->sort1 == $sort1) {
            $this->direction1 = $this->direction1 == 'desc' ? 'asc' : 'desc';
        } else {
            $this->sort1 = $sort1;
            $this->direction1 = 'asc';
        }
    }

    public function clear()
    {
        $this->page = 1;
        $this->search = '';
        $this->perPage = 4;
        $this->perPage1 = 4;
        $this->buscar = '';
        $this->sort = 'categoriacomunicacion_id';
        $this->direction = 'desc';
        $this->sort1 = 'categoriacomunicacion_id';
        $this->direction1 = 'desc';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete', ['comuId' => $id]);
    }


    public function delete($id)
    {
        $comunicacion = Comunicacionesdcu::findOrFail($id);
        $comunicacion->delete();

        session()->flash('message', 'Recurso eliminado correctamente.');
        $this->render(); // Refrescar la lista
    }

    public function eliminar($id)
    {
        $registro = ComunicacionesDcu::findOrFail($id);
        $registro->delete(); // eliminación real

        $this->dispatchBrowserEvent('notificacion', [
            'type' => 'success',
            'message' => 'Registro eliminado correctamente'
        ]);
    }
}
