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

$factory->define(Synthesise\Seminar::class, function (Faker $faker) {

    return [
        'name' => $faker->realText(64),
        'subject' => $faker->realText(128),
        'description' => $faker->realText(),
        'module' => str_random(5),
        'author' => $faker->name,
        'contact' => $faker->email,
        'authorized_editors' => $faker->name,
        'image_path' => str_random(25),
        'info_intro' => NULL,
        'info_lections' => NULL,
        'info_texts' => NULL,
        'info_exam' => NULL,
        'info_path' => NULL,
        'available_from' => $faker->dateTimeBetween('now', '+4 month'),
        'available_to' => $faker->dateTimeBetween('+4 week', '+10 month'),
        'disqus_shortname' => NULL,
    ];
});
