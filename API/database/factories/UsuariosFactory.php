<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuario;
use Faker\Generator as Faker;

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'nombre' => $faker->userName,
        'contraseña' => password_hash($faker->regexify('[A-Za-z0-9]{8}'),PASSWORD_DEFAULT)
    ];
});
