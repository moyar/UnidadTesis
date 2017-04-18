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
Route::resource('administracion/categoria','CategoriaController');
Route::resource('administracion/tutoria','TutoriaController');
Route::resource('administracion/taller','TallerController');
Route::resource('administracion/asistencia','AsistenciaController');

//tutoria
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
Route::get('administracion/tutoria/ver/{id}','TutoriaController@ver');
//taller
Route::get('administracion/taller/asistencia/{id}','TallerController@crear');
Route::get('administracion/taller/gestionar/{id}','TallerController@mostrarGestionar');
//Route::post('administracion/taller/asistencia','TallerController@nuevaAsistencia');
Route::post('administracion/taller/asistencia','TallerController@nuevaAsistencia');
//Route::post('administracion/taller/asistencia','TallerController@rAsistencia');
Route::get('administracion/taller/asistencia/asi/{id}','TallerController@asisAlumno');
Route::post('administracion/taller/asistencia/asi','TallerController@saveAlumno');
Route::delete('administracion/taller/asistencia/{id}','TallerController@eliminar');
Route::get('administracion/taller/asistencia/edit/{id}','TallerController@editL');
Route::put('administracion/taller/asistencia/edit/{id}','TallerController@updateL');
Route::get('administracion/taller/ver/{id}','TallerController@ver');
//estudiante
Route::get('administracion/estudiante/datos/{id}','EstudianteController@datos');
Route::post('administracion/estudiante/datos','ComentarioController@store');
Route::get('administracion/estudiante/edit/{id}','ComentarioController@edit');
Route::put('administracion/estudiante/editC/{id}','ComentarioController@update');
Route::delete('administracion/estudiante/datos/{id}','ComentarioController@eliminar');