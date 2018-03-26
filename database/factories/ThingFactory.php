<?php

use Faker\Generator as Faker;

$factory->define(App\Thing::class, function (Faker $faker) {

    // Dates are not necessarily going to be realistic
    return [
        'name' => '2015 ' . $faker->company . ' School Thing',
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'date_start' => $faker->dateTimeInInterval('-36 months', '+20 months', null),
        'date_end' => $faker->dateTimeInInterval('-15 months', '+20 weeks', null),
        'created_at' => $faker->dateTimeInInterval('-19 weeks', '+14 months', null),
        'updated_at' => $faker->dateTimeInInterval('-5 weeks', '+5 weeks', null),
    ];
});
