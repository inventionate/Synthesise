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

$factory->define(Synthesise\Paper::class, function (Faker $faker) {

    return [
        'name'         => $faker->unique()->realText(64),
        'author'       => $faker->name,
        'path'         => 'path/to/text',
        'lection_name' => $faker->realText(100),
    ];
});
