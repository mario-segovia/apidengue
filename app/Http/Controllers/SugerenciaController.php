<?php

namespace App\Http\Controllers;

use App\Sugerencia;
use Illuminate\Http\Request;

class SugerenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sugerencias = Sugerencia::all();
      return $sugerencias;
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
      $sugerencia = Sugerencia::create($request->all());
      return $sugerencia;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $sugerencia = Sugerencia::find($id);
      return $sugenrencia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Sugerencia $sugerencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $sugerencia = Sugerencia::find($id);
      $sugerencia->update($request->all());
      return $sugerencia;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sugerencia  $sugerencia
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $sugerencia = Sugerencia::find($id);
      $sugerencia->delete();
      return $sugerencia;
    }
}
