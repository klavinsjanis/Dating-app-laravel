<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomNumber($nbDigits = 8),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'user_gender_id' => random_int($min = 1, $max = 2),
        'target_gender_id' => random_int($min = 1, $max = 3),
        'user_age' => random_int($min = 26, $max = 60),
        'location' => $faker->city,
        'target_min_age' => random_int($min = 18, $max = 25),
        'target_max_age' => random_int($min = 26, $max = 60),
        'about' => $faker->text,
        'email' => $faker->unique()->safeEmail,
        'avatar_location' => "https://placeimg.com/640/480/people",
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
