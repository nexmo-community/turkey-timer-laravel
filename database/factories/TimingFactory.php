<?php

use Faker\Generator as Faker;

$factory->define(App\Timing::class, function (Faker $faker) {
    return [
        'start_time' => mt_rand(0, 7200),
        'action' => $faker->realText(50)
    ];
});
