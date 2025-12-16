<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination; // Usar paginación

class IndexRoles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $search = '';

    // Resetea la paginación al cambiar el término de búsqueda
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // 1. Consultar roles y filtrar por la propiedad $search
        $roles = Role::where('name', 'like', '%' . $this->search . '%')
            ->paginate(10); // Paginación

        // 2. Usar la vista del componente
        return view('livewire.admin.index-roles', [
            'roles' => $roles,
        ]);
    }
}
