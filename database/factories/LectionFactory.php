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

$factory->define(Synthesise\Lection::class, function (Faker $faker) {

    return [
        'name'               => $faker->realText(64),
        'author'             => $faker->name,
        'contact'            => $faker->email,
        'authorized_editors' => $faker->name,
        'image_path'         => 'path/to/image',
    ];
});
