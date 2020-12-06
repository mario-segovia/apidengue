<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use App\Entidad;
use App\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios = Usuario::all();
      return view('usuariosindex',compact ('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $entidades = Entidad::pluck('nombre','id');
      return view('newusuarioform',compact(
         'entidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'nombre' => 'required|string',
          'apellido' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'password' => 'required|string|confirmed'
      ]);

      $user= User::create([
          'name' => $request->nombre." ".$request->apellido,
          'email' => $request->email,
          'password' => bcrypt($request->password)
      ]);

      $usuario = Usuario::create($request->except('password','password_confirmation')+['id_user'=> $user->id]);
      //$fullname = $request->nombre." ".$request->apellido;
      //$data = ($request->all()+['fullname'=>$fullname]);
      return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $usuario = Usuario::find($id);
      $entidad = Entidad::find($usuario->id_entidad);
      $entidad_nombre = $entidad->nombre;
      //$usuario = Usuario::add ('entidad_nombre',$entidad_nombre);
      //return $usuario;
      return view('showusuarioform',compact ('usuario', 'entidad_nombre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $entidades = Entidad::pluck('nombre','id');
        return view('editusuarioform', compact('usuario','entidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $usuario = Usuario::find($id);
      $user = User::find($usuario->id_user);
      if ($usuario->nombre != $request->nombre OR $usuario->apellido != $request->apellido)
          { $user->update(['name' => $request->nombre." ".$request->apellido]);}
      if ($usuario->email != $request->email)
          { $user->update(['email' => $request->email]);}
      $usuario->update($request->all());
      return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $usuario = Usuario::find($id);
      $user = User::find($usuario->id_user);
      $usuario->delete();
      $user->delete();
      return redirect(route('usuarios.index'));
    }
}
