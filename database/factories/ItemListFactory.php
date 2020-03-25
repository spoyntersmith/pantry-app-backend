<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\ItemList;
use Faker\Generator as Faker;

$factory->define(ItemList::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
