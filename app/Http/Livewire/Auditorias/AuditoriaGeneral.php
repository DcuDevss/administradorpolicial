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


    /* Este si*/
    /* public function render()
    {
        $s = mb_strtolower(trim($this->search));

        $audits = Audit::with([
            'user',
            'auditable' => function ($morphTo) {
                $morphTo->morphWith([
                    \App\Models\Generalinformatica::class => ['dependenciaushuaia'],
                    \App\Models\Riograndegenerale::class => ['dependencia_riogrande'],
                    \App\Models\Tolhuingenerale::class => ['dependencia_tolhuin'],
                    \App\Models\Investigacionesgenerale::class => ['investigacione'],
                    \App\Models\Jefaturagenerale::class => ['jefatura'],
                    \App\Models\Recursoshumanosgenerale::class => ['recursohumano', 'bienestare', 'sumario'],
                    \App\Models\Serviciosespecialesgenerale::class => ['serviciosespeciale'],
                ]);
            }
        ])
            ->when($s !== '', function ($q) use ($s) {
                $q->where(function ($w) use ($s) {

                    // 1. 📅 BÚSQUEDA POR FECHA
                    $w->whereRaw("DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') LIKE ?", ["%{$s}%"])

                        // 2. ⚡ BÚSQUEDA POR ACCIÓN TÉCNICA (Lo que está en la DB)
                        ->orWhereRaw('LOWER(action) LIKE ?', ["%{$s}%"])

                        // 3. 📝 BÚSQUEDA POR DESCRIPCIÓN
                        ->orWhereRaw('LOWER(description) LIKE ?', ["%{$s}%"]);

                    // 4. 🔍 LOGICA ESTRICTA PARA "EQUIPO", "USUARIO" Y "ROL"
                    // Si busca "equipo", filtramos por acción 'create/update' Y que el tipo NO sea User ni Role
                    if (str_contains($s, 'equipo')) {
                        $w->orWhere(function ($sub) {
                            $sub->whereIn('action', ['create', 'update', 'delete'])
                                ->where('auditable_type', 'NOT LIKE', '%User%')
                                ->where('auditable_type', 'NOT LIKE', '%Role%');
                        });
                    }

                    // Si busca "usuario", filtramos específicamente por el modelo User
                    if (str_contains($s, 'usuario')) {
                        $w->orWhere(function ($sub) {
                            $sub->where('auditable_type', 'LIKE', '%User%');
                        });
                    }

                    // Si busca "rol", filtramos específicamente por el modelo Role
                    if (str_contains($s, 'rol')) {
                        $w->orWhere(function ($sub) {
                            $sub->where('auditable_type', 'LIKE', '%Role%');
                        });
                    }



                    // 5. 🔄 TRADUCCIONES SIMPLES (Alta, Edición, Eliminado)
                    if ($s === 'alta' || $s === 'creado') {
                        $w->orWhere('action', 'create');
                    }
                    if ($s === 'edicion' || $s === 'actualizado' || $s === 'editado') {
                        $w->orWhere('action', 'update');
                    }
                });
            })
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
    } */


    /* public function render()
    {
        $s = mb_strtolower(trim($this->search));

        $audits = Audit::with([
            'user',
            'auditable' => function ($morphTo) {
                $morphTo->morphWith([
                    \App\Models\Generalinformatica::class => ['dependenciaushuaia'],
                    \App\Models\Riograndegenerale::class => ['dependencia_riogrande'],
                    \App\Models\Tolhuingenerale::class => ['dependencia_tolhuin'],
                    \App\Models\Investigacionesgenerale::class => ['investigacione'],
                    \App\Models\Jefaturagenerale::class => ['jefatura'],
                    \App\Models\Recursoshumanosgenerale::class => ['recursohumano', 'bienestare', 'sumario'],
                    \App\Models\Serviciosespecialesgenerale::class => ['serviciosespeciale'],
                ]);
            }
        ])
            ->when($s !== '', function ($q) use ($s) {
                $q->where(function ($w) use ($s) {

                    // 1. 📅 TABLA AUDITS (Fecha, Acción, Descripción)
                    $w->whereRaw("DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') LIKE ?", ["%{$s}%"])
                        ->orWhereRaw('LOWER(action) LIKE ?', ["%{$s}%"])
                        ->orWhereRaw('LOWER(description) LIKE ?', ["%{$s}%"]);

                    // 2. 👤 BÚSQUEDA POR NOMBRE DE USUARIO (El que realizó la carga)
                    // Agregamos esta parte para buscar en la tabla 'users'
                    $w->orWhereHas('user', function ($sub) use ($s) {
                        $sub->whereRaw('LOWER(name) LIKE ?', ["%{$s}%"]);
                    });

                    // 3. 🏢 BÚSQUEDA EN DEPENDENCIAS Y CIUDADES
                    $w->orWhereHasMorph('auditable', [
                        \App\Models\Generalinformatica::class,
                        \App\Models\Riograndegenerale::class,
                        \App\Models\Tolhuingenerale::class,
                    ], function ($query, $type) use ($s) {

                        if ($type === \App\Models\Riograndegenerale::class) {
                            $query->whereHas('dependencia_riogrande', function ($sub) use ($s) {
                                $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]);
                            });
                        }

                        if ($type === \App\Models\Generalinformatica::class) {
                            $query->whereHas('dependenciaushuaia', function ($sub) use ($s) {
                                $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]);
                            });
                        }

                        if ($type === \App\Models\Tolhuingenerale::class) {
                            $query->whereHas('dependencia_tolhuin', function ($sub) use ($s) {
                                $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]);
                            });
                        }

                        // Palabras clave de ciudad
                        if (str_contains($s, 'ushuaia') && $type === \App\Models\Generalinformatica::class) {
                            $query->orWhere('id', '>', 0);
                        }
                        if ((str_contains($s, 'rio grande') || str_contains($s, 'río grande')) && $type === \App\Models\Riograndegenerale::class) {
                            $query->orWhere('id', '>', 0);
                        }
                    });

                    // 4. 🔄 TRADUCCIONES DE ACCIÓN
                    if (preg_match('/alta|crea/', $s)) $w->orWhere('action', 'create');
                    if (preg_match('/edit|actu|edici/', $s)) $w->orWhere('action', 'update');
                });
            })
            ->when($this->action !== '', fn($q) => $q->where('action', $this->action))
            ->when($this->user_id !== '', fn($q) => $q->where('user_id', (int) $this->user_id))
            ->when($this->desde, fn($q) => $q->whereDate('created_at', '>=', $this->desde))
            ->when($this->hasta, fn($q) => $q->whereDate('created_at', '<=', $this->hasta))
            ->orderByDesc('id')
            ->paginate($this->perPage);

        return view('livewire.auditorias.auditoria-general', [
            'audits' => $audits,
            'users'  => \App\Models\User::orderBy('name')->get(),
        ])->layout('layouts.app');
    } */

    public function render()
    {
        $s = mb_strtolower(trim($this->search));

        $audits = Audit::with([
            'user',
            'auditable' => function ($morphTo) {
                $morphTo->morphWith([
                    \App\Models\Generalinformatica::class => ['dependenciaushuaia'],
                    \App\Models\Riograndegenerale::class => ['dependencia_riogrande'],
                    \App\Models\Tolhuingenerale::class => ['dependencia_tolhuin'],
                    \App\Models\Investigacionesgenerale::class => ['investigacione'],
                    \App\Models\Jefaturagenerale::class => ['jefatura'],
                    \App\Models\Recursoshumanosgenerale::class => ['recursohumano', 'bienestare', 'sumario'],
                    \App\Models\Serviciosespecialesgenerale::class => ['serviciosespeciale'],
                ]);
            }
        ])
            ->when($s !== '', function ($q) use ($s) {
                $q->where(function ($w) use ($s) {

                    // 1. 📅 TABLA AUDITS (Campos base)
                    $w->whereRaw("DATE_FORMAT(created_at, '%d/%m/%Y %H:%i') LIKE ?", ["%{$s}%"])
                        ->orWhereRaw('LOWER(action) LIKE ?', ["%{$s}%"])
                        ->orWhereRaw('LOWER(description) LIKE ?', ["%{$s}%"]);

                    // 2. 👤 BÚSQUEDA POR USUARIO
                    $w->orWhereHas('user', function ($sub) use ($s) {
                        $sub->whereRaw('LOWER(name) LIKE ?', ["%{$s}%"]);
                    });

                    // 3. 🏢 MOTOR POLIMÓRFICO INTEGRADO
                    $w->orWhereHasMorph('auditable', [
                        \App\Models\Generalinformatica::class,
                        \App\Models\Riograndegenerale::class,
                        \App\Models\Tolhuingenerale::class,
                        \App\Models\Investigacionesgenerale::class, // Incluido para búsqueda
                        \App\Models\Jefaturagenerale::class,
                        \App\Models\Serviciosespecialesgenerale::class,
                    ], function ($query, $type) use ($s) {

                        // Lógica para Investigacionesgenerale (Tu consulta actual)
                        if ($type === \App\Models\Investigacionesgenerale::class) {
                            $query->whereHas('investigacione', function ($sub) use ($s) {
                                $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]);
                            });
                        }

                        // Lógica para Generalinformatica (Ushuaia General)
                        if ($type === \App\Models\Generalinformatica::class) {
                            $query->whereHas('dependenciaushuaia', function ($sub) use ($s) {
                                $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]);
                            });
                        }

                        // Lógica para Jefatura
                        if ($type === \App\Models\Jefaturagenerale::class) {
                            $query->whereHas('jefatura', function ($sub) use ($s) {
                                $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]);
                            });
                        }

                        // Lógica para Servicios Especiales
                        if ($type === \App\Models\Serviciosespecialesgenerale::class) {
                            $query->whereHas('serviciosespeciale', function ($sub) use ($s) {
                                $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]);
                            });
                        }

                        // Río Grande y Tolhuin
                        if ($type === \App\Models\Riograndegenerale::class) {
                            $query->whereHas('dependencia_riogrande', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                        }
                        if ($type === \App\Models\Tolhuingenerale::class) {
                            $query->whereHas('dependencia_tolhuin', fn($sub) => $sub->whereRaw('LOWER(nombre) LIKE ?', ["%{$s}%"]));
                        }

                        // Filtro por palabra clave de ciudad (Ushuaia aplica a varios modelos)
                        $modelosUshuaia = [
                            \App\Models\Generalinformatica::class,
                            \App\Models\Investigacionesgenerale::class,
                            \App\Models\Jefaturagenerale::class,
                            \App\Models\Serviciosespecialesgenerale::class,
                            \App\Models\Tolhuingenerale::class,
                        ];
                        if (str_contains($s, 'ushuaia') && in_array($type, $modelosUshuaia)) {
                            $query->orWhere('id', '>', 0);
                        }

                        if ((str_contains($s, 'rio grande') || str_contains($s, 'río grande')) && $type === \App\Models\Riograndegenerale::class) {
                            $query->orWhere('id', '>', 0);
                        }

                        // MODIFICACIÓN: Agregado bloque para detectar la palabra "tolhuin"
                        if (str_contains($s, 'tolhuin') && $type === \App\Models\Tolhuingenerale::class) {
                            $query->orWhere('id', '>', 0);
                        }
                    });

                    // 4. 🔄 TRADUCCIONES DE ACCIÓN
                    if (preg_match('/alta|crea/', $s)) $w->orWhere('action', 'create');
                    if (preg_match('/edit|actu|edici/', $s)) $w->orWhere('action', 'update');
                });
            })
            ->when($this->action !== '', fn($q) => $q->where('action', $this->action))
            ->when($this->user_id !== '', fn($q) => $q->where('user_id', (int) $this->user_id))
            ->when($this->desde, fn($q) => $q->whereDate('created_at', '>=', $this->desde))
            ->when($this->hasta, fn($q) => $q->whereDate('created_at', '<=', $this->hasta))
            ->orderByDesc('id')
            ->paginate($this->perPage);

        return view('livewire.auditorias.auditoria-general', [
            'audits' => $audits,
            'users'  => \App\Models\User::orderBy('name')->get(),
        ])->layout('layouts.app');
    }
}
