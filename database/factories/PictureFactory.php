<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->randomNumber($nbDigits = 8),
        'user_id' => null,
        'path' => "https://placeimg.com/640/480/people",
        'order' => $faker->unique()->randomNumber($nbDigits = 8),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
