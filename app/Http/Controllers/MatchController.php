<?php

namespace App\Http\Controllers;

use App\Events\MatchEvent;
use App\User;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function match(User $user)
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        $user = $authUser->filterAffection()
            ->inRandomOrder()
            ->filterGender()
            ->filterAge()
            ->first();

        return view('match', [
            'user' => $user
        ]);
    }

    public function likeUser(User $user)
    {
        $this->affect($user, 'like');
        return redirect()->back();
    }

    public function dislikeUser(User $user)
    {
        $this->affect($user, 'dislike');
        return redirect()->back();
    }

    private function affect(User $user, string $affectionType):void
    {
        /** @var User $authUser */
        $authUser = auth()->user();

        $hasAffection = $user->affections()
            ->where('affection_type', 'like')
            ->where('affection_to', $authUser->id)
            ->exists();

        if ($hasAffection) {
            //it's a match!
            $authUser->matches()->create([
                'user_id' => $authUser->id,
                'match_with' => $user->id,
            ]);

            event(new MatchEvent($user, $authUser));
        }

        $authUser->affections()->create([
            'affection_to' => $user->id,
            'affection_type' => $affectionType
        ]);
    }
}

