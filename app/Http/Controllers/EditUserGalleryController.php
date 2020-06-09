<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class EditUserGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function __invoke()
    {
        /** @var User $authUser */
        $user = auth()->user();

        return view('editGallery', [
            'user' => $user
        ]);

    }

    public function store(request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if ($request->file('picture') !== null) {
            $user->deleteDislikes();
            $user->pictures()->insert([
                'user_id' => $user->id,
                'path' => $request->file('picture')
                    ->storePublicly('/storage/profilePictures'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()
            ->back();
    }

}
