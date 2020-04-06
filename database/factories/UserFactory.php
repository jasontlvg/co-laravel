<?php

use App\User;
use App\Estado;
use App\Resultado;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName($gender = 'male'|'female'),
        'apaterno' => $faker->lastName,
        'amaterno' => $faker->lastName,
        'edad' => $faker->numberBetween($min = 18, $max = 40),
        'sexo' => $faker->randomElement($array = array ('Masculino','Femenino')),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'cargo' => $faker->jobTitle,
        'jornada' => $faker->randomElement($array = array ('Diurna','Nocturna','Mixta')),
        'escolaridad' => $faker->randomElement($array = array ('Primaria','Secundaria','Preparatoria','Tecnica','Universidad')),
        'departamento_id' => $faker->randomElement($array = array (1,2,3,4,5)),
//        'password' => '$2y$10$YkpG5/TAVO5kjp/IV3zmouIFhmafAi8Lti7m/QwaZ.5CmZmRJWN7y', // password
        'password' => '$2y$10$ZZGCSbz7HME0.HHEqblqmuXdYWdiYHjLeKH9QhffAoSxwP2K.X5xW', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Resultado::class, function (Faker $faker) {
    return [
        'r' => $faker->randomElement($array = array (1,2,3,4,5,6))
    ];
});
