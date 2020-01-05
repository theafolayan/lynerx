<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
// use Lynerx\Model;
use Illuminate\Support\Str;

$factory->define(Lynerx\Series::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'title' => $title,
        'slug' => Str::slug($title), 
        'description' =>$faker->paragraph('5'),
        'image_url' => $faker->imageUrl(),


    ];
});
