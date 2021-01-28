<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rolesindex', 'GestionPanelController@rolesindex');
Route::get('/permisos', 'GestionPanelController@permisosindex');
Route::get('/nuevorol', 'RolesController@create');
Route::resource('roles', 'RolesController');
Route::resource('permisos', 'PermissionController');
Route::resource('entidades', 'EntidadController');
Route::resource('usuarios', 'UsuarioController');
//Ruta para mandar los tipos de pruebas en pacientes.
Route::get('pruebas', 'PacienteController@create');
//Ruta para mandar los pacientes positivos para crear un caso positivo.
Route::get('pacientes', 'CasoPositivoController@create');
//Ruta para mandar los pacientes positivos para crear un control.
Route::get('caso_pacientes', 'ControlController@create');
//Ruta para consumir los pacientes activos y tener el historial
Route::get('historial_activos', 'HistorialActivoController@activo');
//Detalles de historial de casos activos.
Route::get('historial_activos/{id}', ['as' => 'historial_activos', 'uses' => 'HistorialActivoController@detalles']);

