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
Route::resource('entidades', 'EntidadController');
Route::resource('usuarios', 'UsuarioController');
//Ruta para mandar los tipos de pruebas en pacientes.
Route::get('pruebas', 'PacienteController@create');
//Ruta para mandar los pacientes positivos para crear un caso positivo.
Route::get('pacientes', 'CasoPositivoController@create')->middleware('auth:api');
//Ruta para mandar los pacientes positivos para crear un control.
Route::get('caso_pacientes', 'ControlController@create')->middleware('auth:api');

//Recursos para obtener el hisotrial de los casos.

//Ruta para consumir los pacientes activos y tener el historial
Route::get('/historial/listafallecidos', 'HistorialFallecidoController@listafallecidos');
//Detalles de historial de casos activos.
Route::get('/historial/detalle_fallecidos/{id}', ['as' => 'detalle_fallecidos', 'uses' => 'HistorialFallecidoController@detalle_fallecido']);

//Ruta para consumir los pacientes activos y tener el historial
Route::get('/historial/historial_activos', 'HistorialActivoController@activo');
//Detalles de historial de casos activos.
Route::get('/historial/detalle_activos/{id}', ['as' => 'detalle_activos', 'uses' => 'HistorialActivoController@detalles']);

//Ruta para consumir los pacientes inactivos y tener el historial
Route::get('/historial/historial_recuperados', 'HistorialRecuperadoController@lista');
//Detalles de inactivos.
Route::get('/historial/detalle_recuperados/{id}', ['as' => 'detalle_recuperados', 'uses' => 'HistorialRecuperadoController@detalle_inactivos']);

//Ruta para consumir los pacientes en mapa y filtrar los positivos y negativos.
Route::get('mapas', 'MapaController@mapa');
//Ruta para consumir los pacientes en mapa y filtrar los positivos y negativos.
Route::get('mapatodopacientes', 'MapatodoController@index');
//Ruta para obtener los pacientes para los reporetes individuales
Route::get('reporte_pacientes', 'ReportePacienteController@reporte_paciente')->middleware('auth:api');
//Ruta para obtener los caso positivos para los reporetes individuales
Route::get('reporte_positivos', 'ReportePositivoController@caso_positivos')->middleware('auth:api');
//Ruta para obtener los controles para los reporetes individuales
Route::get('reporte_control', 'ReporteControlController@reportecontrol')->middleware('auth:api');
//Ruta para obtener los pacientes para los reportes personalizados
Route::get('grafico_personalizados', 'GraficoPersonalisadoController@personalizado');

//Rutas para modulo de graficos

//Recurso para consumir funciones de grafico.
Route::get('/generos/masculino', 'GeneroController@masculino');
Route::get('/generos/femenino', 'GeneroController@femenino');
Route::get('/generos/otro', 'GeneroController@otro');

//Recurso para utilizar los barrios
Route::get('/barrios/encarnacion', 'GraficoController@encarnacion');
Route::get('/barrios/cambyreta', 'GraficoController@cambyreta');
Route::get('/barrios/ciudadnueva', 'GraficoController@ciudadnueva');
Route::get('/barrios/fatima', 'GraficoController@fatima');
Route::get('/barrios/itapaso', 'GraficoController@itapaso');
Route::get('/barrios/mboikae', 'GraficoController@mboikae');
Route::get('/barrios/sagradafamilia', 'GraficoController@sagradafamilia');
Route::get('/barrios/sanisidro', 'GraficoController@sanisidro');
Route::get('/barrios/santamaria', 'GraficoController@santamaria');
Route::get('/barrios/chaipe', 'GraficoController@chaipe');
Route::get('/barrios/buenavista', 'GraficoController@buenavista');

//Consumir mapa por barrios.
Route::get('/mapa_barrios/encarnacion', 'MapaController@encarnacion');
Route::get('/mapa_barrios/cambyreta', 'MapaController@cambyreta');
Route::get('/mapa_barrios/ciudadnueva', 'MapaController@ciudadnueva');
Route::get('/mapa_barrios/fatima', 'MapaController@fatima');
Route::get('/mapa_barrios/itapaso', 'MapaController@itapaso');
Route::get('/mapa_barrios/mboikae', 'MapaController@mboikae');
Route::get('/mapa_barrios/sagradafamilia', 'MapaController@sagradafamilia');
Route::get('/mapa_barrios/sanisidro', 'MapaController@sanisidro');
Route::get('/mapa_barrios/santamaria', 'MapaController@santamaria');
Route::get('/mapa_barrios/chaipe', 'MapaController@chaipe');
Route::get('/mapa_barrios/buenavista', 'MapaController@buenavista');
Route::get('/mapa_barrios/nueva_alborada', 'MapaController@nueva_alborada');
Route::get('/mapa_barrios/santo_domingo', 'MapaController@santo_domingo');
Route::get('/mapa_barrios/de_diciembre', 'MapaController@de_diciembre');

//Recursos para utilizar estados y otro tipo de datos.
Route::get('/estados/eleccion', 'GraficoController@eleccion');
Route::get('/estados/infectados', 'GraficoController@infectados');
Route::get('/estados/max', 'GraficoController@max');
Route::get('/estados/minima', 'GraficoController@minima');
Route::get('/estados/muertos', 'GraficoController@muertos');
Route::get('/estados/negativo', 'GraficoController@negativos');
Route::get('/estados/negatotal', 'GraficoController@negatotal');
Route::get('/estados/otro_estado', 'GraficoController@otro_estado');
Route::get('/estados/positivo', 'GraficoController@positivos');
Route::get('/estados/positotal', 'GraficoController@positotal');
Route::get('/estados/promedio', 'GraficoController@promedio');
Route::get('/estados/recuperados', 'GraficoController@recuperados');

//Recursos para obtener resumenes de casos en el dashboard.

Route::get('/dashboard/muertos', 'DashboardController@muertos');
Route::get('/dashboard/infectados', 'DashboardController@infectados');
Route::get('/dashboard/recuperados', 'DashboardController@recuperados');
Route::get('/dashboard/pacientes', 'DashboardController@pacientes');
Route::get('/dashboard/caso_positivos', 'DashboardController@caso_positivos');
Route::get('/dashboard/nuevo_casos', 'DashboardController@nuevo_casos');
