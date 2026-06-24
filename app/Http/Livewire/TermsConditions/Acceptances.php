<?php

namespace App\Http\Livewire\TermsConditions;

use Livewire\Component;
use App\Models\User;
use App\Models\TermsCondition;
use App\Models\UserTermsAcceptance;

class Acceptances extends Component
{
    public $search = '';

    public function render()
    {
        $terms = TermsCondition::active();

        $accepted = collect();
        $pending = collect();

        if ($terms) {

            $accepted = UserTermsAcceptance::with([
                'user',
                'termsCondition',
            ])
            ->where(
                'terms_condition_id',
                $terms->id
            )
            ->whereHas('user', function ($query) {

                $query->where(
                    'name',
                    'like',
                    '%' . $this->search . '%'
                );

            })
            ->orderByDesc('accepted_at')
            ->get();

            $acceptedIds = UserTermsAcceptance::where(
                'terms_condition_id',
                $terms->id
            )->pluck('user_id');

            $pending = User::whereNotIn(
                'id',
                $acceptedIds
            )
            ->where(
                'name',
                'like',
                '%' . $this->search . '%'
            )
            ->get();
        }

        $acceptedCount = $accepted->count();
        $pendingCount = $pending->count();
        $totalCount = $acceptedCount + $pendingCount;

        return view(
            'livewire.terms-conditions.acceptances',
            compact(
                'accepted',
                'pending',
                'acceptedCount',
                'pendingCount',
                'totalCount'
            )
        );
    }
}
