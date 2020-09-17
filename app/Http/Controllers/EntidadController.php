<?php

namespace App\Http\Controllers;

use App\Entidad;
use Illuminate\Http\Request;

class EntidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $entidad = Entidad::all();
      return $entidad;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $entidad = Entidad::create($request->all());
      return $entidad;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $entidad = Entidad::find($id);
      return $entidad;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Entidad $entidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $entidad = Entidad::find($id);
      $entidad->update($request->all());
      return $entidad;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $entidad = Entidad::find($id);
      $entidad->delete();
      return $entidad;
    }
}
