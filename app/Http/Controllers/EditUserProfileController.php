<?php

namespace App\Http\Controllers;

use App\User;


class EditUserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function __invoke()
    {
        /** @var User $authUser */
        $user = auth()->user();

        return view('editProfile', [
            'user' => $user
        ]);
    }
}
