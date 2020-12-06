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
