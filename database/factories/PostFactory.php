<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 20),
        'description' => $faker->text($maxNbChars = 50),
        'body' => $faker->text($maxNbChars = 200),
        'user_id' => $faker->numberBetween(2, 10),
        'category_id' => $faker->numberBetween(2, 8),
    ];
});
