<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Viaje;
use Faker\Generator as Faker;

$factory->define(Viaje::class, function (Faker $faker) {
    return [
        'usuario' => factory('App\Usuario')->create()->id,
        'nombre'=> $faker->name,
        'descripcion' => $faker->paragraph,
        'foto'=>'https://source.unsplash.com/400x300/?travel,cities',
        'lugar'=> $faker->city,
        'presupuesto' => $faker->numberBetween(1,50000),
        'fecha'=> $faker->dateTimeThisDecade($max = '+10 years', $timezone = null),
        'planeado'=>$faker->boolean($chanceOfGettingTrue = 90),
        'realizado'=>$faker->boolean($chanceOfGettingTrue = 10),
    ];
});
