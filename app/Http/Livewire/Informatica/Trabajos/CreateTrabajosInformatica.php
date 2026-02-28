<?php

namespace App\Http\Livewire\Informatica\Trabajos;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Livewire\Component;

use App\Models\Cientifica;
use App\Models\Cantidadram;
use App\Models\DependenciaUshuaia;
use App\Models\Generalinformatica;
use App\Models\Administraciongenerale;
use App\Models\Tipodeoficina;
use App\Models\Tipodispositivo;
use App\Models\Slotmemoria;
use App\Models\Administracion;
use App\Models\Custodiagubernamentale;
use App\Models\DependenciaTolhuin;
use App\Models\Jefatura;
use App\Models\Destacamento;
use App\Models\RecursoHumano;
use App\Models\Investigacione;
use App\Models\Serviciosespeciale;
use App\Models\Totaldependencia;
use App\Models\TrabajosInformatico;
use App\Models\HistorialDetalleInformatica;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Exception;
use Throwable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CreateTrabajosInformatica extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $modalContent = [];
    public $button = null;

    public $TOtaldependencia = [];
    public $Dependencia_Tolhuin = [];



    public $dependencia_tolhuin_id, $trabajosinformatico, $totaldependencia_id, $detalles_trabajo, $fecha_trabajo, $lugar_trabajo, $trabajoinformatica, $trabajos_informatica_id;


    protected $rules = [
        'totaldependencia_id' => 'nullable|exists:totaldependencias,id',
        'dependencia_tolhuin_id' => 'nullable|exists:dependencia_tolhuin,id',
        'detalles_trabajo' => 'nullable|string',
        'fecha_trabajo' => 'nullable|date',
        'lugar_trabajo' => 'nullable|string',
    ];


    public function mount($trabajos_informatica_id = null)
    {

        $this->totaldependencia_id = "";
        $this->dependencia_tolhuin_id = "";
        $this->trabajos_informatica_id = $trabajos_informatica_id;

        $this->Dependencia_Tolhuin = DependenciaTolhuin::all();
        $this->TOtaldependencia = Totaldependencia::all();
    }

    public function guardar()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            // Si ya existe un trabajo con ese ID, lo actualizamos
            if ($this->trabajos_informatica_id) {
                $this->trabajoinformatica = TrabajosInformatico::find($this->trabajos_informatica_id);
                if (!$this->trabajoinformatica) {
                    throw new Exception('Trabajo no encontrado.');
                }
            } else {
                // Si no existe, creamos uno nuevo
                $this->trabajoinformatica = new TrabajosInformatico();
            }

            // Asignación de valores
            $this->trabajoinformatica->totaldependencia_id = $this->totaldependencia_id === null || $this->totaldependencia_id === '' ? null : $this->totaldependencia_id;
            $this->trabajoinformatica->dependencia_tolhuin_id = $this->dependencia_tolhuin_id === null || $this->dependencia_tolhuin_id === '' ? null : $this->dependencia_tolhuin_id;
            $this->trabajoinformatica->fecha_trabajo = $this->fecha_trabajo === null || $this->fecha_trabajo === '' ? null : $this->fecha_trabajo;
            $this->trabajoinformatica->lugar_trabajo = $this->lugar_trabajo === null || $this->lugar_trabajo === '' ? null : $this->lugar_trabajo;
            $this->trabajoinformatica->detalles_trabajo = $this->detalles_trabajo === null || $this->detalles_trabajo === '' ? null : $this->detalles_trabajo;

            // Depuración: Imprime los datos antes de guardar
            logger()->info('Datos a guardar en trabajos_informaticos:', $this->trabajoinformatica->toArray());

            // Guardar el trabajo
            $this->trabajoinformatica->save();

            // Guardar en la tabla de historial si es una actualización
            if ($this->trabajos_informatica_id) {
                $historial = new HistorialDetalleInformatica();
                $historial->trabajos_informatica_id = $this->trabajoinformatica->id;
                $historial->detalles_trabajo = $this->detalles_trabajo;
                $historial->save();
            }

        $this->dispatchBrowserEvent('notificacion', [
                'type' => 'success',
                'message' => 'Datos guardados correctamente.'
            ]);
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            logger()->error('Error al guardar datos: ' . $e->getMessage());
            session()->flash('error', 'Error al guardar los datos.');
        }
    }









    public function showModal($button)
    {

        $this->modalContent = [];

        $this->button = $button;
        $this->showModal = true;

        switch ($button) {
            case 'Comisaria Primera':
                // Código para el caso 'Cria 1'
                break;
            case 'Comisaria Segunda':
                // Código para el caso 'Cria 2'
                break;
            case 'Comisaria Tercera':
                // Código para el caso 'Cria 3'
                break;
            case 'Comisaria Cuarta':
                // Código para el caso 'Cria 4'
                break;
            case 'Comisaria Quinta':
                // Código para el caso 'Cria 5'
                break;
            case 'Comisaria G.F y M.U-1':
                // Código para el caso 'Cria flia1'
                break;
            case 'Comisaria G.F y M.U-2':
                // Código para el caso 'Cria flia 2'
                break;
            case 'Servicios Especiales':
                // Código para el caso serv. especiales
                break;
            case 'Policia Cientifica':
                // Código para el caso 'Cientifica'
                break;
            case 'Custodia Gubernamental':
                // Código para el caso 'Gobierno'
                break;
            default:
                // Código por defecto si no se cumple ningún caso
                break;
        }


        $this->emit('openModal');
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        // Recupera el historial relacionado con el trabajo informático actual
        $historiales = HistorialDetalleInformatica::where('trabajos_informatica_id', $this->trabajos_informatica_id)
            ->orderBy('updated_at', 'desc') // Ordenar por la fecha de actualización más reciente
            ->get();

        return view('livewire.informatica.trabajos.create-trabajos-informatica', compact('historiales'));
    }
}
