<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(200),
        'image' => $faker->imageUrl(),
        'price' => $faker->randomFloat(2, 1, 50)
    ];
});
