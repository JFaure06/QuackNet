<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Quack;
use Faker\Generator as Faker;

$factory->define(Quack::class, function (Faker $faker) {
    return [
        'tags' => $faker->text(20),
        'message' => $faker->paragraph
    ];
});
