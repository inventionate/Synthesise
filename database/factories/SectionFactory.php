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

$factory->define(Synthesise\Section::class, function (Faker $faker) {

    return [
        'name' => $faker->realText(64),
        'further_reading_path' => str_random(300),
        'seminar_name' => $faker->realText(222),
    ];
});
