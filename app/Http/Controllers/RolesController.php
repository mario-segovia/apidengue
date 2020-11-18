<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\User;

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
        return $roles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addroletouser(Request $request)
    {
        $rol = Role::find($request->id_rol);
        $user = User::find($request->id_user);
        $user->attachRole($rol);
    }

    public function removeroletouser(Request $request)
    {
        $rol = Role::find($request->id_rol);
        $user = User::find($request->id_user);
        $user->detachRole($rol);
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
      return response(['message' => 'Rol creado exitosamente']);
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
    public function edit(Roles $roles)
    {
        //
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
      return response(['message' => 'Rol actualizado exitosamente']);
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
      return response(['message' => 'Rol eliminado exitosamente']);
    }
}
