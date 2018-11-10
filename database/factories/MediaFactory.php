<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Media::class, function (Faker $faker) {

    $arrayOfTypes = ['App\Models\News', 'App\Models\Post', 'App\Models\User'];
    $arrayOfExtentions = [
        'jpeg',
        'tiff',
        'gif',
        'bmp',
        'png',
    ];

    return [
        'mediable_type' => $faker->randomElement($arrayOfTypes),
        'mediable_id' => $faker->numberBetween(2, 20),
        'path' => 'public/media',
        'collection' => $faker->text($maxNbChars = 100),
        'size' => $faker->numberBetween(100, 5000),
        'extension' => $faker->randomElement($arrayOfExtentions),
    ];
});
