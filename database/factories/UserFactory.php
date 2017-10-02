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

$factory->define(Synthesise\User::class, function (Faker $faker) {

    return [
        'username'  => $faker->unique()->name,
        'password'  => $faker->password,
        'firstname' => $faker->firstName,
        'lastname'  => $faker->lastName,
        'role'      => 'admin',
        'email'     => $faker->email,
    ];
});
