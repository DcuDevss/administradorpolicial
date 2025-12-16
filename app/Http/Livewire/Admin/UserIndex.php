<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind'; // Opcional: Asegura el estilo de Tailwind

    // 1. AÑADIR LA PROPIEDAD DE BÚSQUEDA
    public $search = '';

    // 2. Resetea la paginación al cambiar el término de búsqueda
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // 3. APLICAR LA LÓGICA DE FILTRADO
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(15);

        // 4. USAR LA VISTA EXISTENTE
        return view('livewire.admin.user-index', compact('users'));
    }
}
