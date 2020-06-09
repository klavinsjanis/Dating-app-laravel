<?php

namespace App\Listeners;

use App\Events\MatchEvent;
use App\Mail\MatchEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMatchEmail implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(MatchEvent $event)
    {
        Log::info('sending mail to' . $event->authUser->email);
        Log::info('sending mail to' . $event->user->email);

        Mail::to($event->authUser->email)
            ->queue(new MatchEmail($event->authUser, $event->user)
            );

        Mail::to($event->user->email)
            ->queue(new MatchEmail($event->user, $event->authUser)
            );
    }
}
