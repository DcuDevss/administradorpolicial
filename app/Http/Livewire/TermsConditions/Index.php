<?php

namespace App\Http\Livewire\TermsConditions;

use Livewire\Component;
use App\Models\TermsCondition;

class Index extends Component
{
    public $terms;

    public function mount()
    {
        $this->terms = TermsCondition::orderBy('id', 'desc')
            ->get();
    }

    public function activar($id)
    {
        TermsCondition::query()->update([
            'activo' => false
        ]);

        TermsCondition::where('id', $id)
            ->update([
                'activo' => true,
                'fecha_activacion' => now(),
            ]);

        $this->terms = TermsCondition::orderBy('id', 'desc')
            ->get();
    }

    public function desactivar($id)
    {
        TermsCondition::where('id', $id)
            ->update([
                'activo' => false
            ]);

        $this->terms = TermsCondition::orderBy('id', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.terms-conditions.index');
    }
}
