<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Quack;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->paragraph,
        'quack_id' => function () {
            return Quack::inRandomOrder()->first()->id;
        }
    ];
});
