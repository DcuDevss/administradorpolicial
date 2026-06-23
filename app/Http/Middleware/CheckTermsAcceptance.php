<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\TermsCondition;
use App\Models\UserTermsAcceptance;

class CheckTermsAcceptance
{
    public function handle($request, Closure $next)
    {
        if ($request->is('livewire/*')) {
            return $next($request);
        }

        if (!auth()->check()) {
            return $next($request);
        }

        if (
            $request->routeIs('terms.accept') ||
            $request->routeIs('logout')
        ) {
            return $next($request);
        }

        $terms = TermsCondition::where('activo', true)->first();

        if (!$terms) {
            return $next($request);
        }

        $accepted = UserTermsAcceptance::where('user_id', auth()->id())
            ->where('terms_condition_id', $terms->id)
            ->exists();

        if (!$accepted) {
            return redirect()->route('terms.accept');
        }

        return $next($request);
    }
}
