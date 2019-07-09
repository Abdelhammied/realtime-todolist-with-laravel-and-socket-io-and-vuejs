<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'todo' => $faker->words(6, true),
        'status' => $faker->numberBetween(1, 3)
    ];
});
