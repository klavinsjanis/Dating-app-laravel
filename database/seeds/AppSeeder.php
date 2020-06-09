<?php

use App\Picture;
use App\User;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{

    public function run():void
    {
        $users = factory(User::class, 100)->create();

        foreach ($users as $user) {
            factory(Picture::class, 9)->create(['user_id' => $user->id]);
        }
    }

}
