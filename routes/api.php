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
Route::post('ingresar', 'AuthController@ingresar');
Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('signup', 'AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::get('user_roles', 'AuthController@user_roles');
        Route::get('user_entidad', 'AuthController@user_entidad');
    });
});

Route::post("roles/addrole","RolesController@addroletouser");
Route::post("roles/removerole","RolesController@removeroletouser");
Route::apiResource("roles","RolesController");
Route::apiResource("permisos","PermissionController");
Route::apiResource("entidades","EntidadController");
Route::apiResource("usuarios","UsuarioController");
Route::apiResource("pacientes","PacienteController")->middleware('auth:api');
Route::apiResource("casos_positivos","CasoPositivoController")->middleware('auth:api');
Route::apiResource("controles","ControlController")->middleware('auth:api');
Route::apiResource("denuncias","DenunciaController");
Route::apiResource("sugerencias","SugerenciaController");
Route::apiResource("tipo_pruebas","TipoPruebaController");
Route::apiResource("noticias","NoticiaController");
Route::apiResource("assets","AssetController");

// Rutas del Portal web de noticias
Route::get('re', 'PrincipalController@re');
Route::get('relevante', 'PrincipalController@relevante');
Route::get('news', 'PrincipalController@noticias');
Route::get('ultimas', 'PrincipalController@ultimas');
Route::get('detalles/{id}', ['as' => 'detalle', 'uses' => 'NoticiaController@detalle']);
Route::get('paciente', 'GraficoController@paciente');
Route::get('masculino', 'GraficoController@masculino');
Route::get('femenino', 'GraficoController@femenino');
Route::get('positivo', 'GraficoController@positivo');
Route::get('negativo', 'GraficoController@negativo');
Route::get('fallecido', 'GraficoController@fallecido');
Route::get('activo', 'GraficoController@activo');
Route::get('inactivo', 'GraficoController@inactivo');
Route::get('promedio', 'GraficoController@promedio');
Route::get('max', 'GraficoController@max');
Route::get('min', 'GraficoController@minima');
