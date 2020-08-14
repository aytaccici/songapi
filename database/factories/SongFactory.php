<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->text(200)),
        'artist' => $faker->firstName. ' '. $faker->lastName,
        'lyric' => $faker->paragraph(2),
        'category_id' => factory(\App\Models\Category::class)
    ];
});
