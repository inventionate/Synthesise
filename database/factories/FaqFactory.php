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

$factory->define(Synthesise\Faq::class, function (Faker $faker) {

    return [
        'area' => str_random(1),
        'subject' => str_random(10),
        'question' => $faker->realText(20),
        'answer' => $faker->realText(),
        'seminar_name' => $faker->realText(16)
    ];
});
