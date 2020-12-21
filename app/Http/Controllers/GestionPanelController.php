<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;

class GestionPanelController extends Controller
{
  public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('main_panel');
        }

        return back()->withErrors([
            'email' => 'Los datos del Usuario no son validos o tiene errores',
        ]);
    }


    public function logout(Request $request)
    {
          Auth::logout();

          $request->session()->invalidate();

          $request->session()->regenerateToken();

          return redirect('/');
    }




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
