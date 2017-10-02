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

$factory->define(Synthesise\Infoblock::class, function (Faker $faker) {

    return [
        'name'         => $faker->realText(120),
        'content'      => $faker->realText(500),
        'image_path'   => NULL,
        'text_path'    => NULL,
        'link_url'     => NULL,
        'seminar_name' => $faker->realText(16)
    ];
});
