<?php

use Faker\Generator as Faker;


$factory->define(App\Gallery::class, function (Faker $faker) {
    
    return [
        'title' => $faker->text(20),
        'description' => $faker->text(150),
        'image_urls' => $faker->imageUrl(), 
        'user_id' => $faker->numberBetween(1, 10),
        'created_at' => $faker->date()

    ];
});
