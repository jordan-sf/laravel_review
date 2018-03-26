<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {

    // The summarized review is a version of the original review that a site admin hypothetically modified/edited for length
    $summarized_review = $faker->optional(.3)->realText(250);

    // This helps ensure the realistic scenario of a review owning/having created more than one thing happens when seeding the DB
    // strings 'existing' and 'new' are just used for code clarity
    $reviewer_type = $faker->optional(.8)->randomDigitNotNull ? 'existing' : 'new';
    if($reviewer_type == 'existing') {
        $reviewer_id = $faker->numberBetween(1, App\User::max('id'));
    }
    else {
        $reviewer_id = function () {
            return factory(App\User::class)->create()->id;
        };
    }

    // This helps ensure the realistic scenario of a review owning/having created more than one thing happens when seeding the DB
    // strings 'existing' and 'new' are just used for code clarity
    $thing_type = $faker->optional(.87)->randomDigitNotNull ? 'existing' : 'new';
    if($thing_type == 'existing') {
        $thing_id = $faker->numberBetween(1, App\Thing::max('id'));
    }
    else {
        $thing_id = function () {
            return factory(App\Thing::class)->create()->id;
        };
    }

    // Dates are not necessarily going to be realistic
    return [
        'rating' => $faker->numberBetween(1,5),
        'review' => $faker->realText(config('app.max_characters_per_review', 500)),
        'summarized_review' => $summarized_review,
        'created_at' => $faker->dateTimeInInterval('-24 months', '+14 months', null),
        'updated_at' => $faker->dateTimeInInterval('-23 months', '+15 months', null),
        'thing_id' => $thing_id,
        'reviewer_id' => $reviewer_id,
    ];
});
