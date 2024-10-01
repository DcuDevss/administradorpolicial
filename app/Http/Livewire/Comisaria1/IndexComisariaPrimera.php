<?php

namespace App\Http\Livewire\Comisaria1;

use Livewire\Component;
use App\Models\ComisariaPrimera;
use App\Models\Cantidadram;
use App\Models\Tipodispositivo;
use App\Models\Tipodeoficina;

class IndexComisariaPrimera extends Component
{
    public function render()
    {
        $comisariaPri = ComisariaPrimera::all();
        return view('livewire.comisaria1.index-comisaria-primera', compact('comisariaPri'));
    }
}
