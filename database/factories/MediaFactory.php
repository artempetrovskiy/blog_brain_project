<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Media::class, function (Faker $faker) {

    $arrayOfTypes = ['App\Models\News', 'App\Models\Post', 'App\Models\User'];
    $arrayOfExtentions = [
        'jpg',
        'png',
    ];

    return [
        'mediable_type' => $faker->randomElement($arrayOfTypes),
        'mediable_id' => $faker->numberBetween(1, 10),
        'path' => 'media/' . $faker->numberBetween(1, 16) . '.jpg',
        'size' => $faker->numberBetween(100, 5000),
        'extension' => $faker->randomElement($arrayOfExtentions),
    ];
});
