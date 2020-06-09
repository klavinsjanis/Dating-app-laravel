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

class MatchEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public User $authUser;
    public User $user;

    public function __construct(User $authUser, User $user)
    {
        $this->authUser = $authUser;
        $this->user = $user;
    }

}
