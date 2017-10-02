<?php

use Faker\Generator as Faker;
use App\User;
use App\Models\Category;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'main' => $faker->text(200),
        'price' => $faker->randomFloat(2, 0.01,9999.99),
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
        'updated_at' => $faker->dateTimeBetween('-1 years', 'now')
    ];
});