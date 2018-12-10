<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'user_id' => 1
    ];
});
