<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home', function(){
	return View('home');
});

Route::get('about', function(){
	return View('about');
});

Route::get('index.html', function(){
	return View('home');
});

Route::get('index.php', function(){
	return View('home');
});

// Route::get('/mapa/{profe_id}', [
//     'as'   => 'mapa.create.profe',
//     'uses' => 'MapaController@create_profe'
// ]);

// Rutas para el centro
Route::resource('centro', 'CentroController');

// Rutas para el profesor
Route::resource('profesor', 'ProfesorController');

// Rutas para el alumno
Route::resource('alumno', 'AlumnoController');

// Rutas para el mapa
// Route::resource('mapa', 'MapaController');

// Rutas para el tema
Route::resource('tema', 'TemaController');

// Rutas para la terea
Route::resource('tarea', 'TareaController');

// Rutas para las notas
Route::resource('notas', 'NotasController');


?>