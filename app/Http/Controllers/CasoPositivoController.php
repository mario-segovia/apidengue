<?php

namespace App\Http\Controllers;

use App\Caso_positivo;
use Illuminate\Http\Request;


class CasoPositivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $caso_positivo = Caso_positivo::all();
      return $caso_positivo;
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
      $caso_positivo = Caso_positivo::create($request->all());
      return $caso_positivo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $caso_positivo = Caso_positivo::find($id);
      return $entidad;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso_positivo $caso_positivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $caso_positivo = Caso_positivo::find($id);
      $caso_positivo->update($request->all());
      return $caso_positivo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caso_positivo  $caso_positivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $caso_positivo = Caso_positivo::find($id);
      $caso_positivo->delete();
      return $caso_positivo;
    }
}
