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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'login' => 'root',
        'name' => 'Root',
        'surname' => 'Root',
        'email' => 'mikhail.garmashov@gmail.com',
        'password' => Hash::make('moscow')
    ];
});
