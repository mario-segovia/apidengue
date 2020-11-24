<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Models\Permission;

class GestionPanelController extends Controller
{
  public function rolesindex()
  {
    $request = Request::create('/api/roles', 'GET');
    $datos = Route::dispatch($request);
    $datos = $datos->getContent();
    $roles =  json_decode($datos);
    return view('rolesindex',compact ('roles'));

  }

  public function permisosindex()
  {
    $request = Request::create('/api/permisos', 'GET');
    $response = Route::dispatch($request);
    $datos = $response->getContent();
    $permisos =  json_decode($datos);
    return view('permisosindex',compact ('permisos'));
    }



}
