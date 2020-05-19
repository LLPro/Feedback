<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feedback;
use Faker\Generator as Faker;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' =>$faker->e164PhoneNumber,
        'content' => $faker->realText(100),
    ];
});
