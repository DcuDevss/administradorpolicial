<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conversation;
use Illuminate\Support\Facades\Cache;
use App\Models\Message;

class NotificacionChat extends Component
{
    public $selectedConversation;
    public $query;

    protected $listeners = ['refresh' => '$refresh'];

    /* public function deleteByUser($id)
    {
        $userId = auth()->id();
        $conversation = Conversation::find(decrypt($id));

        $conversation->messages()->each(function ($message) use ($userId) {
            if ($message->sender_id === $userId) {
                $message->update(['sender_deleted_at' => now()]);
            } elseif ($message->receiver_id === $userId) {
                $message->update(['receiver_deleted_at' => now()]);
            }
        });

        $receiverAlsoDeleted = $conversation->messages()
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                      ->orWhere('receiver_id', $userId);
            })->where(function ($query) use ($userId) {
                $query->whereNull('sender_deleted_at')
                      ->orWhereNull('receiver_deleted_at');
            })->doesntExist();

        if ($receiverAlsoDeleted) {
            $conversation->forceDelete();
        }

        return redirect(route('chatlist'));
    }*/
    /*
    public function unreadMessagesCount($conversation)
    {
        return $conversation->messages()
            ->where('receiver_id', auth()->id())
            ->whereNull('read_at')
            ->count();
    }

    public function render()
{
    $user = auth()->user();
    $totalUnreadMessagesCount = $user->unreadMessagesCount();

    return view('livewire.notificacion-chat', [
        'conversations' => $user->conversations()->latest('updated_at')->get(),
        'totalUnreadMessagesCount' => $totalUnreadMessagesCount,
    ]);
}
}
 */

    // C:\xampp\htdocs\administradorpolicial\app\Http\Livewire\NotificacionChat.php

    // ... (Resto del componente)

    public function unreadMessagesCount($conversation)
    {
        return $conversation->messages()
            ->where('receiver_id', auth()->id())
            ->whereNull('read_at')
            ->count();
    }


    public function render()
    {
        $user = auth()->user();

        if (!$user) {
            return view('livewire.notificacion-chat', [
                'conversations' => collect(),
                'totalUnreadMessagesCount' => 0,
            ]);
        }

        $conversations = $user->conversations()
            ->with(['lastMessage' => function ($q) {
                $q->select(
                    'messages.id',
                    'messages.conversation_id',
                    'messages.sender_id',
                    'messages.body',
                    'messages.created_at'
                );
            }])
            ->latest('updated_at')
            ->get();

        $totalUnreadMessagesCount = Cache::remember(
            "unread_total_{$user->id}",
            now()->addSeconds(10),
            fn () => Message::whereNull('read_at')
                ->where('receiver_id', $user->id)
                ->count()
        );

        return view('livewire.notificacion-chat', [
            'conversations' => $conversations,
            'totalUnreadMessagesCount' => $totalUnreadMessagesCount,
        ]);
    }

}
