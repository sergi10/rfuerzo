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

// Route::get('home', function(){
// 	return View('home');
// });

Route::get('about', function(){
	return View('about');
});

Route::get('index.html', function(){
	return View('home');
});

Route::get('index.php', function(){
	return View('home');
});

// Route::get('/tema/{profe_id}', [
//     'as'   => 'tema.create.profe',
//     'uses' => 'TemaController@create_profe'
// ]);

// Route::get('/login', function(){
// 	return View('login');
// });

// Rutas para el login
Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');

// Route::resource('login', 'HomeController',['only'=>['index','show']]);

// Gestion del acceso con el authcontroller de Laravel
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::post('auth/login', ['as'=>'login','uses'=>'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Route::post('auth/logout', ['as'=>'logout','uses'=>'Auth\AuthController@getLogout');

// Rutas para el centro
Route::resource('centro', 'CentroController');

// Rutas para el profesor
Route::resource('profesor', 'ProfesorController');

// Rutas para el alumno
Route::resource('alumno', 'AlumnoController');

// Rutas para el tema
Route::resource('tema', 'TemaController');

// Rutas para la terea
Route::resource('tarea', 'TareaController');

// Rutas para las notas
Route::resource('notas', 'NotasController');


?>