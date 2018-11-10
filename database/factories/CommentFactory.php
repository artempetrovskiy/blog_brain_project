<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {

    $arrayValues = ['App\Models\News', 'App\Models\Post', 'App\Models\Review'];

    return [
        'message' => $faker->text($maxNbChars = 200),
        'user_id' => $faker->numberBetween(1, 11),
        'commentable_type' => $faker->randomElement($arrayValues),
        'commentable_id' => $faker->numberBetween(2, 20),
        'approved' => $faker->boolean(80)
    ];
});
