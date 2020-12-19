<?php

namespace App\Http\Controllers;

  use App\Models\Role;
  use Illuminate\Http\Request;
  use App\User;
  use App\Usuario;

  class RolesController extends Controller
  {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
      $roles = Role::all();
      return view('rolesindex',compact ('roles'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function user_roles($id)
    {
      $roles = Role::all();
      $usuario = Usuario::find($id);
      $user = User::Find($usuario->id_user);
      $user_roles = $user->getRoles();


      if(!empty($user_roles)){
        foreach ($user_roles as $user_role) {

          foreach ($roles as $key => $role) {
            if ($user_role == $role->name){

              $roles->forget($key); break;
            }
          }
        }
      }
      return view('rolesusuarioform',compact ('usuario','roles', 'user_roles'));

    }

    public function refresh_user_roles(Request $request, $id)
    {
      $usuario = Usuario::find($request->usuario_id);
      $user = User::find($id);
      $borrarRoles = $request->borrarRoles;
      $addRoles = $request->addRoles;
      if(!empty($borrarRoles)){
        foreach ($borrarRoles as $borrarRol) {
          $user->detachRole($borrarRol);
        }
      }

      if(!empty($addRoles)){
        foreach ($addRoles as $addRol) {
          $user->attachRole($addRol);
        }
      }

      return redirect(route('user_roles',[$usuario]));
    }


    public function create()
    {
      return view('newroleform');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      $roles = Role::create($request->all());
      //return $roles;
      //return response(['message' => 'Rol creado exitosamente']);
      return redirect(route('roles.index'));
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Roles  $roles
    * @return \Illuminate\Http\Response
    */
    public function show( $id)
    {
      $roles = Role::find($id);
      return $roles;
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Roles  $roles
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      $role = Role::find($id);
      return view('editroleform')->with('role', $role);

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Roles  $roles
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      $roles = Role::find($id);
      $roles->update($request->all());
      //return $roles;
      //return response(['message' => 'Rol actualizado exitosamente']);
      //$mensaje= 'Rol actualizado exitosamente';
      return redirect(route('roles.index'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Roles  $roles
    * @return \Illuminate\Http\Response
    */
    public function destroy( $id)
    {
      $roles = Role::find($id);
      $roles->delete();
      //return $roles;
      //return response(['message' => 'Rol eliminado exitosamente']);
      return redirect(route('roles.index'));
    }
  }
