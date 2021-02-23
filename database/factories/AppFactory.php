<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App;
use App\Category;
use Faker\Generator as Faker;

$factory->define(App::class, function (Faker $faker) {
    
    return [
            'name'=> $faker->sentence(2),
            'price' => $faker->numberBetween(1, 1000),
            'image' => 'app.png',
            'description' => $faker->text,
            'category_id' => Category::all()->random()->id,
    ];
});
