<?php
namespace App\Lib\Messages;

use Illuminate\Database\Eloquent\Collection;

class MessageRepository
{
    /**
     * @param Message $message
     */
    public function save(Message $message)
    {
        $message->save();
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getMessages(int $userId): Collection
    {
        return Message::where('message_sender_id', '=', $userId)
            ->orWhere('message_receiver_id', '=', $userId)
            ->with('sender.profile')
            ->get()
            ->groupBy('message_sender_id');
    }
}
