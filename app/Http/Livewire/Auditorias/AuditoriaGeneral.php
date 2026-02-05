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

        $audits = Audit::with([
            'user',
            'auditable' => function ($morphTo) {
                $morphTo->morphWith([
                    \App\Models\Generalinformatica::class => [
                        'dependenciaushuaia',
                        'cientifica',
                        'serviciosespeciale',
                        'custodiagubernamentale',
                        'investigacione',
                        'recursohumano',
                        'jefatura',
                        'administracion'
                    ],
                    \App\Models\Riograndegenerale::class => [
                        'dependencia_riogrande',
                        'riogrande'
                    ],
                    \App\Models\Tolhuingenerale::class => [
                        'dependencia_tolhuin',
                        'tolhuin'
                    ],
                    \App\Models\Investigacionesgenerale::class => ['investigacione'],
                    \App\Models\Jefaturagenerale::class => ['jefatura'],
                    \App\Models\Recursoshumanosgenerale::class => ['recursohumano', 'bienestare', 'sumario'],
                    \App\Models\Serviciosespecialesgenerale::class => ['serviciosespeciale'],
                ]);
            }
        ])
            // 🔎 BÚSQUEDA INTEGRAL
            ->when($s !== '', function ($q) use ($s) {
                $q->where(function ($w) use ($s) {
                    // 1. Campos directos (Acción técnica y Descripción)
                    $w->whereRaw('LOWER(action) LIKE ?', ["%{$s}%"])
                        ->orWhereRaw('LOWER(description) LIKE ?', ["%{$s}%"])

                        // 2. Búsqueda por Nombre de Usuario
                        ->orWhereHas('user', function ($u) use ($s) {
                            $u->whereRaw('LOWER(name) LIKE ?', ["%{$s}%"]);
                        })

                        // 3. 🏢 BÚSQUEDA POR ENTIDAD (Relaciones polimórficas)
                        ->orWhereHasMorph('auditable', [
                            \App\Models\Generalinformatica::class,
                            \App\Models\Riograndegenerale::class,
                            \App\Models\Tolhuingenerale::class,
                            \App\Models\Investigacionesgenerale::class,
                            \App\Models\Jefaturagenerale::class,
                            \App\Models\Recursoshumanosgenerale::class,
                            \App\Models\Serviciosespecialesgenerale::class
                        ], function ($query, $type) use ($s) {
                            if ($type === \App\Models\Generalinformatica::class) {
                                $query->whereHas('dependenciaushuaia', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                                if (str_contains('ushuaia', $s)) $query->orWhere('id', '>', 0);
                            }
                            if ($type === \App\Models\Riograndegenerale::class) {
                                $query->whereHas('dependencia_riogrande', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                                if (str_contains('río grande', $s) || str_contains('rio grande', $s)) $query->orWhere('id', '>', 0);
                            }
                            if ($type === \App\Models\Tolhuingenerale::class) {
                                $query->whereHas('dependencia_tolhuin', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                                if (str_contains('tolhuin', $s)) $query->orWhere('id', '>', 0);
                            }
                            if ($type === \App\Models\Investigacionesgenerale::class) {
                                $query->whereHas('investigacione', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                            }
                            if ($type === \App\Models\Jefaturagenerale::class) {
                                $query->whereHas('jefatura', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                            }
                            if ($type === \App\Models\Recursoshumanosgenerale::class) {
                                $query->whereHas('recursohumano', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]))
                                    ->orWhereHas('bienestare', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]))
                                    ->orWhereHas('sumario', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                            }
                            if ($type === \App\Models\Serviciosespecialesgenerale::class) {
                                $query->whereHas('serviciosespeciale', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                            }
                        })

                        // 4. Mapeo de términos en español a la columna 'action'
                        ->when(str_contains($s, 'creado') || str_contains($s, 'alta'), function ($sub) {
                            $sub->orWhere('action', 'like', '%create%');
                        })
                        ->when(str_contains($s, 'actualizado') || str_contains($s, 'editado') || str_contains($s, 'edición'), function ($sub) {
                            $sub->orWhere('action', 'like', '%update%');
                        })
                        ->when(str_contains($s, 'eliminado') || str_contains($s, 'borrado'), function ($sub) {
                            $sub->orWhere('action', 'like', '%delete%');
                        });
                });
            })
            // 🎯 Filtros fijos
            ->when($this->action !== '', fn($q) => $q->where('action', $this->action))
            ->when($this->user_id !== '', fn($q) => $q->where('user_id', (int) $this->user_id))
            ->when($this->desde, fn($q) => $q->whereDate('created_at', '>=', $this->desde))
            ->when($this->hasta, fn($q) => $q->whereDate('created_at', '<=', $this->hasta))
            ->orderByDesc('id')
            ->paginate($this->perPage);

        return view('livewire.auditorias.auditoria-general', [
            'audits' => $audits,
            'users'  => User::orderBy('name')->get(),
        ])->layout('layouts.app');
    }
}
