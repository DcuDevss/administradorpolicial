<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Conversation;
use App\Models\User;

class VerNotificaciones extends Component
{
    use WithPagination;

    public $search = '';

    public $unreadNotificationsCount = 0;

    public function mount()
    {
        $this->unreadNotificationsCount = auth()->user()
            ->unreadNotifications
            ->count();
    }

    public function message($userId)
    {
        $authenticatedUserId = auth()->id();

        $existingConversation = Conversation::where(function ($query) use ($authenticatedUserId, $userId) {
            $query->where('sender_id', $authenticatedUserId)
                ->where('receiver_id', $userId);
        })
            ->orWhere(function ($query) use ($authenticatedUserId, $userId) {
                $query->where('sender_id', $userId)
                    ->where('receiver_id', $authenticatedUserId);
            })
            ->first();

        if ($existingConversation) {
            return redirect()->route('chat', [
                'query' => $existingConversation->id
            ]);
        }

        $createdConversation = Conversation::create([
            'sender_id' => $authenticatedUserId,
            'receiver_id' => $userId,
        ]);

        return redirect()->route('chat', [
            'query' => $createdConversation->id
        ]);
    }

    public function render()
    {
        $query = auth()->user()
            ->notifications()
            ->orderByDesc('created_at');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('data', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('created_at', 'LIKE', '%' . $this->search . '%');
            });
        }

        $notificaciones = $query->paginate(5);

        return view('livewire.ver-notificaciones', [
            'notificaciones' => $notificaciones,
            'users' => User::where('id', '!=', auth()->id())->get(),
        ]);
    }
}
