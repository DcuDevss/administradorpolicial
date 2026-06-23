<?php

namespace App\Http\Livewire\TermsConditions;

use Livewire\Component;
use App\Models\TermsCondition;

class Create extends Component
{
    public $titulo;
    public $version;
    public $contenido;

    public function save()
    {
        $this->validate([
            'titulo' => 'required',
            'version' => 'required',
            'contenido' => 'required',
        ]);

        TermsCondition::create([
            'titulo' => $this->titulo,
            'version' => $this->version,
            'contenido' => $this->contenido,
            'activo' => false,
        ]);

        session()->flash(
            'message',
            'Términos creados correctamente.'
        );

        return redirect()->route('terms.index');
    }

    public function render()
    {
        logger('RENDER CREATE');
        return view('livewire.terms-conditions.create');
    }
}
