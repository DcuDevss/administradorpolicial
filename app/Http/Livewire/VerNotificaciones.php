<?php

namespace App\Http\Livewire;
use App\Events\NuevaRespuesta;
use Livewire\Component;
use App\Models\Notificacion;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\Conversation;
use App\Models\User;


class VerNotificaciones extends Component
{
    protected $listeners = ['nuevaRespuesta' => 'actualizarNotificaciones'];
    public $unreadNotificationsCount = 0;

    use WithPagination;

    public $search = ''; // Propiedad para el valor de búsqueda

    public function mount()
    {
        // Contar las notificaciones no leídas del usuario
        $this->unreadNotificationsCount = auth()->user()->unreadNotifications->count();
    }

    public function message($userId)
    {

      //  $createdConversation =   Conversation::updateOrCreate(['sender_id' => auth()->id(), 'receiver_id' => $userId]);

      $authenticatedUserId = auth()->id();

      # Check if conversation already exists
      $existingConversation = Conversation::where(function ($query) use ($authenticatedUserId, $userId) {
                $query->where('sender_id', $authenticatedUserId)
                    ->where('receiver_id', $userId);
                })
            ->orWhere(function ($query) use ($authenticatedUserId, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $authenticatedUserId);
            })->first();

      if ($existingConversation) {
          # Conversation already exists, redirect to existing conversation
          return redirect()->route('chat', ['query' => $existingConversation->id]);
      }

      # Creo nueva conversation
      $createdConversation = Conversation::create([
          'sender_id' => $authenticatedUserId,
          'receiver_id' => $userId,
      ]);

        return redirect()->route('chat', ['query' => $createdConversation->id]);

    }


    public function render()
    {
        $user = auth()->user();

        $query = $user->notificacionesRecibidas()
                       ->with('respuestas')
                       ->orderByDesc('id'); // Ordenar por ID de manera descendente

        // Aplico filtro de búsqueda si hay un valor en $search
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('mensaje', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('created_at', 'LIKE', '%' . $this->search . '%')
                  ->orWhereHas('usercomisaria', function ($q) {
                      $q->where('name', 'LIKE', '%' . $this->search . '%');
                  });
            });
        }

        $notificaciones = $query->paginate(5);

        $borrar=auth()->user()->unreadNotifications->markAsRead();
        //$this->emit('notificationsUpdated');

        return view('livewire.ver-notificaciones', compact('notificaciones','borrar'), [
            'users' => User::where('id', '!=', auth()->id())->get()
        ]);
    }

    public function cambiarEstado($notificacionId)
    {
        $notificacion = Notificacion::find($notificacionId);
        if ($notificacion) {
            $notificacion->update([
                'activa' => !$notificacion->activa,
            ]);
        }
    }


}








/*class VerNotificaciones extends Component
{
    protected $listeners = ['nuevaRespuesta' => 'actualizarNotificaciones'];

    use WithPagination;


    public function render()
{
    $user = auth()->user();
    $notificaciones = $user->notificacionesRecibidas()
                           ->with('respuestas')
                           ->orderByDesc('id') // Ordenar por ID de manera descendente
                           ->paginate(5);

    return view('livewire.ver-notificaciones', compact('notificaciones'));
}

    public function cambiarEstado($notificacionId)
    {
        $notificacion = Notificacion::find($notificacionId);
        if ($notificacion) {
            $notificacion->update([
                'activa' => !$notificacion->activa,
            ]);
        }
    }

}*/


