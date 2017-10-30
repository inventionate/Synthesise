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

$factory->define(Synthesise\Sequence::class, function (Faker $faker) {

    return [
        'name'         => $faker->realText(64),
        'position'     => $faker->randomDigitNotNull(),
        'video'        => TRUE,
        'path'         => 'sample/path',
        'lection_name' => $faker->realText(64),
        'help_points'  => json_encode([rand(1,10), rand(1,20), rand(10, 30), rand(100, 150), rand(1, 100)]),
    ];
});
