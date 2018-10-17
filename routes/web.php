<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ruta para obtener la vista de login
Route::get('/', 'appController@welcome');
//ruta para obtener la vista de bienvenido
Route::get('/inicio','appController@main')->middleware('auth');
//ruta para obtener la vista de  la carga horaria
Route::get('/cargaHoraria','appController@cargaHoraria')->middleware('auth');
//ruta para obtener la vista de asignaturas
Route::get('/asignaturas','appController@asignaturas')->middleware('auth');
//ruta para obtener la vista de profesores
Route::get('/profesores','ProfesorController@index')->middleware('auth');
//ruta para redirigir al perfil de profesor pasano el objeto profesor
Route::get('/profesores/{profesor}/','ProfesorController@showPerfil')->middleware('auth');
//ruta para obtener la vista de carreras
Route::get('/carreras','appController@carreras')->middleware('auth');
//ruta para obtener la vista de catalogos
Route::get('/catalogos','appController@catalogos')->middleware('auth');
//ruta para obtener la vista de usuarios
Route::get('/usuarios','UsuarioController@index')->middleware('auth');
//ruta para obtener la lista de especialidades de acuerdo al programa educativo
Route::get('/json-especialidades','ProgramaEducativoController@getEspecialidades');
//ruta para obtener los cuatrimestres de acuerdo con su especialdad 
Route::get('/json-cuatrimestres','ProgramaEducativoController@getCuatrimestres');
//ruta para obtener los cuatrimestres de acuerdo con su especialdad 
Route::get('/json-asignaturas','ProgramaEducativoController@getAsignaturas');

//TODOS ROUTES QUE TRAERÁ POR POST PARA LOGIN
//Ruta post que recibe el formulario de login
Route::post('/login','Auth\LoginController@login')->name('login');
//Ruta post que recibe el formulario de logout
Route::post('/logout','Auth\LoginController@logout')->name('logout');
//TODOS ROUTES QUE TRAERÁ POR POST PARA PROFESOR
//Ruta post que recibe el formulario de nuevo profesor
Route::post('/nuevoProfesor','ProfesorController@nuevoProfesor')->name('nuevoProfesor');
//ruta post que recibe el id para eliminar a un profesor 
Route::post('/eliminarProfesor','ProfesorController@eliminarProfesor')->name('eliminarProfesor');
//ruta post que recibe el id para actualizar a un profesor
Route::post('/actualizarProfesor','ProfesorController@actualizarProfesor')->name('actualizarProfesor');
//TODOS ROUTES QUE TRAERÁ POR POST PARA CARGA HORARIA
Route::post('/agregarHoras','Carga_horariaController@agregarHoras')->name('agregarHoras');
//método para agregar la asinacion de materias a un profesor
Route::post('/agregarAsignacionAsignatura','Carga_HorariaController@agregarAsignacionAsignatura')->name('agregarAsignacionAsignatura');
//post para eliminar la asignación de horas 
Route::post('/eliminarAsignacionAsignatura','Carga_HorariaController@eliminarAsignacionAsignatura')->name('eliminarAsignacionAsignatura');
//post para agregar las actvidades extra de un profesor
Route::post('/agregarActividadesExtra','Carga_HorariaController@agregarActividadesExtra')->name('agregarActividadesExtra');
//post para eliminar las actvidades extra de un profesor
Route::post('/eliminarActividadExtra','Carga_HorariaController@eliminarActividadExtra')->name('eliminarActividadExtra');
//post para eliminar la carga horaria de un profesor
Route::post('/eliminarCargaHoraria','Carga_HorariaController@eliminarCargaHoraria')->name('eliminarCargaHoraria');

/*RUTA PARA LOS MODULOS DE PROFESORES*/
//Ruta que devuelve un form por post para agregar un nuevo usuario
Route::post('/nuevoUsuario','UsuarioController@nuevoUsuario')->name('nuevoUsuario');
//Ruta que trae el id por post para eliminar a un usuario 
Route::post('/borrarUsuario','UsuarioController@borrarUsuario')->name('borrarUsuario');
//ruta que trae al usuario para mostrar su perfil 
Route::get('/usuarios/{usuario}','UsuarioController@showPerfil')->name('showPerfil');
//Ruta que devielve un form por post para actualizar a un usuario  
Route::post('/actualizarUsuario','UsuarioController@actualizarUsuario')->name('actualizarUsuario');
/*/RUTA PARA LOS MODULOS DE PROFESORES*/
//|----------------------------------------------------------------------------------------------------------
////////////////////RUTAS DEL MODULO DE ASIGNATURAS////////////////////////////////////////////////////////
//|----------------------------------------------------------------------------------------------------------
//Ruta para registrar una asignatura
Route::post('/GuardarAsignatura', ['uses' => 'crudAsignaturas@store', 'as' => 'GuardarAsignatura']);
//Ruta para Editar Asignatura
Route::get('/editAsignatura/{id}', 'crudAsignaturas@editAsignatura')->name('editAsignatura');
Route::post('/modalEditAsignatura/{id}', 'crudAsignaturas@editarAsignatura')->name('modalEditAsignatura');
//Ruta para eliminar una asignaruta
Route::DELETE('/destroyAsignatura/{id}', 'crudAsignaturas@destroyAsignatura')->name('destroyAsignatura');
//Ruta para mostrar tabla de asignaturas
Route::get('/asignaturas', 'crudAsignaturas@index')->middleware('auth');
//Ruta para cmbiar select dinamico de Especialidades Para modal Nueva Asignatura
Route::get('/json-Carreras', 'crudAsignaturas@especialidades');
//Ruta para cmbiar select dinamico de Cuatrimestre Para modal Nueva Asignatura
Route::get('/json-Cuatri', 'crudAsignaturas@cuatris');
//Ruta para cmbiar select dinamico de Especialidades Para modal Editar Asignatura
Route::get('/json-CarrerasE', 'crudAsignaturas@especialidadesE');
//Ruta para cmbiar select dinamico de Cuatrimestre Para modal  Editar Asignatura
Route::get('/json-CuatriE', 'crudAsignaturas@cuatrisE');
//////////////////// FIN DE LAS RUTAS DEL MODULO DE ASIGNATURAS////////////////////////////////////////////////////////


//|----------------------------------------------------------------------------------------------------------
////////////////////RUTAS DEL MODULO DE CARRRERAS////////////////////////////////////////////////////////
//|----------------------------------------------------------------------------------------------------------
//Ruta para mostrar las especialidades
Route::get('carreras', 'crudCarrearas@index')->middleware('auth');
//Ruta para registrar una especialidad
Route::post('/Guardar', ['uses' => 'crudCarrearas@store', 'as' => 'Guardar']);
//Ruta para eliminar especialidad
Route::DELETE('/destroyCarrera/{id}', 'crudCarrearas@destroyCarrera')->name('destroyCarrera');
//Rutas para editar especialidad
Route::post('/modalEditCarrera/{id}', 'crudCarrearas@edit')->name('modalEditCarrera');
//////////////////// FIN DE LAS RUTAS DEL MODULO DE CARRERAS////////////////////////////////////////////////////////

//|----------------------------------------------------------------------------------------------------------
////////////////////RUTAS DEL MODULO DE CARGA HORARIA////////////////////////////////////////////////////////
//|----------------------------------------------------------------------------------------------------------
Route::get('cargaHoraria', 'cargaHorariaController@index');
//Route::DELETE('/horasAsignadas/{id}', 'crudCarrearas@mostrarHorasAsignadas')->name('horasAsignadas');
//////////////////// FIN DE LAS RUTAS DEL MODULO DE CARGA HORARIA////////////////////////////////////////////////////////

//|----------------------------------------------------------------------------------------------------------
////////////////////RUTAS DEL MODULO DE CATALOGOS////////////////////////////////////////////////////////
//|----------------------------------------------------------------------------------------------------------
//Ruta para mostrar las especialidades
Route::get('catalogos', 'catalogoController@index');
Route::get('/verCarrera/{id}', 'catalogoController@verCarrera')->name('verCarrera');
//////////////////// FIN DE LAS RUTAS DEL MODULO DE CATALOGOS////////////////////////////////////////////////////////



Auth::routes();
