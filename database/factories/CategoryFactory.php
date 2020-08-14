<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use \App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'       => ucfirst($faker->text(100)),
        'image_path' => 'images/' . random_int(1, 2000)
    ];
});
