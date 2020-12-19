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

Route::get('/user_roles/{id}', 'RolesController@user_roles')->name('user_roles');
Route::post('/refresh_user_rol/{id}', 'RolesController@refresh_user_roles')->name('refreshroles');
Route::get('/user_perm/{id}', 'PermissionController@user_perm')->name('user_perm');
Route::post('/refresh_user_perm/{id}', 'PermissionController@refresh_user_perm')->name('refreshperm');
Route::get('/role_perms/{id}', 'PermissionController@role_perm')->name('role_perms');
Route::post('/refresh_role_perms/{id}', 'PermissionController@refresh_role_perm')->name('refreshroleperm');
Route::get('/permisos', 'GestionPanelController@permisosindex');
Route::get('/nuevorol', 'RolesController@create');
Route::resource('roles', 'RolesController');
Route::resource('permisos', 'PermissionController');
Route::resource('entidades', 'EntidadController');
Route::resource('usuarios', 'UsuarioController');
