<?php

namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Permission;
  use App\Models\Role;
  use App\User;
  use App\Usuario;
  use Illuminate\Support\Facades\DB;

  class PermissionController extends Controller
  {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
      $permisos = Permission::all();
      return view('permisosindex',compact ('permisos'));
    }

    public function user_perm( $id)
    {
      $permisos_all = Permission::all();
      $usuario = Usuario::find($id);
      $user = User::Find($usuario->id_user);
      $user_perms = $user->permissions;
      $permisos = $permisos_all->diff($user_perms);
      return view('permusuarioform',compact ('usuario','permisos', 'user_perms'));

    }

    public function refresh_user_perm(Request $request, $id)
    {
      $usuario_id = Usuario::find($request->usuario_id);
      $user = User::find($id);
      $borrarPerms = $request->borrarPerms;
      $addPerms = $request->addPerms;
      if(!empty($borrarPerms)){
        foreach ($borrarPerms as $borrarPerm) {
          $user->detachPermission($borrarPerm);
        }
      }

      if(!empty($addPerms)){
        foreach ($addPerms as $addPerm) {
          $user->attachPermission($addPerm);
        }
      }

      return redirect(route('user_perm',[$usuario_id]));
    }

    public function role_perm( $id)
    {
      $permisos_all = Permission::all();
      $rol = Role::find($id);
      $role_perms = $rol->permissions;
      $permisos = $permisos_all->diff($role_perms);
      return view('permroleform',compact ('rol','permisos', 'role_perms'));
    }

    public function refresh_role_perm(Request $request, $id)
    {

      $rol = Role::find($id);
      $rol_id = $rol->id;
      $borrarPerms = $request->borrarPerms;
      $addPerms = $request->addPerms;
      if(!empty($borrarPerms)){
        foreach ($borrarPerms as $borrarPerm) {
          $rol->detachPermission($borrarPerm);
        }
      }

      if(!empty($addPerms)){
        foreach ($addPerms as $addPerm) {
          $rol->attachPermission($addPerm);
        }
      }

      return redirect(route('role_perms',[$rol_id]));
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
      return view('newpermform');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      $permisos = Permission::create($request->all());
      //return $roles;
      //return response(['message' => 'Permiso creado exitosamente']);
      return redirect(route('permisos.index'));
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
      $permisos = Permission::find($id);
      return $permisos;
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
      $permiso = Permission::find($id);
      return view('editpermform')->with('permiso', $permiso);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      $permisos = Permission::find($id);
      $permisos->update($request->all());
      //return $roles;
      //return response(['message' => 'Permiso actualizado exitosamente']);
      return redirect(route('permisos.index'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
      $permisos = Permission::find($id);
      $permisos->delete();
      //return $roles;
      //return response(['message' => 'Permiso eliminado exitosamente']);
      return redirect(route('permisos.index'));
    }
  }
