<?php

use Faker\Generator as Faker;


$factory->define(App\Gallery::class, function (Faker $faker) {
    
    // $images = collect([
    //     'https://goo.gl/SvUVUz',
    //     'https://goo.gl/mUtgrS',
    //     'https://goo.gl/YMhYs8',
    // ]);

    return [
        'title' => $faker->text(20),
        'description' => $faker->text(150),
        'image_urls' => $faker->imageUrl(),            //'image_urls' => $faker->random(3),
        'user_id' => $faker->numberBetween(1, 6),
        'created_at' => $faker->date()

    ];
});
