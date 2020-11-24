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
      $entidades = Entidad::all();
      return view('entidadindex',compact ('entidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newentidadform');
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
      return redirect(route('entidades.index'));
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
      return view('showentidadform',compact ('entidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
      $entidad = Entidad::find($id);
      return view('editentidadform')->with('entidad', $entidad);
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
      return redirect(route('entidades.index'));
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
      return redirect(route('entidades.index'));
    }
}
