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
Route::get('reporte_pacientes', 'ReportePacienteController@reporte_paciente');
//Ruta para obtener los caso positivos para los reporetes individuales
Route::get('reporte_positivos', 'ReportePositivoController@caso_positivos');
//Ruta para obtener los controles para los reporetes individuales
Route::get('reporte_control', 'ReporteControlController@reportecontrol');
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