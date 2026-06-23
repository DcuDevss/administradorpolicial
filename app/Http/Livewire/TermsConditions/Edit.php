<?php

namespace App\Http\Livewire\TermsConditions;

use Livewire\Component;
use App\Models\TermsCondition;

class Edit extends Component
{
    public $titulo;
    public $version;
    public $contenido;

    public TermsCondition $terms;

    public function mount(TermsCondition $terms)
    {

        $this->terms = $terms;

        $this->titulo = $terms->titulo;
        $this->version = $terms->version;
        $this->contenido = $terms->contenido;
    }

    public function save()
    {
        if ($this->terms->activo) {

            session()->flash(
                'error',
                'No se puede editar una versión activa.'
            );

            return;
        }

        $this->validate([
            'titulo' => 'required',
            'version' => 'required',
            'contenido' => 'required',
        ]);

        $this->terms->update([
            'titulo' => $this->titulo,
            'version' => $this->version,
            'contenido' => $this->contenido,
        ]);

        session()->flash(
            'message',
            'Términos actualizados correctamente.'
        );

        return redirect()->route('terms.index');
    }

    public function render()
    {
        return view('livewire.terms-conditions.edit');
    }
}
