<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Studio;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Studio::class, function (Faker $faker) {
    return [
        //データをセット
        'name' => $faker->company,
        'location' => $faker->address,
        'description' => $faker->text(100),
        'tel_num' => $faker->phoneNumber
    ];
});