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
        return view('rolesindex',compact ('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addroletouser(Request $request)
    {

        $user = User::find($request->id_user);
        $rol = Role::find($request->id_rol);
        $user->attachRole($rol);

    }

    public function removeroletouser(Request $request)
    {
        $rol = Role::find($request->id_rol);
        $user = User::find($request->id_user);
        $user->detachRole($rol);
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
