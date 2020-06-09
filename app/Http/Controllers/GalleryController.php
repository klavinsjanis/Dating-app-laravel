<?php

namespace App\Http\Controllers;


use App\User;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(User $user)
    {
        $pictures = $user->pictures()->get();

        return view('gallery', [
            'pictures' => $pictures,
            'user' => $user
        ]);

    }
}
