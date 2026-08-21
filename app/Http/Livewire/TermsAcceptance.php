<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TermsCondition;
use App\Models\UserTermsAcceptance;

class TermsAcceptance extends Component
{
    public $terms;
    public $accepted = false;

    public function mount()
    {

        $this->terms = TermsCondition::where('activo', true)
            ->firstOrFail();
    }

    public function hydrate()
    {
    }

    public function accept()
    {

        $this->validate([
            'accepted' => 'required|accepted',
        ], [
            'accepted.accepted' => 'Debe haber leído y aceptado los términos y condiciones.',
        ]);

        UserTermsAcceptance::firstOrCreate(
            [
                'user_id' => auth()->id(),
                'terms_condition_id' => $this->terms->id,
            ],
            [
                'accepted_at' => now(),
            ]
        );

        return redirect()->route('dashboard');
    }

    public function render()
    {

        return view('livewire.terms-acceptance');
    }
}
