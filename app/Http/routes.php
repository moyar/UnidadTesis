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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('administracion/estudiante','EstudianteController');
Route::resource('administracion/tutor','TutorController');
Route::resource('administracion/asignatura','AsignaturasController');
Route::resource('administracion/dtaller','dtallerController');
Route::resource('administracion/tutoria','TutoriaController');
Route::resource('administracion/taller','TallerController');
Route::resource('administracion/asistencia','AsistenciaController');
Route::get('administracion/tutoria/asistencia/{id}','TutoriaController@crear');
Route::get('administracion/tutoria/gestionar/{id}','TutoriaController@mostrarGestionar');
//Route::post('administracion/tutoria/asistencia','TutoriaController@nuevaAsistencia');
Route::post('administracion/tutoria/asistencia','FechaTutoriasController@nuevaAsistencia');
//Route::post('administracion/tutoria/asistencia','EstudianteFechaController@rAsistencia');
Route::get('administracion/tutoria/asistencia/asi/{id}','TutoriaController@asisAlumno');
Route::post('administracion/tutoria/asistencia/asi','TutoriaController@saveAlumno');

Route::delete('administracion/tutoria/asistencia/{id}','TutoriaController@eliminar');

Route::get('administracion/tutoria/asistencia/edit/{id}','TutoriaController@editL');
Route::put('administracion/tutoria/asistencia/edit/{id}','TutoriaController@updateL');