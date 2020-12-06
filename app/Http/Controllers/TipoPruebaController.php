<?php

namespace App\Http\Controllers;

use App\TipoPrueba;
use Illuminate\Http\Request;

class TipoPruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipo_pruebas = TipoPrueba::all();
      return $tipo_pruebas;
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
      $tipo_prueba = TipoPrueba::create($request->all());
      return $tipo_prueba;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoPrueba  $tipoPrueba
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $tipo_prueba = TipoPrueba::find($id);
      return $tipo_prueba;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoPrueba  $tipoPrueba
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoPrueba $tipoPrueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoPrueba  $tipoPrueba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $tipo_prueba = TipoPrueba::find($id);
      $tipo_prueba->update($request->all());
      return $tipo_prueba;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoPrueba  $tipoPrueba
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $tipo_prueba = TipoPrueba::find($id);
      $tipo_prueba->delete();
      return $tipo_prueba;
    }
}
