<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UpdateUserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if ($request->file('picture') !== null) {
            $user->deleteDislikes();
            $user->update([
                'avatar_location' => $request->file('picture')
                    ->storePublicly('public/profilePictures')
            ]);
        }

        if ($request->get('target_min_age') < $request->get('target_max_age')) {
            $user->update([
                'target_min_age' => $request->get('target_min_age'),
                'target_max_age' => $request->get('target_max_age')
            ]);
        }
        else {
            return redirect()
                ->back()
                ->with('status', __("Minimum target age can't be greater than Maximum target age!"));
        }

        $user->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'user_age' => $request->get('user_age'),
            'user_gender_id' => $request->get('user_gender_id'),
            'target_gender_id' => $request->get('target_gender_id'),
            'location' => $request->get('location'),
            'about' => $request->get('about'),
        ]);

        return redirect()
            ->back()
            ->with('status', __('Profile has been updated'));
    }
}
