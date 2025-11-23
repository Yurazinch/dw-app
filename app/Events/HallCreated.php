<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Hall;

class HallCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Создайте новый экземпляр события.
     */
    public function __construct()
    {
        
    }

    /**
     * Получите каналы, на которых будет транслироваться мероприятие.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('hall'),
        ];
    }
}
