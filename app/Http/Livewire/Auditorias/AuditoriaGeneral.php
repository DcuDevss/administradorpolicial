<?php

namespace App\Http\Livewire\Auditorias;

use App\Models\Audit;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AuditoriaGeneral extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    // 🔎 Filtros
    public string $search = '';
    public string $action = '';
    public string $user_id = '';
    public ?string $desde = null;
    public ?string $hasta = null;
    public int $perPage = 10;

    // Resetear paginación cuando cambia un filtro
    public function updating($name, $value)
    {
        $this->resetPage();
    }

    public function render()
    {
        $s = mb_strtolower(trim($this->search));

        $audits = Audit::with(['user', 'auditable'])
            // 🔎 búsqueda general
            ->when($s !== '', function ($q) use ($s) {
                $q->where(function ($w) use ($s) {
                    $w->whereRaw('LOWER(action) LIKE ?', ["%{$s}%"])
                        ->orWhereRaw('LOWER(description) LIKE ?', ["%{$s}%"]);
                });
            })
            // 🎯 filtros
            ->when(
                $this->action !== '',
                fn($q) =>
                $q->where('action', $this->action)
            )
            ->when(
                $this->user_id !== '',
                fn($q) =>
                $q->where('user_id', (int) $this->user_id)
            )
            ->when(
                $this->desde,
                fn($q) =>
                $q->whereDate('created_at', '>=', $this->desde)
            )
            ->when(
                $this->hasta,
                fn($q) =>
                $q->whereDate('created_at', '<=', $this->hasta)
            )
            ->orderByDesc('id')
            ->paginate($this->perPage);

        return view('livewire.auditorias.auditoria-general', [
            'audits' => $audits,
            'users'  => User::orderBy('name')->get(),
        ])
            ->layout('layouts.app');
    }
}
