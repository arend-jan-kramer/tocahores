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

$factory->define(App\Patient::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->firstname,
        'insection' => 'de',
        'last_name' => $faker->lastname,
        'address' => $faker->streetName                          ,
        'address_number' => $faker->buildingNumber,
        'city' => $faker->city,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

$factory->define(App\Password::class, function (Faker $faker) {
    static $password;

    return [
        'password' => $faker->password,
    ];
});
