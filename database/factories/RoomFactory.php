<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Room;
use Faker\Generator as Faker;

$factory->define(App\Models\Room::class, function (Faker $faker) {
    return [
        'studio_id' => $faker -> numberBetween(1, 10),
        'type' => $faker->title,
        'description' => $faker->text(100),
        'price' => $faker->numberBetween(1000.15000),
        
    ];
});
