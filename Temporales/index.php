<?php

namespace App\Http\Livewire\Prontuario1;

use Livewire\Component;
use App\Models\Identificado;
use App\Models\Domicilio;
use Livewire\WithPagination;
use App\Models\Contacto;
use App\Models\Persona;
use App\Models\FotoImage;
use App\Models\Foto;
use App\Models\ArchivoImage;
use App\Models\Archivo;
use App\Models\Tipodoc;

class Index extends Component
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
    use WithPagination;

    public function render()
    {
      /*  $personas=persona::where('nroProntuario','like',"%{$this->search}%")
        ->orWhere('nroLegajo','like',"%{$this->search}%")
        ->orWhere('nombre','like',"%{$this->search}%")
        ->orWhere('apellido','like',"%{$this->search}%")
        ->orWhere('nroDocumento','like',"%{$this->search}%")
        ->orderBy($this->sort1, $this->direction1)
        ->paginate($this->perPage);*/
        //->orwhere('active', $this->active)
       // $personas = $personas->paginate($this->perPage);

        //$archivo = Archivo::where('persona_id', $this->persona_id)->get();
        //$fotoImage = FotoImage::where('foto_id', $this->foto_id)->get();
       /* $contador_pront = Persona::latest()->value('nroProntuario');
        $contador_lega = Persona::latest()->value('nroLegajo');*/
        return view('livewire.prontuario1.index',compact('personas','contador_pront','contador_lega'));
    }

    public function order1($sort1)
    {
        if($this->sort1==$sort1){
            if ($this->direction1=='desc') {
                $this->direction1 ='asc';
            } else {
                $this->direction1='desc';
            }
        } else{
            $this->sort1=$sort1;
            $this->direction1 ='asc';
        }
    }

   /* public function mount()
    {
        $this->icon = $this->iconDirection($this->order);
    }*/

    public function clear()
    {
        $this->page = 1;
       // $this->orde = null;
       // $this->camp = null;
       // $this->icon = '-circle';
        $this->search = '';
        $this->perPage = 4;
        $this->perPage1 = 4;

        $this->buscar='';
        $this->sort='id';
        $this->direction='desc';
        $this->sort1='id';
        $this->direction1='desc';
        /*$this->order='desc';
        $this->order1='desc';*/
    }

    public function updatingSearch(){

        $this->resetPage();

    }


   /* public function delete(Persona $persona)
    {
        $this->emit("deleted");
         $persona->delete();
         return back()->with('success',' Prontuario Eliminado!!');
    }*/
   /* public function delete($id)
    {
          Persona::find($id)->delete();


    }

    public function delete($id)
    {
          Arma::find($id)->delete();
          return back()->with('success','Registro Eliminado!!');

    }




    public function delete($id)
    {
          Arma::find($id)->delete();
          return back()->with('success','Registro Eliminado!!');

    }*/

}
