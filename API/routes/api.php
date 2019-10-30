<?php

use Illuminate\Http\Request;

// Nuevo viaje
Route::post('/viajes', 'ViajeController@store');

// Actualizar viaje
Route::put('/viajes/{id}', 'ViajeController@update');

// Buscar un viaje por id
Route::get('/viajes/1/{id}/', 'ViajeController@showI');

// Buscar un viaje por nombre
Route::get('/viajes/2/{nombre}/', 'ViajeController@showN');

// Todos los viajes
Route::get('/viajes', 'ViajeController@index');

//Eliminar un viaje
Route::delete('/viajes/{id}', 'ViajeController@delete');