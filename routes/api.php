<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

    });
});

Route::post("roles/addrole","RolesController@addroletouser");
Route::post("roles/removerole","RolesController@removeroletouser");
Route::apiResource("roles","RolesController");
Route::apiResource("permisos","PermissionController");
Route::apiResource("entidades","EntidadController");
Route::apiResource("usuarios","UsuarioController");
Route::apiResource("pacientes","PacienteController");
Route::apiResource("casos_positivos","CasoPositivoController");
Route::apiResource("controles","ControlController");
Route::apiResource("denuncias","DenunciaController");
Route::apiResource("sugerencias","SugerenciaController");
Route::apiResource("tipo_pruebas","TipoPruebaController");
