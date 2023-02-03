<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class SendMessageAdmin implements ShouldBroadcast 
 {
    use Dispatchable, InteractsWithSockets, SerializesModels;
    // |sebariskode.id|
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $message;
    public function __construct($message)
    {
        $this->message = $message;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */

    public function broadcastOn()
    {
        return new Channel('ggi_is_database_ticketing-message-notification');
    }

    public function broadcastAs()
    {
        return 'listen';
    }

    public function broadcastWith()
    {
        return ["message" => $this->message];
    }
}
