<?php

use Faker\Generator as Faker;


$factory->define(App\Comment::class, function (Faker $faker) {
    

    return [
        'body' => $faker->text(150),
        'user_id' => $faker->numberBetween(1, 6),
        'gallery_id' => $faker->numberBetween(1, 6),
        'created_at' => $faker->date()

    ];
});
