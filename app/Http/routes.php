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


Route::auth();
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

Route::group(['middleware' => 'guardian'], function () {


	Route::resource('administracion/estudiante','EstudianteController');
	Route::resource('administracion/tutor','TutorController');
	Route::resource('administracion/asignatura','AsignaturasController');
	Route::resource('administracion/categoria','CategoriaController');
	Route::resource('administracion/tutoria','TutoriaController');
	Route::resource('administracion/taller','TallerController');
	Route::resource('administracion/carrera','CarreraController');

	
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
	Route::post('administracion/tutoria/ver2/{id}','TutoriaController@correo');
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
	//comentario
	Route::get('administracion/estudiante/datos/{id}','EstudianteController@datos');
	Route::post('administracion/estudiante/datos','ComentarioController@store');
	Route::get('administracion/estudiante/edit/{id}','ComentarioController@edit');
	Route::put('administracion/estudiante/editC/{id}','ComentarioController@update');
	Route::delete('administracion/estudiante/datos/{id}','ComentarioController@eliminar');
	//atencion individual
	Route::post('administracion/estudiante/datos','AtencionController@store');
	Route::get('administracion/estudiante/editar/{id}','AtencionController@edit');
	Route::put('administracion/estudiante/editA/{id}','AtencionController@update');
	Route::delete('administracion/estudiante/comentarios/{id}','AtencionController@eliminar');

	Route::resource('administracion/usuarios','UsersController');
	Route::post('administracion/usuarios/{id?}/edit', 'UsersController@update');

	Route::get('administracion/perfil/datos', 'UsersController@perfil');
	Route::post('administracion/perfil/datos/{id}', 'UsersController@perfilu');

});

Route::group(['middleware' => 'guardian2'], function () {


	Route::resource('director/estudiante','DirectorController');

	Route::get('director/estudiante/datos/{id}','DirectorController@datos');

	Route::post('director/estudiante/datos','ComentarioController@stored');
	Route::get('director/estudiante/edit/{id}','ComentarioController@editd');
	Route::put('director/estudiante/editC/{id}','ComentarioController@updated');
	Route::delete('director/estudiante/datos/{id}','ComentarioController@eliminard');
	Route::get('director/perfil/datos', 'DirectorController@perfil');
	Route::post('director/perfil/datos/{id}', 'DirectorController@perfilu');



});

Route::group(['middleware' => 'guardian3'], function () {
	Route::resource('profesor/tutoria','ProfesorController');
	Route::get('profesor/tutoria/gestionar/{id}','ProfesorController@mostrarGestionar');
	Route::get('profesor/tutoria/ver/{id}','ProfesorController@ver');
	Route::get('profesor/tutoria/vertopico/topico/{id}','TopicoController@ver');
	Route::post('profesor/tutoria/vertopico/topico','TopicoController@store');
	Route::get('profesor/tutoria/vertopico/editar/{id}','TopicoController@edit');
	Route::put('profesor/tutoria/vertopico/editT/{id}','TopicoController@update');
	Route::delete('profesor/tutoria/vertopico/topico/{id}','TopicoController@eliminar');

	Route::get('profesor/tutoria/comentario/respuesta/{id}','RespuestaController@ver');
	Route::post('profesor/tutoria/comentario/respuesta','RespuestaController@store');
	Route::get('profesor/tutoria/comentario/editar/{id}','RespuestaController@edit');
	Route::put('profesor/tutoria/comentario/editR/{id}','RespuestaController@update');
	Route::delete('profesor/tutoria/comentario/respuesta/{id}','RespuestaController@eliminar');

	Route::get('profesor/perfil/datos', 'ProfesorController@perfil');
	Route::post('profesor/perfil/datos/{id}', 'ProfesorController@perfilu');



});

Route::group(['middleware' => 'guardian4'], function () {
	Route::resource('tutor/tutoria','TutorRolController');
	Route::get('tutor/tutoria/gestionar/{id}','TutorRolController@mostrarGestionar');
	Route::get('tutor/tutoria/ver/{id}','TutorRolController@ver');
	Route::get('tutor/tutoria/vertopico/topico/{id}','TopicoController@verd');
	Route::post('tutor/tutoria/vertopico/topico','TopicoController@stored');
	Route::get('tutor/tutoria/vertopico/editar/{id}','TopicoController@editd');
	Route::put('tutor/tutoria/vertopico/editT/{id}','TopicoController@updated');
	Route::delete('tutor/tutoria/vertopico/topico/{id}','TopicoController@eliminard');

	Route::get('tutor/tutoria/comentario/respuesta/{id}','RespuestaController@verd');
	Route::post('tutor/tutoria/comentario/respuesta','RespuestaController@stored');
	Route::get('tutor/tutoria/comentario/editar/{id}','RespuestaController@editd');
	Route::put('tutor/tutoria/comentario/editR/{id}','RespuestaController@updated');
	Route::delete('tutor/tutoria/comentario/respuesta/{id}','RespuestaController@eliminard');

	Route::get('tutor/perfil/datos', 'TutorRolController@perfil');
	Route::post('tutor/perfil/datos/{id}', 'TutorRolController@perfilu');
});

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
