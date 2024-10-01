<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Conversation;

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
