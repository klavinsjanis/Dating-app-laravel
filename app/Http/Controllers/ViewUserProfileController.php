<?php

namespace App\Http\Controllers;

use App\User;


class ViewUserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        /** @var User $authUser */
        $user = auth()->user();

        return view('profile', [
                'user' => $user,
            ]
        );
    }
}

