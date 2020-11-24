<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\User;

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

    public function addpermtorole(Request $request)
    {
        $rol = Role::find($request->id_rol);
        $Permiso = Permission::find($request->id_perm);
        $rol->attachPermission($permiso);
    }

    public function removepermtorole(Request $request)
    {
        $rol = Role::find($request->id_rol);
        $Permiso = Permission::find($request->id_perm);
        $rol->detachPermission($rol);
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
