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
    return view('login');
})->name('login');

Route::get('/main_panel', function () {
    return view('mainpanel');
})->name('main_panel')->middleware('auth');

Route::post('/login_check', 'GestionPanelController@login')->name('login_check');
Route::post('/logout', 'GestionPanelController@logout')->name('logout')->middleware('auth');

Route::get('/reset_pass_form/{id}', 'UsuarioController@reset_pass')->name('reset_pass')->middleware('auth');
Route::post('/store_pass/{id}', 'UsuarioController@store_pass')->name('store_pass')->middleware('auth');

Route::get('/denunciantes_index', 'UsuarioController@denunciantes_index')->name('denunciantes_index')->middleware('auth');
Route::get('/denunciantes_edit/{id}', 'UsuarioController@denunciantes_edit')->name('denunciantes_edit')->middleware('auth');
Route::patch('/actualizar_denunciante/{id}', 'UsuarioController@denunciantes_update')->name('denunciante_update')->middleware('auth');
Route::post('/crear_denunciante', 'UsuarioController@denunciantes_store')->name('denunciante_store')->middleware('auth');
Route::delete('/eliminar_denunciante/{id}', 'UsuarioController@denunciantes_delete')->name('denunciante_delete')->middleware('auth');
Route::get('/nuevo_denunciante', function () {
    return view('new_denunciante_form');
})->name('new_denunciante')->middleware('auth');

Route::get('/user_roles/{id}', 'RolesController@user_roles')->name('user_roles')->middleware('auth');
Route::post('/refresh_user_rol/{id}', 'RolesController@refresh_user_roles')->name('refreshroles')->middleware('auth');
Route::get('/user_perm/{id}', 'PermissionController@user_perm')->name('user_perm')->middleware('auth');
Route::post('/refresh_user_perm/{id}', 'PermissionController@refresh_user_perm')->name('refreshperm')->middleware('auth');
Route::get('/role_perms/{id}', 'PermissionController@role_perm')->name('role_perms')->middleware('auth');
Route::post('/refresh_role_perms/{id}', 'PermissionController@refresh_role_perm')->name('refreshroleperm')->middleware('auth');
Route::get('/permisos', 'GestionPanelController@permisosindex')->middleware('auth');
Route::get('/nuevorol', 'RolesController@create')->middleware('auth');
Route::resource('roles', 'RolesController')->middleware('auth');
Route::resource('permisos', 'PermissionController')->middleware('auth');
Route::resource('entidades', 'EntidadController')->middleware('auth');
Route::resource('usuarios', 'UsuarioController')->middleware('auth');
