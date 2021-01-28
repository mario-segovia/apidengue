<?php

namespace App\Http\Controllers;

use App\Control;
use Illuminate\Http\Request;
use App\Caso_positivo;
class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $control = Control::all();
      return $control;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caso_pacientes= Caso_positivo::pluck('paciente_id','id');
        return $caso_pacientes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $control = Control::create($request->all());
      return $control;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
      $control = Control::find($id);
      return $control;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $control = Control::find($id);
      $control->update($request->all());
      return $control;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      $control = Control::find($id);
      $control->delete();
      return $control;
    }
}
