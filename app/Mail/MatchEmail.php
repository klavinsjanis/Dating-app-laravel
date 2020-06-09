<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchEmail extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;
    private User $authUser;

    public function __construct(User $user, User $authUser)
    {
        $this->user = $user;
        $this->authUser = $authUser;
    }

    public function build()
    {
        return $this->view('emails.match', [
                'user' => $this->user,
                'authUser' => $this->authUser
            ]
        );
    }
}
