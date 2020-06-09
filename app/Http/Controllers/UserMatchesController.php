<?php

namespace App\Http\Controllers;

use App\User;


class UserMatchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userMatch()
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        $users = $authUser->filterMatches()->get();

        return view('matches', [
            'users' => $users
        ]);
    }
}
