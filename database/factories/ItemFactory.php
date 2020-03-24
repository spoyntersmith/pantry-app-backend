<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\Category;
use App\ItemList;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->words(random_int(1, 2), true),
        'expiryDate' => date_format($faker->dateTimeBetween('now', '+2 years'), 'd-m-Y'),
        'bestBeforeDate' => date_format($faker->dateTimeBetween('now', '+2 years'), 'd-m-Y'),
        'quantity' => $faker->numberBetween(1, 100),
        'weight' => $faker->randomFloat(2, 0.0, 100),
        'item_list_id' => ItemList::all()->random()->id,
        'category_id' => Category::all()->random()->id,
    ];
});
