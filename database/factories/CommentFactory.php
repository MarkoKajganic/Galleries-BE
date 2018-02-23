<?php

use Faker\Generator as Faker;


$factory->define(App\Comment::class, function (Faker $faker) {
    

    return [
        'body' => $faker->text(150),
        'user_id' => $faker->numberBetween(1, 10),
        'gallery_id' => $faker->numberBetween(1, 30),
        'created_at' => $faker->date()

    ];
});
