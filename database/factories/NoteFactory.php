<?php
use Faker\Generator as Faker;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Synthesise\Note::class, function (Faker $faker) {

    return [
        'note'         => Crypt::encrypt($faker->realText(64)),
        'user_id'      => $faker->unique()->randomDigitNotNull(),
        'cuepoint_id'  => $faker->unique()->randomDigitNotNull(),
        'lection_name' => $faker->realText(64),
        'seminar_name' => $faker->realText(176),
    ];
});
