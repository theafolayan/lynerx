<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Lynerx\Lesson;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'description' => $faker->paragraph(8, true),
        'series_id' => function(){
            return factory(Lynerx\Series::class)->create()->id;
        },
        'episode_number'=> 100,
        'video_id' => '230485453'

    ];
});
