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

$factory->define(Synthesise\Cuepoint::class, function (Faker $faker) {

    return [
        'cuepoint'    => $faker->unique()->randomDigitNotNull(),
        'content'     => $faker->realText(123),
        'sequence_id' => $faker->randomDigitNotNull(),
    ];
});
